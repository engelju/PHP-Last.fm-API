<?php

namespace Tests\Api;

use LastFmApi\Api\UserApi;

/**
 * Tests user api calls.
 *
 * @author Marcos Peña
 */
class UserTest extends BaseNotAuthenticatedApiTest
{
    private $userApi;

    const USERNAME_NAME = 'RJ';

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        if (!$this->isApiInitiated()) {
            $this->initiateApi();
        }
        parent::__construct($name, $data, $dataName);
        $this->userApi = new UserApi($this->authentication);
    }

    public function testFriends()
    {
        $result = $this->userApi->getFriends([
            'user'  => self::USERNAME_NAME,
            'limit' => 1, ]
        );
        $this->assertNotEmpty($result);
    }

    public function testLovedTracks()
    {
        $result = $this->userApi->getLovedTracks([
            'user' => self::USERNAME_NAME, ]
        );
        $this->assertNotEmpty($result);
    }

    public function testRecentTracks()
    {
        $result = $this->userApi->getRecentTracks([
            'user' => self::USERNAME_NAME, ]
        );
        $this->assertNotEmpty($result);
    }

    public function testTopAlbums()
    {
        $result = $this->userApi->getTopAlbums([
            'user'  => self::USERNAME_NAME,
            'limit' => 1, ]
        );
        $this->assertNotEmpty($result);
    }

    public function testTopArtists()
    {
        $result = $this->userApi->getTopArtists([
            'user'  => self::USERNAME_NAME,
            'limit' => 1, ]
        );
        $this->assertNotEmpty($result);
    }

    public function testTopTags()
    {
        $result = $this->userApi->getTopTags([
            'user'  => self::USERNAME_NAME,
            'limit' => 1, ]
        );
        $this->assertNotEmpty($result);
    }

    public function testTopTracks()
    {
        $result = $this->userApi->getTopTracks([
            'user'  => self::USERNAME_NAME,
            'limit' => 1, ]
        );
        $this->assertNotEmpty($result);
    }

    public function testWeeklyAlbumChart()
    {
        $result = $this->userApi->getWeeklyAlbumChart([
            'user' => self::USERNAME_NAME, ]
        );
        $this->assertNotEmpty($result);
    }

    public function testWeeklyChartList()
    {
        $result = $this->userApi->getWeeklyChartList([
            'user' => self::USERNAME_NAME, ]
        );
        $this->assertNotEmpty($result);
    }

    public function testWeeklyTrackChart()
    {
        $result = $this->userApi->getWeeklyTrackChart([
            'user' => self::USERNAME_NAME, ]
        );
        $this->assertNotEmpty($result);
    }
}
