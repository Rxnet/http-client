<?php

declare(strict_types=1);

/*
 * This file is part of the RxNET project.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rxnet\HttpClient;

use Clue\React\Buzz\Browser as ReactBrowser;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;
use React\Stream\ReadableStreamInterface;
use Rx\Observable;

class Browser
{
    /** @var ReactBrowser */
    private $browser;

    public function __construct(ReactBrowser $browser)
    {
        $this->browser = $browser;
    }

    public function getBrowser(): ReactBrowser
    {
        return $this->browser;
    }

    /**
     * @param string|UriInterface $url URI for the request.
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingTraversableParameterTypeHintSpecification
     */
    public function get($url, array $headers = []): Observable
    {
        return Observable::fromPromise($this->browser->get($url, $headers));
    }

    /**
     * @param string|UriInterface            $url      URI for the request.
     * @param string|ReadableStreamInterface $contents
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingTraversableParameterTypeHintSpecification
     */
    public function post($url, array $headers = [], $contents = ''): Observable
    {
        return Observable::fromPromise($this->browser->post($url, $headers, $contents));
    }

    /**
     * @param string|UriInterface $url URI for the request.
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingTraversableParameterTypeHintSpecification
     */
    public function head($url, array $headers = []): Observable
    {
        return Observable::fromPromise($this->browser->head($url, $headers));
    }

    /**
     * @param string|UriInterface            $url      URI for the request.
     * @param string|ReadableStreamInterface $contents
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingTraversableParameterTypeHintSpecification
     */
    public function patch($url, array $headers = [], $contents = ''): Observable
    {
        return Observable::fromPromise($this->browser->patch($url, $headers, $contents));
    }

    /**
     * @param string|UriInterface            $url      URI for the request.
     * @param string|ReadableStreamInterface $contents
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingTraversableParameterTypeHintSpecification
     */
    public function put($url, array $headers = [], $contents = ''): Observable
    {
        return Observable::fromPromise($this->browser->put($url, $headers, $contents));
    }

    /**
     * @param string|UriInterface            $url      URI for the request.
     * @param string|ReadableStreamInterface $contents
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingTraversableParameterTypeHintSpecification
     */
    public function delete($url, array $headers = [], $contents = ''): Observable
    {
        return Observable::fromPromise($this->browser->delete($url, $headers, $contents));
    }

    /**
     * @param string|UriInterface $url URI for the request.
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingTraversableParameterTypeHintSpecification
     */
    public function submit($url, array $fields, array $headers = [], string $method = 'POST'): Observable
    {
        return Observable::fromPromise($this->browser->submit($url, $fields, $headers, $method));
    }

    public function send(RequestInterface $request): Observable
    {
        return Observable::fromPromise($this->browser->send($request));
    }
}
