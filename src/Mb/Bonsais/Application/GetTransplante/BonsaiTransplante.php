<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Mb\Bonsais\Application\GetAbono;

use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Boolean;
use PruebaTecnicaPh\Mb\Bonsais\Domain\BonsaiRepository;
use PruebaTecnicaPh\Mb\Shared\Domain\Bonsai\BonsaiId;

final class BonsaiTransplante
{
    private $repository;

    public function __construct(BonsaiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(BonsaiId $id): Boolean
    {
        $today = Carbon::now();
        $currentMonth = $today->month;

        return $currentMonth === 3
            ? true
            : false;
    }
}
