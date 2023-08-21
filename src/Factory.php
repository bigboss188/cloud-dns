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

namespace Gemini\DnsCloud;

use Gemini\DnsCloud\Client\ClientInterface;
use Hyperf\Contract\ConfigInterface;

class Factory
{
    /**
     * @var ClientInterface[]
     */
    public array $clients;

    public function __construct(ConfigInterface $config)
    {
        foreach ($config->get('dns_cloud', []) as $key => $value);
    }
}
