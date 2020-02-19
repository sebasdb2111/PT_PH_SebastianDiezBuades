<?php

declare(strict_types=1);

namespace PruebaTecnicaPh\Mb\Bonsais\Application\GetAbono;

use PruebaTecnicaPh\Mb\Shared\Domain\Bonsai\BonsaiId;
use PruebaTecnicaPh\Shared\Domain\Bus\Command\CommandHandler;

final class BonsaiTransplanteCommandHandler implements CommandHandler
{
    private $finder;

    public function __construct(BonsaiAbono $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(BonsaiCommand $command)
    {
        $id = new BonsaiId($command->id());

        return $this->finder->__invoke($id);
    }
}
