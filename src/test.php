<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/4/2
 * Time: 19:34
 */

require_once("Core/Consul.php");

use Jamespi\Consul\Core\Consul;

$a = new stdClass();

$baseUri = 'http://192.168.109.54:8500';

$consul = new Consul($a, $baseUri);

$result = $consul->registrationService( 'ods');

var_dump($result);