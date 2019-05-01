<?php

namespace Com\Component\Closure\Entity;

use Com\Entity\AbstractEntity;
use Com\LazyLoadInterface;

class Group extends AbstractEntity implements LazyLoadInterface
{
	protected $properties = array(
        'id'
        ,'name'
    );
}