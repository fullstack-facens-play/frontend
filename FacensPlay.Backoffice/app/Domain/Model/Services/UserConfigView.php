<?php

namespace App\Domain\Model\Services;

class UserConfigView extends ConfigView
{
    public function __construct(string $path)
    {
        parent::__construct($path);
    }
}