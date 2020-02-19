<?php

declare(strict_types=1);

namespace PruebaTecnicaPh\Mb\Bonsais\Application\GetAbono;

use PruebaTecnicaPh\Mb\Shared\Domain\Bonsai\BonsaiId;
use PruebaTecnicaPh\Shared\Domain\Bus\Command\CommandHandler;

final class BonsaiRiegoCommandHandler implements CommandHandler
{
    private $finder;

    public function __construct(BonsaiAbono $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(FindBonsaiCommand $command)
    {
        $id = new BonsaiId($command->id());

        return $this->finder->__invoke($id);
    }
}
