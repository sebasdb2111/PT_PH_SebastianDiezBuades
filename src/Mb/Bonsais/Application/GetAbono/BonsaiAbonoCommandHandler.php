<?php

declare(strict_types=1);

namespace PruebaTecnicaPh\Mb\Bonsais\Application\GetAbono;

use PruebaTecnicaPh\Mb\Shared\Application\Bonsai\BonsaiCommand;
use PruebaTecnicaPh\Shared\Domain\Bus\Command\CommandHandler;

final class BonsaiAbonoCommandHandler implements CommandHandler
{
    private $abono;

    public function __construct(BonsaiAbono $abono)
    {
        $this->abono = $abono;
    }

    public function __invoke(BonsaiCommand $command)
    {
        $bonsaiType = new BonsaiAbono($command->bonsaiType());

        return $this->abono->__invoke($bonsaiType);
    }
}
