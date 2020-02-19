<?php

declare(strict_types=1);

namespace PruebaTecnicaPh\Mb\Shared\Application\Bonsai;

use PruebaTecnicaPh\Shared\Domain\Bus\Command\Command;

final class BonsaiCommand implements Command
{
    private $bonsaiType;

    public function __construct(string $bonsaiType)
    {
        $this->bonsaiType = $bonsaiType;
    }

    public function bonsaiType(): string
    {
        return $this->bonsaiType;
    }
}