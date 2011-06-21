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
  '/about' => array(
  	'controller' => 'Pages',
  	'function' => 'display',
  	'params' => array( 'name' => 'about' )
  ),
  '/login' => array(
    'controller' => 'Users',
    'function' => 'login',
    'params' => array()
  ),
  '/logout' => array(
    'controller' => 'Users',
    'function' => 'logout',
    'params' => array()
  ),
  '/cpanel' => array(
    'controller' => 'Auth',
    'function' => 'permissions',
    'params' => array()
  ),
  '/search' => array(
  	'controller' => 'App',
  	'function' => 'search',
  	'params' => array()
  )
);
?>