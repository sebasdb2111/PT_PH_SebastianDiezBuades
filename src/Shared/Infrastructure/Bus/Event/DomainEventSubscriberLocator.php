<?php

declare(strict_types = 1);

namespace PruebaTecnicaPh\Shared\Infrastructure\Bus\Event;

use PruebaTecnicaPh\Shared\Domain\Bus\Event\DomainEventSubscriber;
use PruebaTecnicaPh\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use PruebaTecnicaPh\Shared\Infrastructure\Bus\Event\RabbitMq\RabbitMqQueueNameFormatter;
use RuntimeException;
use Traversable;
use function Lambdish\Phunctional\search;

final class DomainEventSubscriberLocator
{
    private $mapping;

    public function __construct(Traversable $mapping)
    {
        $this->mapping = iterator_to_array($mapping);
    }

    public function allSubscribedTo(string $eventClass): callable
    {
        $formatted = CallableFirstParameterExtractor::forPipedCallables($this->mapping);

        return $formatted[$eventClass];
    }

    public function withRabbitMqQueueNamed(string $queueName): DomainEventSubscriber
    {
        $subscriber = search(
            static function (DomainEventSubscriber $subscriber) use ($queueName) {
                return RabbitMqQueueNameFormatter::format($subscriber) === $queueName;
            },
            $this->mapping
        );

        if (null === $subscriber) {
            throw new RuntimeException("There are no subscribers for the <$queueName> queue");
        }

        return $subscriber;
    }

    public function all(): array
    {
        return $this->mapping;
    }
}
