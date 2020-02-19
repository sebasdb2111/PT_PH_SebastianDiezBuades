<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Mb\Bonsais\Infrastructure\Persistence\Doctrine;

use PruebaTecnicaPh\Mb\Shared\Domain\Bonsai\BonsaiId;
use PruebaTecnicaPh\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class BonsaiIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'bonsai_id';
    }

    protected function typeClassName(): string
    {
        return BonsaiId::class;
    }
}
