<?php

namespace App\Contracts;

interface UserFinder
{
    /**
     * @return mixed
     */
    public function getUser();
}
