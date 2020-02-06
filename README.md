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
    $bundles = array(
        // ...
        new Xpat\TinkoffBundle\XpatTinkoffBundle(),
        // ...
    );
}
```

Usage
-----