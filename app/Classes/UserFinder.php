<?php

namespace App\Classes;

use App\User;
use GuzzleHttp\Client;

class UserFinder
{
    protected $client;

    /**
     * UserFinder constructor
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);
    }

    /**
     * Get main user details from Atlas, using the JWT passed to the API by the caller
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUser()
    {
        $url = config('cpd-curriculum.atlasbaseurl') . '/user_data';

        $response = $this->client->request('GET', $url);
        $user_data = json_decode($response->getBody()->getContents())->data;

        $user = User::make([
            'uuid' => $user_data->uuid,
            'name' => $user_data->standard_attributes->name,
            'email' => $user_data->standard_attributes->email,
        ]);

        return $user;
    }
}
