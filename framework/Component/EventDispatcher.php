<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface;
use Yii\Params;
use Yii\Exception\InvalidEventConfigurationFormatException;
use Yii\Exception\InvalidListenerConfigurationException;
use Yiisoft\EventDispatcher\Provider\ListenerCollection;
use Yiisoft\EventDispatcher\Provider\Provider;
use Yiisoft\Injector\Injector;

use function array_keys;
use function gettype;
use function is_array;
use function is_callable;
use function is_object;
use function is_string;
use function method_exists;

final class EventDispatcher
{
    public function buildConfig(ContainerInterface $container): Provider
    {
        $params = new Params();

        $eventListeners = $params->getEventListeners();
        $injector = new Injector($container);
        $listenerCollection = new ListenerCollection();

        foreach ($eventListeners as $eventName => $listeners) {
            if (!is_string($eventName)) {
                throw new InvalidEventConfigurationFormatException(
                    'Incorrect event listener format. Format with event name must be used.'
                );
            }

            if (!is_array($listeners)) {
                $type = $this->isCallable($listeners, $container) ? 'callable' : gettype($listeners);

                throw new InvalidEventConfigurationFormatException(
                    "Event listeners for $eventName must be an array, $type given."
                );
            }

            foreach ($listeners as $callable) {
                try {
                    if (!$this->isCallable($callable, $container)) {
                        $type = gettype($listeners);

                        throw new InvalidListenerConfigurationException(
                            "Listener must be a callable. $type given."
                        );
                    }
                } catch (ContainerExceptionInterface $exception) {
                    throw new InvalidListenerConfigurationException(
                        "Could not instantiate event listener or listener class has invalid configuration.",
                        0,
                        $exception
                    );
                }

                $listener = static function (object $event) use ($injector, $callable, $container) {
                    if (is_array($callable) && !is_object($callable[0])) {
                        $callable = [$container->get($callable[0]), $callable[1]];
                    }

                    return $injector->invoke($callable, [$event]);
                };
                $listenerCollection = $listenerCollection->add($listener, $eventName);
            }
        }

        return new Provider($listenerCollection);
    }

    private function isCallable($definition, ContainerInterface $container): bool
    {
        if (is_callable($definition)) {
            return true;
        }

        if (
            is_array($definition)
            && array_keys($definition) === [0, 1]
            && is_string($definition[0])
            && $container->has($definition[0])
        ) {
            $object = $container->get($definition[0]);

            return method_exists($object, $definition[1]);
        }

        return false;
    }
}
