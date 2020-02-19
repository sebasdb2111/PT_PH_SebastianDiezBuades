<?php

declare(strict_types=1);

namespace PruebaTecnicaPh\Mb\Bonsais\Application\GetAbono;

use PruebaTecnicaPh\Mb\Shared\Application\Bonsai\BonsaiCommand;
use PruebaTecnicaPh\Mb\Shared\Domain\Bonsai\BonsaiId;
use PruebaTecnicaPh\Shared\Domain\Bus\Command\CommandHandler;

final class BonsaiPulverizarCommandHandler implements CommandHandler
{
    private $pulverizar;

    public function __construct(BonsaiPulverizar $pulverizar)
    {
        $this->pulverizar = $pulverizar;
    }

    public function __invoke(BonsaiCommand $command)
    {
        $bonsaiType = new BonsaiId($command->bonsaiType());

        return $this->pulverizar->__invoke($bonsaiType);
    }
}
