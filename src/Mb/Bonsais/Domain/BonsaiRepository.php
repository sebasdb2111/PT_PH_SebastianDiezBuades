<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Mb\Bonsais\Domain;

use PruebaTecnicaPh\Mb\Shared\Domain\Bonsai\BonsaiId;

interface BonsaiRepository
{
    public function search(BonsaiId $id): ?Bonsai;
}
