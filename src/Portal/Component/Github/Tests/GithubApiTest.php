<?php

namespace Portal\Component\Github\Tests;

use Github;
use Portal\Component\Github\GithubApi;

/**
 * Class GithubApiTest.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class GithubApiTest extends \PHPUnit_Framework_TestCase
{
    public function testServiceWithDefaultValues()
    {
        $service = new GithubApi();
        $client  = $service->getClient();

        $this->assertInstanceOf('Github\Client', $client);
        $this->assertInstanceOf('Github\HttpClient\HttpClient', $client->getHttpClient());
        $this->assertNull($service->getCache());
    }

    public function testServiceWithConfigLoaded()
    {
        $service = new GithubApi('/tmp/github-api-dir');
        $client  = $service->getClient();

        $this->assertInstanceOf('Github\Client', $client);
        $this->assertInstanceOf('Github\HttpClient\HttpClient', $client->getHttpClient());
        $this->assertInstanceOf('Github\HttpClient\CachedHttpClient', $service->getCache());
    }
}
