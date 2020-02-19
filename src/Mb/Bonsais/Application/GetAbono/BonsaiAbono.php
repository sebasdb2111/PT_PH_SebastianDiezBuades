<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Mb\Bonsais\Application\GetAbono;

use Carbon\Carbon;
use PruebaTecnicaPh\Mb\Bonsais\Domain\BonsaiRepository;
use PruebaTecnicaPh\Mb\Bonsais\Domain\BonsaiType;

final class BonsaiAbono
{
    private $repository;

    public function __construct(BonsaiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(BonsaiType $bonsaiType): bool
    {
        $today = Carbon::now();
        $currentMonth = $today->month;

        return (($currentMonth >= 3 && $currentMonth <= 5) || ($currentMonth >= 9 && $currentMonth <= 11))
            ? true
            : false;
    }
}
