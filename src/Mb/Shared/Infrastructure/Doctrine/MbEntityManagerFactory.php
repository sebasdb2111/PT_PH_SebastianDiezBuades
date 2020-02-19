<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Mb\Shared\Infrastructure\Doctrine;

use PruebaTecnicaPh\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;

final class MbEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__ . '/../../../../../databases/mb.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Mb', 'PruebaTecnicaPh\Mb')
        );

        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(__DIR__ . '/../../../../Mb', 'Mb');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}
