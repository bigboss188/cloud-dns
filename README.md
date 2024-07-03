# DNS云服务统一 API

## 安装

```shell
composer require joba/cloud-dns
```

## 使用

创建配置

```shell
php bin/hyperf.php vendor:publish joba/cloud-dns
```

各个平台都有对应的调试工具，如果不知道接口对应的事哪个 `Request`，则可以到调试工具里进行查询。

### 使用阿里云平台

[文档](https://www.alibabacloud.com/help/zh/alibaba-cloud-dns/latest/api-alidns-2015-01-09-dir)

安装组件

```shell
composer require alibabacloud/darabonba-openapi
composer require alibabacloud/alidns-20150109
```

设置环境变量

```dotenv
DNS_CLOUD_ALIYUN_ACCESS_KEY_ID="xxx"
DNS_CLOUD_ALIYUN_ACCESS_SECRET="xxx"
```

编写测试代码，我们直接把代码全部写到控制器里，开发者请按照实际情况酌情处理

```php
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

namespace App\Controller;

use AlibabaCloud\SDK\Alidns\V20150109\Alidns;
use AlibabaCloud\SDK\Alidns\V20150109\Models\DescribeDnsProductInstancesRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;
use Joba\CloudDns\Factory;
use Hyperf\Di\Annotation\Inject;

class IndexController extends Controller
{
    #[Inject]
    protected Factory $factory;

    public function index()
    {
        /** @var Alidns $client */
        $client = $this->factory->get('aliyun')->client();

        $describeDnsProductInstanceRequest = new DescribeDnsProductInstancesRequest();
        $runtime = new RuntimeOptions([]);

        $res = $client->describeDnsProductInstancesWithOptions($describeDnsProductInstanceRequest, $runtime);

        return $this->response->success($res);
    }
}

```

### 使用腾讯云平台

[文档](https://cloud.tencent.com/document/api/1427/56194)

安装组件

```shell
composer require tencentcloud/dnspod
```

设置环境变量

```dotenv
DNS_CLOUD_TENCENT_SECRET_ID="xxx"
DNS_CLOUD_TENCENT_SECRET_KEY="xxx"
```

编写测试代码，我们直接把代码全部写到控制器里，开发者请按照实际情况酌情处理

```php
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

namespace App\Controller;

use Joba\CloudDns\Factory;
use Hyperf\Di\Annotation\Inject;
use TencentCloud\Dnspod\V20210323\Models\DescribeUserDetailRequest;

class IndexController extends Controller
{
    #[Inject]
    protected Factory $factory;

    public function index()
    {
        /** @var Alidns $client */
        $client = $this->factory->get('aliyun')->client();

        $req = new DescribeUserDetailRequest();

        $params = [];
        $req->fromJsonString(json_encode($params));

        $res = $client->DescribeUserDetail($req);

        return $this->response->success($res);
    }
}

```

### 使用 Cloudflare

安装组件

```shell
composer require cloudflare/sdk
```

设置环境变量

```dotenv
DNS_CLOUD_CLOUDFLARE_EMAIL="xxx"
DNS_CLOUD_CLOUDFLARE_API_KEY="xxx"
```

编写测试代码，我们直接把代码全部写到控制器里，开发者请按照实际情况酌情处理

```php
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

namespace App\Controller;

use Cloudflare\API\Adapter\Guzzle;
use Cloudflare\API\Endpoints\User;
use Joba\CloudDns\Factory;
use Hyperf\Di\Annotation\Inject;

class IndexController extends Controller
{
    #[Inject]
    protected Factory $factory;

    public function index()
    {
        /** @var Guzzle $client */
        $client = $this->factory->get('cloudflare')->client();
        
        $user = new User($client);

        return $this->response->success($user->getUserID());
    }
}

```
