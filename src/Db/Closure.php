<?php
namespace Com\Component\Closure\Db;

use Com\Db\AbstractDb;
use Com\Interfaces\LazyLoadInterface;

class Closure extends AbstractDb implements LazyLoadInterface
{
    protected $tableName = 'closure';
    protected $entityClassName = 'Com\Component\Closure\Entity\Closure';
}
 
