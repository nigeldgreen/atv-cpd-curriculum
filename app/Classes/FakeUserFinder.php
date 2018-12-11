<?php

namespace App\Classes;

use App\User;
use GuzzleHttp\Client;
use Ramsey\Uuid\Uuid;

class FakeUserFinder
{
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Fake a user that we can use for local testing
     *
     * @return mixed
     * @throws \Exception
     */
    public function getUser()
    {
        if ($this->token == "valid") {
            $user = User::make([
                'uuid' => Uuid::uuid4()->toString(),
                'name' => 'Valid User',
                'email' => 'valid@user.com',
            ]);
            return $user;
        }

        abort(401, 'Unauthenticated');
    }
}
