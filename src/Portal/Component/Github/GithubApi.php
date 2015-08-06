<?php

namespace Portal\Component\Github;

use Github;

/**
 * Class GithubApi
 *
 * @package Portal\Component\Github
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class GithubApi
{
    /**
     * @var null|Github\HttpClient\CachedHttpClient
     */
    protected $cache = null;

    /**
     * Constructor
     *
     * @param boolean|string $cacheDir
     */
    public function __construct($cacheDir = false)
    {
        if ($cacheDir) {
            $this->cache = new Github\HttpClient\CachedHttpClient(['cache_dir' => $cacheDir]);
        }
    }

    /**
     * Get a client object, so you can access to all GitHub
     *
     * @return Github\Client
     */
    public function getClient()
    {
        return new Github\Client($this->cache);
    }

    /**
     * Get cache
     *
     * @return null|Github\HttpClient\CachedHttpClient $cache
     */
    public function getCache()
    {
        return $this->cache;
    }
}