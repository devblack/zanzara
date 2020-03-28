<?php

declare(strict_types=1);

namespace Zanzara;

use Psr\Http\Message\ResponseInterface;
use React\EventLoop\LoopInterface;
use Zanzara\Action\ActionCollector;
use Zanzara\Action\ActionResolver;
use Zanzara\Telegram\Type\GetUpdates;
use Zanzara\Telegram\Type\Update;

/**
 * Clients interact with Zanzara by creating an instance of this class.
 *
 * The client has to declare the actions he wants to perform.
 * Actions are declared through public methods defined in @see ActionCollector.
 * After that he has to call @see Zanzara::run() that determines, accordingly to the Update type received from Telegram,
 * the actions to execute.
 * A @see Context object is passed through all middleware stack.
 *
 */
class Zanzara extends ActionResolver
{

    /**
     * @var Config
     */
    private $config;

    /**
     * @var ZanzaraMapper
     */
    private $zanzaraMapper;

    /**
     * @var Telegram
     */
    private $telegram;

    /**
     * @var LoopInterface
     */
    private $loop;

    /**
     * @param string $token
     * @param LoopInterface $loop
     * @param Config|null $config
     */
    public function __construct(string $token, LoopInterface $loop, ?Config $config = null)
    {
        $config = $config ?? new Config();
        $config->setBotToken($token);
        $this->config = $config;
        $this->loop = $loop;
        $this->zanzaraMapper = new ZanzaraMapper();
        $this->telegram = new Telegram($loop, $config);
    }

    /**
     *
     */
    public function run(): void
    {

        switch ($this->config->getUpdateMode()) {

            case Config::WEBHOOK_MODE:
                $json = file_get_contents($this->config->getUpdateStream());
                /** @var Update $update */
                $update = $this->zanzaraMapper->map($json, Update::class);
                $update->detectUpdateType();
                $this->exec($update);
                break;

            case Config::POLLING_MODE:
                $this->loop->futureTick([$this, 'polling']);
                break;

        }

    }

    /**
     *
     */
    public function polling()
    {
        $this->telegram->getUpdates()->then(function (ResponseInterface $response) {
            // response received within 50 seconds. Telegram longpolling
            $json = (string)$response->getBody();
            echo "$json\n";
            /** @var GetUpdates $getUpdates */
            $getUpdates = $this->zanzaraMapper->map($json, GetUpdates::class);
            $updates = $getUpdates->getResult();
            foreach ($updates as $update) {
                $update->detectUpdateType();
                $this->exec($update);
            }
            $this->polling();
        });
    }

    /**
     * @param Update $update
     */
    private function exec(Update $update)
    {
        $context = new Context($update);
        $actions = $this->resolve($update);
        foreach ($actions as $action) {
            $this->feedMiddlewareStack($action);
            $middlewareTip = $action->getTip();
            $middlewareTip($context);
        }
    }

}
