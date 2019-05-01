<?php
namespace Com\Component\Closure\Db;

use Com\Db\AbstractDb;
use Com\LazyLoadInterface;

class Group extends AbstractDb implements LazyLoadInterface
{
    protected $tableName = 'closure_group';
    protected $entityClassName = 'Com\Component\Closure\Entity\Group';
}
