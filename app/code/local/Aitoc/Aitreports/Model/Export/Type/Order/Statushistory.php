<?php

class Aitoc_Aitreports_Model_Export_Type_Order_Statushistory implements Aitoc_Aitreports_Model_Export_Type_Interface
{
    /**
     * 
     * @param SimpleXMLElement $orderXml
     * @param Mage_Sales_Model_Order $order
     * @param Varien_Object $exportConfig
     */
    public function prepareXml(SimpleXMLElement $orderXml, Mage_Core_Model_Abstract $order, Varien_Object $exportConfig)
    {
        /* @var $order Mage_Sales_Model_Order */

        if (empty($exportConfig['entity_type']['order_statushistory']))
        {
            return false;
        }

        $statusesHistoryXml = $orderXml->addChild('statuseshistory');

        foreach ($order->getStatusHistoryCollection() as $statusHistory)
        {
            $statusHistoryXml = $statusesHistoryXml->addChild('statushistory');
            
            foreach($statusHistory->getData() as $field => $value)
            {
                $statusHistoryXml->addChild($field, $value);
            }
        }
    }
}
