<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Renaming\Rector\Namespace_\RenameNamespaceRector;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonySetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();
    $services = $containerConfigurator->services();

    $parameters->set(Option::PATHS, [__DIR__ . '/src', __DIR__ . '/tests']);
    $parameters->set(Option::PHPSTAN_FOR_RECTOR_PATH, __DIR__ . '/phpstan.neon');

    $parameters->set(Option::BOOTSTRAP_FILES, [
        __DIR__ . '/vendor/bin/.phpunit/phpunit-9.5-0/vendor/autoload.php',
        __DIR__ . '/vendor/autoload.php',
    ]);

    // basic rules
    $parameters->set(Option::AUTO_IMPORT_NAMES, true);
    $parameters->set(Option::IMPORT_DOC_BLOCKS, true);
    $parameters->set(Option::IMPORT_SHORT_CLASSES, false);

    $containerConfigurator->import(SetList::CODE_QUALITY);
    $services->set(TypedPropertyRector::class);

    // symfony rules
    $parameters = $containerConfigurator->parameters();
    $parameters->set(
        Option::SYMFONY_CONTAINER_XML_PATH_PARAMETER,
        __DIR__ . '/var/cache/dev/App_KernelDevDebugContainer.xml'
    );
    $containerConfigurator->import(SymfonySetList::SYMFONY_CODE_QUALITY);
    $containerConfigurator->import(SymfonySetList::SYMFONY_CONSTRUCTOR_INJECTION);
    // TODO add symfony upgrade to latest version

    // doctrine rules
    $containerConfigurator->import(DoctrineSetList::DOCTRINE_CODE_QUALITY);
    // $containerConfigurator->import(DoctrineSetList::ANNOTATIONS_TO_ATTRIBUTES);

    $services->set(RenameNamespaceRector::class)
        ->call('configure', [[
            RenameNamespaceRector::OLD_TO_NEW_NAMESPACES => [
                'App\First\OldNamespace' => 'App\First\AlreadyRenamedDirectory',
                'App\Second\OldNamespace' => 'App\Second\NewNamespace',
            ],
        ]]);
};
