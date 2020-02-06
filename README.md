# tinkoff bundle

Installation
------------

Use Composer for the automated process:

```bash
 composer require xpat/tinkoffbundle
```

### Adding bundle to your application kernel

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = [
        // ...
        new Xpat\TinkoffBundle\XpatTinkoffBundle(),
        // ...
    ];
}
```
Config
-----
in app/config/config.yml
 ```yaml
    xpat_tinkoff:
      api_url: 'https://api-url.com' #required
      terminal_key: 'your_terminal_key' #required
      password: 'your_password' #required
      notification_route: 'app_my_notification_route' #optional
      success_route: 'app_my_success_route' #optional
      fail_route: 'app_my_fail_route' #optional
```
Usage
-----

```php
use Xpat\TinkoffBundle\Service\PaymentParameterBuilder;
use Xpat\TinkoffBundle\Service\TinkoffPaymentService;



class InitController extends Controller
{
    
    public function indexAction(PaymentParameterBuilder $parameterBuilder, TinkoffPaymentService $service)
    { 
        $params = $this->parameterBuilder->build();
        $params->setOrderId($orderId);
        $params->setAmount($amount);
        //set another fields
        $result = $service->initPayment($params);
        // handle result
        return $this->redirect($result->getPaymentURL());
        
    }
}
```