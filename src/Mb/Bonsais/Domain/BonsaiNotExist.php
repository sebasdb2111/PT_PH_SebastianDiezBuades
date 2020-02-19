<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Mb\Bonsais\Domain;

use PruebaTecnicaPh\Mb\Shared\Domain\Bonsai\BonsaiId;
use PruebaTecnicaPh\Shared\Domain\DomainError;

final class BonsaiNotExist extends DomainError
{
    private $id;

    public function __construct(BonsaiId $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'bonsai_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The bonsai <%s> does not exist', $this->id->value());
    }
}
