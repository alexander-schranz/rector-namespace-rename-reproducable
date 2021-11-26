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
