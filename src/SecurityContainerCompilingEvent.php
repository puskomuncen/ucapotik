<?php

namespace PHPMaker2025\apotik2025baru;

use Symfony\Contracts\EventDispatcher\Event;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Security Container Compiling Event
 */
class SecurityContainerCompilingEvent extends Event
{
    public const NAME = "security.container.compiling";

    public function __construct(protected ContainerBuilder $builder)
    {
    }

    public function getBuilder(): ContainerBuilder
    {
        return $this->builder;
    }

    public function getSubject(): ContainerBuilder
    {
        return $this->builder;
    }
}
