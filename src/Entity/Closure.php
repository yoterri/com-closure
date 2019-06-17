<?php

namespace Com\Component\Closure\Entity;

use Com\Entity\AbstractEntity;
use Com\Interfaces\LazyLoadInterface;

class Closure extends AbstractEntity implements LazyLoadInterface
{
	protected $properties = array(
        'id'
        ,'parent_id'
        ,'child_id'
        ,'depth'
        ,'group_id'
    );
}
