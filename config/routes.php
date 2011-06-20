<?php
/**
 * 
 * Customer routes
 * 
 * @var array
 */
$routes = array(
  '/' => array(
  	'controller' => 'Pages',
  	'function' => 'display',
  	'params' => array( 'name' => 'home' ) 
  ),
  'about' => array(
  	'controller' => 'Pages',
  	'function' => 'display',
  	'params' => array( 'name' => 'about' )
  ),
  'login' => array(
    'controller' => 'Users',
    'function' => 'login',
    'params' => array()
  ),
  'control_panel' => array(
    'controller' => 'Auth',
    'function' => 'permissions',
    'params' => array()
  )
);
?>