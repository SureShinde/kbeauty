<?php
require_once 'app/Mage.php';
Mage::app();

//First we load the model
$model = Mage::getModel('productalert/observer');

//Then execute the task
$model->process();
