<?php

namespace App\Domain\Filter;

use App\Domain\Enums\AttributeBehavior;
use Illuminate\Http\Request;

class FilterBase
{
    public string $attributeBehavior;

    public string $unitUrl;

    public string $displayUrl;

    public string $channelId;

    public string $unit;

    public string $slide;

    public function __construct(Request $request = null)
    {
    }
}