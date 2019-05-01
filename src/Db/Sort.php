<?php
namespace Com\Component\Closure\Db;

use Com\Db\AbstractDb;
use Com\LazyLoadInterface;

class Sort extends AbstractDb implements LazyLoadInterface
{
    protected $tableName = 'closure_sort';
    protected $entityClassName = 'Com\Component\Closure\Entity\Sort';
}
