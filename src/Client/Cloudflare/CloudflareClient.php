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

namespace Joba\CloudDns\Client\Cloudflare;

use Cloudflare\API\Adapter\Guzzle;
use Cloudflare\API\Auth\APIKey;
use Joba\CloudDns\Client\ClientInterface;

class CloudflareClient implements ClientInterface
{
    protected APIKey $key;

    protected string $email;

    protected string $apiKey;

    public function __construct(array $config = [])
    {
        $this->email = $config['email'];
        $this->apiKey = $config['api_key'];

        $this->key = new APIKey($this->email, $this->apiKey);
    }

    public function client(): mixed
    {
        return new Guzzle($this->key);
    }
}
