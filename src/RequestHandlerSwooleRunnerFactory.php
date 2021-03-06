<?php
/**
 * @see       https://github.com/zendframework/zend-expressive-swoole for the canonical source repository
 * @copyright Copyright (c) 2018 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://github.com/zendframework/zend-expressive-swoole/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Zend\Expressive\Swoole;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Swoole\Http\Server as SwooleHttpServer;
use Zend\Expressive\ApplicationPipeline;
use Zend\Expressive\Response\ServerRequestErrorResponseGenerator;

class RequestHandlerSwooleRunnerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerSwooleRunner
    {
        return new RequestHandlerSwooleRunner(
            $container->get(ApplicationPipeline::class),
            $container->get(ServerRequestInterface::class),
            $container->get(ServerRequestErrorResponseGenerator::class),
            $container->get(SwooleHttpServer::class)
        );
    }
}
