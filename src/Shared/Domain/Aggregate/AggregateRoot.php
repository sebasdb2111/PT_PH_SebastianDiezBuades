<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Shared\Domain\Aggregate;


use PruebaTecnicaPh\Shared\Domain\Bus\Event\DomainEvent;

abstract class AggregateRoot
{
    private $domainEvents = [];

    final public function pullDomainEvents(): array
    {
        $domainEvents       = $this->domainEvents;
        $this->domainEvents = [];

        return $domainEvents;
    }

    final protected function record(DomainEvent $domainEvent): void
    {
        $this->domainEvents[] = $domainEvent;
    }
}