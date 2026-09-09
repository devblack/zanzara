<?php

declare(strict_types=1);

namespace Zanzara\Test\Telegram;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Zanzara\Telegram\TelegramTrait;
use Zanzara\Telegram\Type\BotAccessSettings;
use Zanzara\Telegram\Type\BusinessConnection;
use Zanzara\Telegram\Type\Gifts;
use Zanzara\Telegram\Type\ManagedBotCreated;
use Zanzara\Telegram\Type\StarAmount;
use Zanzara\Telegram\Type\StarTransactions;
use Zanzara\Telegram\Type\Story;
use Zanzara\Telegram\Type\UserChatBoosts;

/**
 * Guards the Bot API 9/10 trait surface: every new method exists and its return type maps to a real class.
 */
class TelegramTraitMethodsTest extends TestCase
{

    /**
     * @return array<string, string[]>
     */
    public static function methodProvider(): array
    {
        return [
            'setMessageReaction' => ['setMessageReaction', null],
            'getBusinessConnection' => ['getBusinessConnection', BusinessConnection::class],
            'getStarTransactions' => ['getStarTransactions', StarTransactions::class],
            'getMyStarBalance' => ['getMyStarBalance', StarAmount::class],
            'setBusinessAccountName' => ['setBusinessAccountName', null],
            'setBusinessAccountUsername' => ['setBusinessAccountUsername', null],
            'setBusinessAccountBio' => ['setBusinessAccountBio', null],
            'transferBusinessAccountStars' => ['transferBusinessAccountStars', null],
            'readBusinessMessage' => ['readBusinessMessage', null],
            'deleteBusinessMessages' => ['deleteBusinessMessages', null],
            'getUserChatBoosts' => ['getUserChatBoosts', UserChatBoosts::class],
            'deleteMessageReaction' => ['deleteMessageReaction', null],
            'deleteAllMessageReactions' => ['deleteAllMessageReactions', null],
            'refundStarPayment' => ['refundStarPayment', null],
            'getAvailableGifts' => ['getAvailableGifts', Gifts::class],
            'sendGift' => ['sendGift', null],
            'setBusinessAccountGiftSettings' => ['setBusinessAccountGiftSettings', null],
            'verifyUser' => ['verifyUser', null],
            'verifyChat' => ['verifyChat', null],
            'removeUserVerification' => ['removeUserVerification', null],
            'removeChatVerification' => ['removeChatVerification', null],
            'getManagedBotToken' => ['getManagedBotToken', null],
            'replaceManagedBotToken' => ['replaceManagedBotToken', null],
            'getManagedBotAccessSettings' => ['getManagedBotAccessSettings', BotAccessSettings::class],
            'setManagedBotAccessSettings' => ['setManagedBotAccessSettings', null],
            'postStory' => ['postStory', Story::class],
            'editStory' => ['editStory', Story::class],
            'deleteStory' => ['deleteStory', null],
            'repostStory' => ['repostStory', Story::class],
        ];
    }

    /**
     * @param string $method
     * @param class-string|null $returnClass
     */
    #[DataProvider('methodProvider')]
    public function testMethodExists(string $method, ?string $returnClass): void
    {
        \PHPUnit\Framework\Assert::assertTrue(
            method_exists(TelegramTrait::class, $method),
            "TelegramTrait::$method does not exist"
        );
        if ($returnClass) {
            \PHPUnit\Framework\Assert::assertTrue(
                class_exists($returnClass),
                "Return type class $returnClass for $method does not exist"
            );
        }
    }

    public function testNewReturnTypesMap(): void
    {
        $mapper = new \Zanzara\ZanzaraMapper(new \JsonMapper());

        $transactions = '{"transactions":[{"id":"1","amount":10,"date":1700000000,"source":{"type":"user"}}]}';
        /** @var StarTransactions $star */
        $star = $mapper->mapJson($transactions, StarTransactions::class);
        self::assertSame(1, count($star->getTransactions()));
        self::assertSame('user', $star->getTransactions()[0]->getSource()->getType());

        $gifts = '{"gifts":[{"id":"g1","star_count":10,"background":{"center_color":16711680,"edge_color":255,"text_color":0}}]}';
        /** @var Gifts $g */
        $g = $mapper->mapJson($gifts, Gifts::class);
        self::assertSame(10, $g->getGifts()[0]->getStarCount());
        self::assertSame(16711680, $g->getGifts()[0]->getBackground()->getCenterColor());

        $bot = '{"bot":{"id":1,"is_bot":true,"first_name":"B","username":"thebot"}}';
        /** @var ManagedBotCreated $managed */
        $managed = $mapper->mapJson($bot, ManagedBotCreated::class);
        self::assertSame('thebot', $managed->getBot()->getUsername());
    }
}