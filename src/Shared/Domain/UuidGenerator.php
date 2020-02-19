<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Shared\Domain;

interface UuidGenerator
{
    public function generate(): string;
}
