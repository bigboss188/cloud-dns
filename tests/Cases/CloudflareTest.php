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

use Cloudflare\API\Adapter\Guzzle;
use Cloudflare\API\Endpoints\User;
use Gemini\DnsCloud\Client\Cloudflare\CloudflareClient;
use Gemini\DnsCloud\Factory;
use Hyperf\Config\Config;

/**
 * @internal
 * @coversNothing
 */
class CloudflareTest extends AbstractTestCase
{
    public function testGetUserID()
    {
        $this->markTestSkipped('暂时跳过');

        $config = new Config([
            'dns_cloud' => [
                'cloudflare' => [
                    'email' => 'xxx',
                    'api_key' => 'xxx',
                    'client' => CloudflareClient::class,
                ],
            ],
        ]);

        $factory = new Factory($config);

        /** @var Guzzle $client */
        $client = $factory->get('cloudflare')->client();
        $user = new User($client);

        $this->assertIsString($user->getUserID());
    }
}
