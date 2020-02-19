<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Shared\Domain\Bus\Command;

interface CommandBus
{
    public function dispatch(Command $command): void;
}
