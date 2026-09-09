<?php

declare(strict_types=1);

namespace Zanzara\Test\JsonMapper;

use JsonMapper;
use PHPUnit\Framework\TestCase;
use Zanzara\Telegram\Type\Checklist;
use Zanzara\Telegram\Type\ChecklistTask;
use Zanzara\Telegram\Type\DirectMessagesTopic;
use Zanzara\Telegram\Type\GiftInfo;
use Zanzara\Telegram\Type\Message;
use Zanzara\Telegram\Type\MessageOrigin;
use Zanzara\Telegram\Type\UsersShared;
use Zanzara\ZanzaraMapper;

/**
 * Verifies that the Message fields introduced in the Bot API 10.x era are mapped to the right types.
 */
class MessageTypesTest extends TestCase
{

    public function testMapNewServiceMessageFields()
    {
        $mapper = new ZanzaraMapper(new JsonMapper());

        $json = json_encode([
            'message_id' => 10,
            'date' => 1700000000,
            'chat' => ['id' => 1, 'type' => 'private'],
            'direct_messages_topic' => ['topic_id' => 5, 'user' => ['id' => 42, 'is_bot' => false, 'first_name' => 'A']],
            'forward_origin' => ['type' => 'user', 'sender_user' => ['id' => 42, 'is_bot' => false, 'first_name' => 'A'], 'date' => 1700000000],
            'users_shared' => [
                'request_id' => 7,
                'users' => [['user_id' => 42, 'first_name' => 'A']],
            ],
            'gift' => ['gift' => ['id' => 'g1', 'sticker' => ['file_id' => 'f', 'file_unique_id' => 'u', 'type' => 'regular', 'width' => 5, 'height' => 5, 'is_animated' => false, 'is_video' => false], 'star_count' => 100]],
            'checklist' => [
                'title' => 'Check',
                'tasks' => [['id' => 1, 'text' => 'Do it', 'completion_date' => 1700000000]],
            ],
        ]);

        /** @var Message $message */
        $message = $mapper->mapJson($json, Message::class);

        $this->assertInstanceOf(DirectMessagesTopic::class, $message->getDirectMessagesTopic());
        $this->assertSame(5, $message->getDirectMessagesTopic()->getTopicId());
        $this->assertInstanceOf(MessageOrigin::class, $message->getForwardOrigin());
        $this->assertSame('user', $message->getForwardOrigin()->getType());
        $this->assertInstanceOf(UsersShared::class, $message->getUsersShared());
        $this->assertInstanceOf(GiftInfo::class, $message->getGift());
        $this->assertInstanceOf(Checklist::class, $message->getChecklist());
        /** @var ChecklistTask $task */
        $task = $message->getChecklist()->getTasks()[0];
        $this->assertSame('Do it', $task->getText());
        $this->assertSame(1700000000, $task->getCompletionDate());
        $this->assertTrue($message->isServiceMessage());
    }

}