<?php

declare(strict_types=1);

namespace PruebaTecnicaPh\Mb\Bonsais\Domain;

use PruebaTecnicaPh\Mb\Shared\Domain\Bonsai\BonsaiId;
use PruebaTecnicaPh\Shared\Domain\Aggregate\AggregateRoot;

final class Bonsai extends AggregateRoot
{
    private $id;
    private $type;

    public function __construct(BonsaiId $id, BonsaiType $type)
    {
        $this->id    = $id;
        $this->type  = $type;
    }

    public static function create(BonsaiId $id, BonsaiType $type): self
    {
        $bonsai = new self($id, $type);

        $bonsai->record(new BonsaiCreatedDomainEvent($id->value(), $type->value()));

        return $bonsai;
    }

    public function id(): BonsaiId
    {
        return $this->id;
    }

    public function type(): BonsaiType
    {
        return $this->type;
    }
}
