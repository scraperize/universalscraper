<?php

namespace Scraperize\UniversalScraper;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

/**
 * Class AbstractScraper
 *
 * @package Scraperize\UniversalScraper
 */
abstract class AbstractScraper
{
    const BASE_URI = null;

    /** @var CookieJar $cookieJar */
    protected $cookieJar;

    /** @var Client $httpClient */
    protected $httpClient;

    /**
     * AbstractScraper constructor.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $options = array_merge([
            'base_uri' => static::BASE_URI,
            'cookies' => $this->cookieJar,
        ], $options);

        $this->cookieJar = new CookieJar();
        $this->httpClient = new Client($options);
    }
}
