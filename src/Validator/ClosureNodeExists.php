<?php

namespace Com\Component\Closure\Validator;

use Zend\Validator\AbstractValidator;
use Zend\Db\Sql\Select;

use Com\Component\Closure\Control;

class ClosureNodeExists extends AbstractValidator
{

    const RECORD_NOT_FOUND = 'record_not_found';

    protected $messageTemplates = array(
        self::RECORD_NOT_FOUND => 'Specified Value was not found in the database',
    );

    /**
     * @var Com\Component\Closure\Control
     */
    protected $cClosure;

    protected $byPassValue = null;
    protected $hasByPassValue = false;


    /**
     * @param $closure Com\Component\Closure\Control
     */
    function setClosureControl(Control $closure)
    {
        $this->cClosure = $closure;
    }

    /**
     * @return $closure Com\Component\Closure\Control
     */
    function getClosureControl()
    {
        return $this->cClosure;
    }

    /**
     * @param mixed $valule
     * @return ClosureNodeExists
     */
    function setByPassValue($value)
    {
        $this->byPassValue = $value;
        $this->hasByPassValue = true;
        return $this;
    }

    /**
     * @return mixed
     */
    function getByPassValue()
    {
        return $this->byPassValue;
    }

    /**
     * @return ClosureNodeExists
     */
    function removeByPassValue()
    {
        $this->hasByPassValue = false;
        return $this;
    }


    /**
     * @return bool
     */
    public function isValid($value)
    {
        $cClosure = $this->getClosureControl();

        if(!$cClosure)
        {
            throw new \Exception('Closure control class was not provided');
        }

        if($this->hasByPassValue)
        {
            if(is_array($this->byPassValue))
            {
                $flag = in_array($value, $this->byPassValue);
                if($flag)
                {
                    return true;
                }
            }
            else
            {
                $flag = ($value == $this->byPassValue);
                if($flag)
                {
                    return true;
                }
            }
        }
        

        #
        $dbNode = $cClosure->getDbNode();
        $dbClosure = $cClosure->getDbClosure();
        $dbGroup = $cClosure->getDbGroup();
        
        #
        $grp = $cClosure->getGroup();

        #
        $select = new Select();
        $select->from(array('n' => $dbNode));
        $select->join(array('c' => $dbClosure), 'c.child_id = n.id', array());
        $select->join(array('cg' => $dbGroup), 'cg.id = c.group_id', array());

        $select->where(function($where) use($grp, $value) {
            $where->equalTo('cg.id', $grp);
            $where->equalTo('n.id', $value);
        });

        $rowset = $dbNode->executeCustomSelect($select);
        $total = $rowset->count();

        #echo "Total: $total<br>";
        #$dbNode->debugSql($select, 0);

        $flag = $total > 0;

        if(!$flag)
        {
            $this->error(self::RECORD_NOT_FOUND);
        }

        return $flag;
    }
}
