<?php

namespace App\Guards;

use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;

class JwtGuard implements Guard
{
    use GuardHelpers;

    protected $request;

    /**
     * Create a new authentication guard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        if (! is_null($this->user)) {
            return $this->user;
        }
        $user = null;
        $jwt = $this->getJwtForRequest();
        $organisation_id = $this->getOrganisationIdForRequest();

        if (! empty($jwt) && ! empty($organisation_id)) {
            $user = (app()->makeWith('App\Classes\UserFinder', [
                'jwt' => $jwt,
                'organisation_id' => $organisation_id,
            ]))->getUser();
        }

        return $this->user = $user;
    }

    /**
     * Get the token for the current request.
     *
     * @return string
     */
    public function getJwtForRequest()
    {
        return $this->request->bearerToken();
    }

    public function getOrganisationIdForRequest()
    {
        return $this->request->header('X-Organisation-Id');
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        //
    }

    /**
     * Set the current request instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this
     */
    public function setRequest(Request $request)
    {
        //
    }
}
