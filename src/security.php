<?php

namespace PHPMaker2025\apotik2025baru;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->extension('security', Config('SECURITY'));
};
