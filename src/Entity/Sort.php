<?php

namespace Com\Component\Closure\Entity;

use Com\Entity\AbstractEntity;
use Com\Interfaces\LazyLoadInterface;

class Sort extends AbstractEntity implements LazyLoadInterface
{
	protected $properties = array(
        'group_id'
        ,'node_id'
        ,'sort'
    );
}
