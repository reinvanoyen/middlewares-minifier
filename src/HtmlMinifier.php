<?php

namespace ReinVanOyen\Middlewares\HtmlMinifier;

use ReinVanOyen\Middlewares\HtmlMinifier\Contracts\HtmlMinifierInterface;
use WyriHaximus\HtmlCompress\Factory;

class HtmlMinifier implements HtmlMinifierInterface
{
    public function minify(string $html): string
    {
        $parser = Factory::construct();
        $compressedHtml = $parser->compress($html);

        return $compressedHtml;
    }
}