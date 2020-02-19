<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Mb\Bonsais\Application\GetAbono;

use Carbon\Carbon;
use PruebaTecnicaPh\Mb\Bonsais\Domain\Bonsai;
use PruebaTecnicaPh\Mb\Bonsais\Domain\BonsaiNotExist;
use PruebaTecnicaPh\Mb\Bonsais\Domain\BonsaiRepository;
use PruebaTecnicaPh\Mb\Shared\Domain\Bonsai\BonsaiId;

final class BonsaiRiego
{
    private $repository;

    public function __construct(BonsaiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(BonsaiId $id): string
    {
        $today = Carbon::now();
        $currentMonth = $today->month;
        $isSummer = ($currentMonth >= 7 && $currentMonth <= 8) ? true : false;

        $riego = 'Muy frecuente';

        if ($bonsaiType === 'manzano' && !$isSummer) {
            $riego = 'frecuente';
        }

        if (($bonsaiType === 'ficus' || $bonsaiType === 'olivo') && !$isSummer) {
            $riego = 'Poco frecuente';
        }

        return $riego;
    }
}
