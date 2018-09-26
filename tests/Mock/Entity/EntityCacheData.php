<?php

namespace Subapp\Pack\Tests\Mock\Entity;

/**
 * Class EntityCacheData
 * @package Subapp\Pack\Tests\Mock\Entity
 */
class EntityCacheData
{
    
    public $userId;
    public $name;

    public $created;
    public $updated;
    
    public $boolean1 = false;
    public $boolean2 = true;
    public $boolean3 = true;
    public $boolean4 = false;
    public $boolean5 = true;
    public $boolean6 = false;
    public $boolean7 = true;
    public $boolean8 = true;
    public $boolean9 = true;
    
    public $float1 = 0.00;
    public $float2 = 0.00;

    public $double1 = 0.00;
    public $double2 = 0.00;

    public $int1 = 123456789;
    public $int2 = -123456789;
    public $int3 = null;
    public $int4 = 4294967295 - 1;

    public $lot_of_symbols_in_field_name1 = 123;
    public $lot_of_symbols_in_field_name2 = 321;
    public $lot_of_symbols_in_field_name3 = 456;
    public $lot_of_symbols_in_field_name4 = 654;
    public $lot_of_symbols_in_field_name5 = 789;
    public $lot_of_symbols_in_field_name6 = 987;
    
    public $array1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0,];
    public $array2 = [9, 8, 7, 6, 5, 4, 3, 2, 1, 0,];
    
}