<?php

namespace App\Classes;

use App\User;
use GuzzleHttp\Client;

class UserFinder
{
    public $user;
    protected $client;
    protected $jwt;
    protected $organisation_id;

    /**
     * UserFinder constructor
     *
     * @param $token
     */
    public function __construct($jwt, $organisation_id)
    {
        $this->client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $jwt,
            ],
        ]);

        $this->jwt = $jwt;
        $this->organisation_id = $organisation_id;
    }

    /**
     * Get main user details from Atlas, using the JWT passed to the API by the caller
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUser()
    {
        if (isset($this->user)) {
            return $this->user;
        }

        $url = config('cpd-curriculum.atlasbaseurl') . '/user_data';

        $response = $this->client->request('GET', $url);
        $user_data = json_decode($response->getBody()->getContents())->data;

        $user = User::make([
            'uuid' => $user_data->uuid,
            'name' => $user_data->standard_attributes->name,
            'email' => $user_data->standard_attributes->email,
            'jwt' => $this->jwt,
            'organisation_id' => $user_data->roles->{$this->organisation_id},
        ]);

        return $this->user = $user;
    }
}
