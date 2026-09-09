<?php

declare(strict_types=1);

namespace Zanzara\Test\JsonMapper;

use JsonMapper;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Zanzara\Telegram\Type\BotSubscriptionUpdated;
use Zanzara\Telegram\Type\BusinessConnection;
use Zanzara\Telegram\Type\BusinessMessage;
use Zanzara\Telegram\Type\BusinessMessagesDeleted;
use Zanzara\Telegram\Type\ChatBoostRemoved;
use Zanzara\Telegram\Type\ChatBoostUpdated;
use Zanzara\Telegram\Type\ChatMemberUpdated;
use Zanzara\Telegram\Type\GuestMessage;
use Zanzara\Telegram\Type\ManagedBotUpdated;
use Zanzara\Telegram\Type\MessageGenerationStopped;
use Zanzara\Telegram\Type\MessageReactionUpdated;
use Zanzara\Telegram\Type\PaidMediaPurchased;
use Zanzara\Telegram\Type\Update;
use Zanzara\ZanzaraMapper;

/**
 * Verifies that the update types added in the Bot API 10.x era are mapped and detected correctly.
 */
class UpdateTypesTest extends TestCase
{

    /**
     * @param array $payload
     * @param string $expectedClass
     */
    #[DataProvider('updateProvider')]
    public function testDetectUpdateType(array $payload, string $expectedClass)
    {
        $mapper = new ZanzaraMapper(new JsonMapper());
        /** @var Update $update */
        $update = $mapper->mapJson(json_encode($payload), Update::class);
        $update->detectUpdateType();
        $this->assertSame($expectedClass, $update->getUpdateType());
    }

    public static function updateProvider(): array
    {
        $user = ['id' => 42, 'is_bot' => false, 'first_name' => 'A'];
        $chat = ['id' => 1, 'type' => 'private'];

        return [
            'message_reaction' => [[
                'update_id' => 1,
                'message_reaction' => [
                    'chat' => $chat,
                    'message_id' => 10,
                    'user' => $user,
                    'date' => 1700000000,
                    'old_reaction' => [['type' => 'emoji', 'emoji' => '👍']],
                    'new_reaction' => [['type' => 'custom_emoji', 'custom_emoji_id' => 'x']],
                ],
            ], MessageReactionUpdated::class],
            'business_connection' => [[
                'update_id' => 2,
                'business_connection' => [
                    'id' => 'bc1',
                    'user' => $user,
                    'user_chat_id' => 42,
                    'date' => 1700000000,
                    'is_enabled' => true,
                ],
            ], BusinessConnection::class],
            'business_message' => [[
                'update_id' => 3,
                'business_message' => [
                    'message_id' => 10,
                    'date' => 1700000000,
                    'chat' => $chat,
                    'text' => 'hi',
                ],
            ], BusinessMessage::class],
            'deleted_business_messages' => [[
                'update_id' => 4,
                'deleted_business_messages' => [
                    'business_connection_id' => 'bc1',
                    'chat' => $chat,
                    'message_ids' => [1, 2],
                ],
            ], BusinessMessagesDeleted::class],
            'chat_boost' => [[
                'update_id' => 5,
                'chat_boost' => [
                    'chat' => ['id' => 1, 'type' => 'supergroup'],
                    'boost' => [
                        'boost_id' => 'b1',
                        'add_date' => 1700000000,
                        'expiration_date' => 1700000000,
                        'source' => ['source' => 'giveaway', 'giveaway_message_id' => 5, 'user' => $user],
                    ],
                ],
            ], ChatBoostUpdated::class],
            'removed_chat_boost' => [[
                'update_id' => 6,
                'removed_chat_boost' => [
                    'chat' => ['id' => 1, 'type' => 'supergroup'],
                    'boost_id' => 'b1',
                    'remove_date' => 1700000000,
                    'source' => ['source' => 'premium', 'user' => $user],
                ],
            ], ChatBoostRemoved::class],
            'purchased_paid_media' => [[
                'update_id' => 7,
                'purchased_paid_media' => [
                    'from' => $user,
                    'paid_media_payload' => 'payload',
                ],
            ], PaidMediaPurchased::class],
            'subscription' => [[
                'update_id' => 8,
                'subscription' => [
                    'user' => $user,
                    'invoice_payload' => 'p',
                    'state' => 'active',
                ],
            ], BotSubscriptionUpdated::class],
            'stopped_message_generation' => [[
                'update_id' => 9,
                'stopped_message_generation' => [
                    'chat' => $chat,
                    'draft_id' => 5,
                ],
            ], MessageGenerationStopped::class],
            'managed_bot' => [[
                'update_id' => 10,
                'managed_bot' => [
                    'user' => $user,
                    'bot' => ['id' => 43, 'is_bot' => true, 'first_name' => 'B'],
                ],
            ], ManagedBotUpdated::class],
            'chat_member' => [[
                'update_id' => 11,
                'chat_member' => [
                    'chat' => ['id' => 1, 'type' => 'supergroup'],
                    'from' => $user,
                    'date' => 1700000000,
                    'old_chat_member' => ['status' => 'member', 'user' => $user],
                    'new_chat_member' => ['status' => 'administrator', 'user' => $user],
                ],
            ], ChatMemberUpdated::class],
            'guest_message' => [[
                'update_id' => 12,
                'guest_message' => [
                    'message_id' => 10,
                    'date' => 1700000000,
                    'chat' => $chat,
                    'text' => 'hi',
                ],
            ], GuestMessage::class],
        ];
    }

}