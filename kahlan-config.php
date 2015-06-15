<?php
use filter\Filter;

/**
 * Initializing custom namespaces
 */
Filter::register('mycustom.namespaces', function($chain) {
  $this->_autoloader->addPsr4('RomanNumericals\\', __DIR__ . '/Models/');
});

Filter::apply($this, 'namespaces', 'mycustom.namespaces');

// WHY DO I HAVE TO INCLUDE THIS? WHY THERE IS MKDIR PERMISSION PROBLEM???
//require __DIR__ . '/Supermarket/Models/PricingModelAbstract.php';
//require __DIR__ . '/Supermarket/Models/UnitPrice.php';
