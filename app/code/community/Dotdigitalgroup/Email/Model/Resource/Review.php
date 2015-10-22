<?php

class Dotdigitalgroup_Email_Model_Resource_Review extends Mage_Core_Model_Mysql4_Abstract
{
    /**
     * constructor.
     */
    protected  function _construct()
    {
        $this->_init('ddg_automation/review', 'id');

    }

    /**
     * Reset the email reviews for reimport.
     *
     * @return int
     */
    public function reset()
    {
        $conn = $this->_getWriteAdapter();
        try{
            $num = $conn->update($this->getMainTable(),
                array('review_imported' => new Zend_Db_Expr('null')),
                $conn->quoteInto('review_imported is ?', new Zend_Db_Expr('not null'))
            );
            return $num;
        }catch (Exception $e){
            Mage::logException($e);
        }
    }

    /**
     * set imported in bulk query
     *
     * @param $ids
     */
    public function setImported($ids)
    {
        try{
            $write = $this->_getWriteAdapter();
            $tableName = $this->getMainTable();
            $ids = implode(', ', $ids);
            $now = Mage::getSingleton('core/date')->gmtDate();
            $write->update($tableName, array('review_imported' => 1, 'updated_at' => $now), "review_id IN ($ids)");
        }catch (Exception $e){
            Mage::logException($e);
        }
    }
}