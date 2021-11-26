# Reproducable

Quick Start copy the following into your bash console:

```
git clone git@github.com:alexander-schranz/rector-namespace-rename-reproducable.git
cd rector-namespace-rename-reproducable
composer install
bin/console cache:clear
vendor/bin/simple-phpunit install

vendor/bin/rector process
# second run fails:
vendor/bin/rector process
```


Erros with:

```
PHP Fatal error:  Uncaught TypeError: RectorPrefix20211123\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator::__construct(): Argument #1 ($container) must be of type RectorPrefix20211123\Symfony\Component\DependencyInjection\ContainerBuilder, Symfony\Component\DependencyInjection\ContainerBuilder given, called in /private/tmp/rector-namespace-rename-reproducable/vendor/symfony/framework-bundle/Kernel/MicroKernelTrait.php on line 155 and defined in /private/tmp/rector-namespace-rename-reproducable/vendor/rector/rector/vendor/symfony/dependency-injection/Loader/Configurator/ContainerConfigurator.php:37
Stack trace:
  ...
```
