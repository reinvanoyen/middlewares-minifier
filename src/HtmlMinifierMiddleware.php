<?php

namespace ReinVanOyen\Middlewares\HtmlMinifier;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use ReinVanOyen\Middlewares\HtmlMinifier\Contracts\HtmlMinifierInterface;

class HtmlMinifierMiddleware implements MiddlewareInterface
{
    /**
     * @var HtmlMinifierInterface $htmlMinifier
     */
    private $htmlMinifier;

    /**
     * @var StreamFactoryInterface $streamFactory
     */
    private $streamFactory;

    /**
     * HtmlMinifierMiddleware constructor.
     * @param HtmlMinifierInterface $htmlMinifier
     * @param StreamFactoryInterface $streamFactory
     */
    public function __construct(HtmlMinifierInterface $htmlMinifier, StreamFactoryInterface $streamFactory)
    {
        $this->htmlMinifier = $htmlMinifier;
        $this->streamFactory = $streamFactory;
    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        // First check if the response Content-Type is HTML
        if (stripos($response->getHeaderLine('Content-Type'), 'text/html') === 0) {

            // Get the HTML
            $html = (string) $response->getBody();

            // Create a new stream with minified HTML
            $stream = $this->streamFactory->createStream(
                $this->htmlMinifier->minify($html)
            );

            // Return the new response with minified HTML body
            return $response->withBody($stream);
        }

        return $response;
    }
}