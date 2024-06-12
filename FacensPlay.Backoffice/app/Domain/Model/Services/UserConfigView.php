<?php

namespace App\Domain\Model\Services;

use App\User;

class UserConfigView extends ConfigView
{
    public $user;
    public function __construct(string $path, User $user)
    {
        parent::__construct($path);

        $this->user = $user;
    }
}