<?php

namespace Tests\Api;

use LastFmApi\Api\AuthApi;
use LastFmApi\Exception\ApiFailedException;

/**
 * Tests geo api calls.
 *
 * @author Marcos Peña
 */
class AuthTest extends BaseApiTest
{
    protected $authentication;

    public function testGetToken()
    {
        if (empty($this->apiKey) || empty($this->apiSecret)) {
            $this->fail('You must provide a valid apiKey and a valid apiToken!');
        }
        $authentication = new AuthApi('gettoken', [
            'apiKey'    => $this->apiKey,
            'apiSecret' => $this->apiSecret,
        ]);

        $this->assertNotEmpty($authentication->token);
    }

    public function testGetSession()
    {
        if (empty($this->apiKey) || empty($this->apiSecret) || empty($this->token)) {
            $this->fail('You must provide a valid apiKey and a valid apiToken!');
        }
        try {
            $authorization = new AuthApi('getsession', [
                'apiKey'    => $this->apiKey,
                'apiSecret' => $this->apiSecret,
                'token'     => '850e618e152aab87c4de6af8c8362e2f',
            ]);
            $username = $authorization->username;
            $subscriber = $authorization->subscriber;
            $sessionKey = $authorization->sessionKey;
            $ok = $username !== null && $subscriber !== null && $sessionKey !== null;
            $this->assertTrue($ok);
        } catch (ApiFailedException $exception) {
            if ($exception->getCode() === 4 && $exception->getMessage() == 'Invalid authentication token supplied') {
                $this->markTestSkipped('Token problably expired');
            }
        }
    }
}