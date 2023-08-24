<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Gemini\DnsCloud\Client\Aliyun\AliyunClient;
use Gemini\DnsCloud\Client\Cloudflare\CloudflareClient;
use Gemini\DnsCloud\Client\Tencent\TencentClient;

use function Hyperf\Support\env;

return [
    'aliyun' => [
        'access_key_id' => env('DNS_CLOUD_ALIYUN_ACCESS_KEY_ID'),
        'access_secret' => env('DNS_CLOUD_ALIYUN_ACCESS_SECRET'),
        'client' => AliyunClient::class,
    ],
    'tencent' => [
        'secret_id' => env('DNS_CLOUD_TENCENT_SECRET_ID'),
        'secret_key' => env('DNS_CLOUD_TENCENT_SECRET_KEY'),
        'client' => TencentClient::class,
    ],
    'cloudflare' => [
        'email' => env('DNS_CLOUD_CLOUDFLARE_EMAIL'),
        'api_key' => env('DNS_CLOUD_CLOUDFLARE_API_KEY'),
        'client' => CloudflareClient::class,
    ],
];
