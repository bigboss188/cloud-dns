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

namespace HyperfTest\Cases;

use Gemini\DnsCloud\Client\Tencent\TencentClient;
use Gemini\DnsCloud\Factory;
use Hyperf\Config\Config;
use TencentCloud\Dnspod\V20210323\DnspodClient;
use TencentCloud\Dnspod\V20210323\Models\DescribeDomainListRequest;
use TencentCloud\Dnspod\V20210323\Models\DescribeDomainListResponse;

/**
 * @internal
 * @coversNothing
 */
class TencentTest extends AbstractTestCase
{
    public function testDescribeUserDetail()
    {
        $this->markTestSkipped('暂时跳过');

        $config = new Config([
            'dns_cloud' => [
                'tencent' => [
                    'secret_id' => 'xx',
                    'secret_key' => 'xx',
                    'client' => TencentClient::class,
                ],
            ],
        ]);

        $factory = new Factory($config);
        /** @var DnspodClient $client */
        $client = $factory->get('tencent')->client();

        // 实例化一个请求对象,每个接口都会对应一个request对象
        $req = new DescribeDomainListRequest();

        $params = [];
        $req->fromJsonString(json_encode($params));

        // 返回的resp是一个DescribeUserDetailResponse的实例，与请求对象对应
        $res = $client->DescribeDomainList($req);
        $this->assertInstanceOf(DescribeDomainListResponse::class, $res);
    }
}
