<?php

class Aitoc_Aitreports_Model_Mysql4_Export extends Mage_Core_Model_Mysql4_Abstract
{
    /**
     * Initialize resource
     *
     */
    protected function _construct()
    {
        $this->_init('aitreports/export', 'export_id');
    }

    public function prepareOrderCollection(Aitoc_Aitreports_Model_Export $export, Varien_Data_Collection_Db $collection)
    {
        $select    = $collection->getSelect();
        $from      = $select->getPart(Varien_Db_Select::FROM);
        $mainTable = Mage::helper('aitreports/version')->collectionMainTableAlias();

        $select
            ->setPart(Varien_Db_Select::FROM, array())
            ->from(array('eo' => $this->getTable('aitreports/export_order')))
            ->join(array($mainTable => $from[$mainTable]['tableName']), 'eo.order_id = '.$mainTable.'.entity_id', array())
            ->where('eo.export_id = ?', $export->getId());
    }
}
