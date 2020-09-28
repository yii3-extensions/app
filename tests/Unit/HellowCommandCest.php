<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\CommandLoader\ContainerCommandLoader;
use Symfony\Component\Console\Tester\CommandTester;
use App\Tests\UnitTester;
use Yii\Console;
use Yii\ParamsConsole;
use Yiisoft\Di\Container;

final class HellowCommandCest
{
    private ContainerInterface $container;

    public function _before(UnitTester $I): void
    {
        $params = new Console();

        $this->container = new Container($params->buildConfig());
    }

    public function testExecute(UnitTester $I): void
    {
        $app = new Application();
        $params = new ParamsConsole();

        $loader = new ContainerCommandLoader(
            $this->container,
            $params->getConsoleCommands()
        );

        $app->setCommandLoader($loader);

        $command = $app->find('hellow');

        $commandCreate = new CommandTester($command);

        $commandCreate->setInputs(['yes']);

        $I->assertEquals(1, $commandCreate->execute([]));

        $output = $commandCreate->getDisplay(true);

        $I->assertStringContainsString('Hellow Command', $output);
    }
}
