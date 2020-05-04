<?php

namespace ReinVanOyen\Middlewares\HtmlMinifier;

use Oak\Contracts\Container\ContainerInterface;
use Oak\ServiceProvider;
use ReinVanOyen\Middlewares\HtmlMinifier\Contracts\HtmlMinifierInterface;

class HtmlMinifierServiceProvider extends ServiceProvider
{
    protected $isLazy = true;

    /**
     * @param ContainerInterface $app
     * @return mixed|void
     */
    public function boot(ContainerInterface $app)
    {
        //
    }

    /**
     * @param ContainerInterface $app
     * @return mixed|void
     */
    public function register(ContainerInterface $app)
    {
        $app->set(HtmlMinifierInterface::class, HtmlMinifier::class);
    }

    public function provides(): array
    {
        return [HtmlMinifierInterface::class,];
    }
}