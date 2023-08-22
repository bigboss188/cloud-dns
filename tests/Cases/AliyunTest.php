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
                    'region_id' => '',
                    'access_key_id' => '',
                    'access_secret' => '',
                    'client' => AliyunClient::class,
                ],
            ],
        ]);

        $factory = new Factory($config);

        $this->assertInstanceOf(AliyunClient::class, $factory->get('aliyun'));
    }
}
