<?php

namespace Subapp\Pack\App;

class DataEntityTest
{

    protected $is_user = true;
    protected $is_hotel = false;
    protected $is_readable = true;
    
    protected $user_id = 321123;

    public $created_at = null;
    public $updated_at = null;

    protected $hotelDescription = null;
    protected $entity_name = null;

    public function __construct()
    {
        $this->created_at = new \DateTime('now - 127 days');
        $this->updated_at = new \DateTime('now - 32 days');
        
        $this->hotelDescription = str_repeat('Lorem ipsum... ', 32);
        $this->entity_name = __METHOD__;
    }

}