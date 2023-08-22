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

use function Hyperf\Support\env;

return [
    'aliyun' => [
        'access_key_id' => env('DNS_CLOUD_ALIYUN_ACCESS_KEY_ID'),
        'access_secret' => env('DNS_CLOUD_ALIYUN_ACCESS_SECRET'),
        'client' => AliyunClient::class,
    ],
];
