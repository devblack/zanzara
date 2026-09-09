<?php

declare(strict_types=1);

namespace Zanzara\UpdateMode;

/**
 *
 */
abstract class BaseWebhook extends UpdateMode
{

    /**
     * @var array|string[]
     */
    protected const TELEGRAM_IPV4_RANGES = [
        '149.154.160.0' => '149.154.175.255', // literally 149.154.160.0/20
        '91.108.4.0' => '91.108.7.255',    // literally 91.108.4.0/22
    ];

    /**
     * @var array|string[]
     */
    protected const TELEGRAM_IPV6_RANGES = [
        '2001:b28::/32',
        '2001:67c:4e8::/48',
        '2001:67c:4ea::/48',
        '2a0a:ed40::/32',
        '2a0a:ed41::/32',
        '2a0a:ed42::/32',
        '2a0a:ed43::/32',
    ];

    /**
     * @return bool
     */
    private function isSafeMode(): bool
    {
        return $this->config->getSafeMode();
    }

    /**
     * @param string $path
     * @return bool
     */
    protected function isWebhookAuthorized(string $path): bool
    {
        if (!$this->config->isWebhookTokenCheckEnabled()) {
            return true;
        }

        return $this->resolveTokenFromPath($path) === $this->config->getBotToken();
    }

    /**
     * @param string $path
     * @return string|null
     */
    protected function resolveTokenFromPath(string $path): ?string
    {
        $pathParams = explode('/', $path);
        return end($pathParams) ?? null;
    }

    /**
     * @param string $ip
     * @return bool
     */
    protected function verifyTelegramIpSrc(string $ip): bool
    {
        if ($this->isSafeMode()) {
            return true;
        }

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) && $this->inIpv4Range($ip)) {
            return true;
        }

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) && $this->inIpv6Range($ip)) {
            return true;
        }

        $this->logger->errorNotAuthorizedIp($ip);
        return false;
    }

    /**
     * @param string $ip
     * @return bool
     */
    private function inIpv4Range(string $ip): bool
    {
        $ip = ip2long($ip);
        foreach (self::TELEGRAM_IPV4_RANGES as $lower => $upper) {
            if ($ip >= ip2long($lower) && $ip <= ip2long($upper)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param string $ip
     * @return bool
     */
    private function inIpv6Range(string $ip): bool
    {
        $prefix = inet_pton($ip);
        foreach (self::TELEGRAM_IPV6_RANGES as $range) {
            [$network, $maskBits] = explode('/', $range);
            // All Telegram IPv6 ranges are byte-aligned (/32, /48), so a byte-slice is exact.
            $maskBytes = (int)$maskBits / 8;
            if (substr($prefix, 0, $maskBytes) === substr(inet_pton($network), 0, $maskBytes)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param string $method
     * @return bool
     */
    protected function verifyRequestMethod(string $method): bool
    {
        if ($this->isSafeMode()) {
            return true;
        }

        if ($method !== 'POST') {
            $this->logger->errorNotAuthorizedRequestMethod();
            return false;
        }
        return true;
    }

    /**
     * @param string $path
     * @return bool
     */
    protected function verifyAuthorizedWebHook(string $path): bool
    {
        if (!$this->isWebhookAuthorized($path)) {
            $this->logger->errorNotAuthorized();
            return false;
        }
        return true;
    }
}
