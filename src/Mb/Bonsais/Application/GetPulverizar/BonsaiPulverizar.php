<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Mb\Bonsais\Application\GetPulverizar;

use PruebaTecnicaPh\Mb\Bonsais\Domain\Bonsai;
use PruebaTecnicaPh\Mb\Bonsais\Domain\BonsaiNotExist;
use PruebaTecnicaPh\Mb\Bonsais\Domain\BonsaiRepository;
use PruebaTecnicaPh\Mb\Bonsais\Domain\BonsaiType;
use PruebaTecnicaPh\Mb\Shared\Domain\Bonsai\BonsaiId;

final class BonsaiPulverizar
{
    private $repository;

    public function __construct(BonsaiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(BonsaiType $bonsaiType): string
    {
        if ('olmo' !== $bonsaiType) {
            throw new \Error("Su bonsai es de tipo <$bonsaiType> por favor introduzca un tipo Olmo");
        }

        // Segun las reglas de negocio el olmo siempre será pulverizado de forma muy frecuente ya sea en
        // julio o agosto como el resto del año

        return 'Muy frecuente';
    }
}
