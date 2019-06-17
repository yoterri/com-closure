<?php
namespace Com\Component\Closure\Db;

use Com\Db\AbstractDb;
use Com\Interfaces\LazyLoadInterface;

class Node extends AbstractDb implements LazyLoadInterface
{
    protected $tableName = 'closure_node';
    protected $entityClassName = 'Com\Component\Closure\Entity\Node';
}
