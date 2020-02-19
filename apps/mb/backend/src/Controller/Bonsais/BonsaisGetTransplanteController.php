<?php

declare(strict_types=1);

namespace PruebaTecnicaPh\Apps\Mb\Backend\Controller\Bonsais;

use PruebaTecnicaPh\Mb\Shared\Application\Bonsai\BonsaiCommand;
use PruebaTecnicaPh\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class BonsaisGetTransplanteController
{
    private $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(string $bonsaiType, Request $request)
    {
        $bonsai = new BonsaiCommand($bonsaiType);
        $this->bus->dispatch($bonsai);

        return new Response('', Response::HTTP_OK);
    }
}
