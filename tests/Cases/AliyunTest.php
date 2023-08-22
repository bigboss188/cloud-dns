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

use AlibabaCloud\SDK\Alidns\V20150109\Alidns;
use AlibabaCloud\SDK\Alidns\V20150109\Models\DescribeDnsProductInstancesRequest;
use AlibabaCloud\SDK\Alidns\V20150109\Models\DescribeDnsProductInstancesResponse;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;
use Gemini\DnsCloud\Client\Aliyun\AliyunClient;
use Gemini\DnsCloud\Factory;
use Hyperf\Config\Config;

/**
 * @internal
 * @coversNothing
 */
class AliyunTest extends AbstractTestCase
{
    public function testConstructor()
    {
        $config = new Config([
            'dns_cloud' => [
                'aliyun' => [
                    'access_key_id' => '',
                    'access_secret' => '',
                    'client' => AliyunClient::class,
                ],
            ],
        ]);

        $factory = new Factory($config);

        $this->assertInstanceOf(AliyunClient::class, $factory->get('aliyun'));
    }

    public function testDescribeDnsProductInstancesWithOptions()
    {
        $this->markTestSkipped('暂时跳过');

        $config = new Config([
            'dns_cloud' => [
                'aliyun' => [
                    'access_key_id' => 'xx',
                    'access_secret' => 'xx',
                    'client' => AliyunClient::class,
                ],
            ],
        ]);

        $factory = new Factory($config);
        $describeDnsProductInstanceRequest = new DescribeDnsProductInstancesRequest();
        $runtime = new RuntimeOptions([]);

        /** @var Alidns $client */
        $client = $factory->get('aliyun')->client();

        $res = $client->describeDnsProductInstancesWithOptions($describeDnsProductInstanceRequest, $runtime);

        $this->assertInstanceOf(DescribeDnsProductInstancesResponse::class, $res);
    }
}
