<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}
