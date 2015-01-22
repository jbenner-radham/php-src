--TEST--
Bug #61347 (inconsist is_set behavior of Arrayobject)
--FILE--
<?php
$a = array('b' => NULL, 37 => NULL);
var_dump(is_set($a['b'])); //false

$b = new ArrayObject($a);
var_dump(is_set($b['b'])); //false
var_dump(is_set($b[37])); //false
var_dump(is_set($b['no_exists'])); //false
var_dump(empty($b['b'])); //true
var_dump(empty($b[37])); //true

var_dump(array_key_exists('b', $b)); //true
var_dump($b['b']);

$a = array('b' => '', 37 => false);
$b = new ArrayObject($a);
var_dump(is_set($b['b'])); //true
var_dump(is_set($b[37])); //true
var_dump(is_set($b['no_exists'])); //false
var_dump(empty($b['b'])); //true
var_dump(empty($b[37])); //true


--EXPECT--
bool(false)
bool(false)
bool(false)
bool(false)
bool(true)
bool(true)
bool(true)
NULL
bool(true)
bool(true)
bool(false)
bool(true)
bool(true)
