<?php

namespace Portal\Component\Github;

use Github;
use Github\Api\CurrentUser;
use Github\Api\Gists;
use Github\Client;

/**
 * Class GithubApi.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class GithubApi
{
    /**
     * @var null|Github\HttpClient\CachedHttpClient
     */
    protected $cache = null;

    /**
     * Constructor.
     *
     * @param bool|string $cacheDir
     * @param bool|string $userToken
     */
    public function __construct($cacheDir = false, $userToken = false)
    {
        if ($cacheDir) {
            $this->cache = new Github\HttpClient\CachedHttpClient(['cache_dir' => $cacheDir]);
        }

        if ($userToken) {
            $this->getClient()->authenticate($userToken, Client::AUTH_HTTP_TOKEN);
        }
    }

    /**
     * Get a client object, so you can access to all GitHub.
     *
     * @return Client
     */
    public function getClient()
    {
        return new Client($this->cache);
    }

    /**
     * Get cache.
     *
     * @return null|Github\HttpClient\CachedHttpClient $cache
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @return array
     */
    public function getGists()
    {
        /** @var Gists $gistClient */
        $gistClient = $this->getClient()->api('gists');

        return $gistClient->all();
    }

    /**
     * @return array
     */
    public function getRepositories()
    {
        /** @var CurrentUser $repoClient */
        $repoClient = $this->getClient()->api('me');

        return $repoClient->repositories();
    }
}
