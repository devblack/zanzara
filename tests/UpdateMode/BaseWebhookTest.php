<?php

declare(strict_types=1);

namespace Zanzara\Test\UpdateMode;

use PHPUnit\Framework\TestCase;
use Zanzara\ZanzaraLogger;
use Zanzara\UpdateMode\BaseWebhook;

/**
 * Verifies Telegram IPv4/IPv6 webhook source ranges.
 */
class BaseWebhookTest extends TestCase
{

    public static function ipProvider(): array
    {
        return [
            'ipv4 range 1' => ['149.154.167.99', true],
            'ipv4 range 2' => ['91.108.5.1', true],
            'ipv4 outside' => ['8.8.8.8', false],
            'ipv4 garbage' => ['not-an-ip', false],
            'ipv6 /32' => ['2001:b28:5:a::1', true],
            'ipv6 /48' => ['2001:67c:4e8::1', true],
            'ipv6 outside' => ['2001:4860:4860::8888', false],
        ];
    }

    /**
     * @param string $ip
     * @param bool $expected
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('ipProvider')]
    public function testVerifyTelegramIpSrc(string $ip, bool $expected): void
    {
        $logger = $this->createStub(ZanzaraLogger::class);
        $wh = new class($logger) extends BaseWebhook {
            public function __construct(ZanzaraLogger $logger)
            {
                $this->logger = $logger;
                $this->config = new \Zanzara\Config('token');
            }

            public function disableSafeMode(): void
            {
                $this->config->setSafeMode(false);
            }

            public function check(string $ip): bool
            {
                return $this->verifyTelegramIpSrc($ip);
            }

            public function run(): void
            {
            }
        };
        $wh->disableSafeMode();

        $this->assertSame($expected, $wh->check($ip));
    }

}