<?php

namespace Add\Domain\Enum;

class AttributeBehavior
{
    public static $nothing = '';
    
    public static $store = 'store';

    public static $update = 'update';

    public static $destroy = 'destroy';

    public static $destroyAll = 'destroyAll';

    public static $getAll = 'getAll';
    
    public static $getById = 'getById';
}