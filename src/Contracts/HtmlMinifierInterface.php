<?php

namespace ReinVanOyen\Middlewares\HtmlMinifier\Contracts;

interface HtmlMinifierInterface
{
    /**
     * @param string $html
     * @return string
     */
    public function minify(string $html): string;
}