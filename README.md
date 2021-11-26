# Reproducable

```
git clone git@github.com:alexander-schranz/rector-namespace-rename-reproducable.git
composer install
bin/console cache:clear
vendor/bin/simple-phpunit install

vendor/bin/rector process
# second run fails:
vendor/bin/rector process
```
