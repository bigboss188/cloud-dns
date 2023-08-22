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

namespace Gemini\DnsCloud\Client\Tencent;

use Gemini\DnsCloud\Client\ClientInterface;
use TencentCloud\Common\Credential;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Profile\HttpProfile;
use TencentCloud\Dnspod\V20210323\DnspodClient;

class TencentClient implements ClientInterface
{
    public string $secretId;

    public string $secretKey;

    public Credential $credential;

    public ClientProfile $profile;

    public function __construct(array $config = [])
    {
        $this->secretId = $config['secret_id'];
        $this->secretKey = $config['secret_key'];
        $this->credential = new Credential($this->secretId, $this->secretKey);
        $httpProfile = new HttpProfile();
        $httpProfile->setEndpoint('dnspod.tencentcloudapi.com');
        $httpProfile->setKeepAlive(true);

        // 实例化一个client选项，可选的，没有特殊需求可以跳过
        $this->profile = new ClientProfile();
        $this->profile->setHttpProfile($httpProfile);
    }

    public function client(): mixed
    {
        return new DnspodClient($this->credential, '', $this->profile);
    }
}
