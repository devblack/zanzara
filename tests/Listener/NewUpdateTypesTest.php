<?php

declare(strict_types=1);

namespace Zanzara\Test\Listener;

use PHPUnit\Framework\TestCase;
use Zanzara\Config;
use Zanzara\Context;
use Zanzara\Zanzara;

/**
 * Verifies that the Bot API 10.x update types dispatch through the listener pipeline.
 */
class NewUpdateTypesTest extends TestCase
{

    public function testBusinessMessage()
    {
        $config = new Config();
        $config->setUpdateMode(Config::WEBHOOK_MODE);
        $config->setSafeMode(true);
        $config->setUpdateStream(__DIR__ . '/../update_types/business_message.json');
        $bot = new Zanzara("test", $config);

        $bot->onBusinessMessage(function (Context $ctx) {
            $message = $ctx->getBusinessMessage();
            $this->assertSame(52259550, $ctx->getUpdateId());
            $this->assertSame('bc-1', $message->getBusinessConnectionId());
            $this->assertSame(24000, $message->getMessageId());
            $this->assertSame('Business message here', $message->getText());
        });

        $bot->run();
    }

    public function testMessageReaction()
    {
        $config = new Config();
        $config->setUpdateMode(Config::WEBHOOK_MODE);
        $config->setSafeMode(true);
        $config->setUpdateStream(__DIR__ . '/../update_types/message_reaction.json');
        $bot = new Zanzara("test", $config);

        $bot->onMessageReaction(function (Context $ctx) {
            $reaction = $ctx->getMessageReaction();
            $this->assertSame(52259551, $ctx->getUpdateId());
            $this->assertSame(23756, $reaction->getMessageId());
            $newReaction = $reaction->getNewReaction()[0];
            $this->assertSame('custom_emoji', $newReaction->getType());
            $oldReaction = $reaction->getOldReaction()[0];
            $this->assertSame('emoji', $oldReaction->getType());
        });

        $bot->run();
    }

}