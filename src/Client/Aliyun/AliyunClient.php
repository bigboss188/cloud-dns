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

namespace Gemini\DnsCloud\Client\Aliyun;

use AlibabaCloud\SDK\Alidns\V20150109\Alidns;
use Darabonba\OpenApi\Models\Config;
use Gemini\DnsCloud\Client\ClientInterface;

class AliyunClient implements ClientInterface
{
    protected string $accessKeyId;

    protected string $accessKeySecret;

    protected Config $config;

    public function __construct(array $config = [])
    {
        $this->accessKeyId = $config['access_key_id'];
        $this->accessKeySecret = $config['access_secret'];
        $this->config = new Config([
            // Required, your AccessKey ID
            'accessKeyId' => $this->accessKeyId,
            // Required, your AccessKey secret
            'accessKeySecret' => $this->accessKeySecret,
        ]);
        // See https://api.alibabacloud.com/product/Alidns.
        $this->config->endpoint = 'dns.aliyuncs.com';
    }

    public function client(): Alidns
    {
        return new Alidns($this->config);
    }
}
