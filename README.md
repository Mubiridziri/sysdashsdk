System Dashboard SDK
================
SDK library for System Dashboard Product

Getting Started
---------------

```
$ composer require mubiridziri/sysdashsdk
```

Create `config/packages/sysdash.yaml` and write:

```yaml
sys_dash_sdk:
  address: '%env(SYSDASH_URL)%'
  token: "token"
```
Configuration `.env` file:
```dotenv
SYSDASH_URL=http://localhost:8080
```

Add Bundle to `bundles.php`

```php
<?php

return [
    ...
    Mubiridziri\Sysdashsdk\SysDashSdkBundle::class => ['all' => true]
    ...
];
```


# Example Usage

ExceptionListener.php
```php
<?php

namespace App\Listener;

use Mubiridziri\Sysdashsdk\Manager\Manager;
use Mubiridziri\Sysdashsdk\Model\Log;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    const ERROR_TYPE = 'error';

    private Manager $manager;
    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    public function __invoke(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();
        $message = sprintf(
            '%s with code: %s',
            $exception->getMessage(),
            $exception->getCode()
        );
        $log = new Log(self::ERROR_TYPE, $message);
        $this->manager->sendLog($log);
    }
}
```

services.yaml

```yaml
    App\Service\Doctrine\Scopes\ScopeFilterConfigurator:
        tags:
            - { name: kernel.event_listener, event: kernel.request }
```