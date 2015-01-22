--TEST--
Phar object: ArrayAccess and is_set
--SKIPIF--
<?php if (!extension_loaded('phar')) die('skip'); ?>
<?php if (!extension_loaded("spl")) die("skip SPL not available"); ?>
--INI--
phar.require_hash=0
--FILE--
<?php

$pharconfig = 0;

require_once 'files/phar_oo_test.inc';

$phar = new Phar($fname);

var_dump(is_set($phar['a.php']));
var_dump(is_set($phar['b.php']));
var_dump(is_set($phar['b/c.php']));
var_dump(is_set($phar['b/d.php']));
var_dump(is_set($phar['e.php']));

?>
===DIR===
<?php
var_dump(is_set($phar['b']));
?>
===NA===
<?php
var_dump(is_set($phar['a']));
var_dump(is_set($phar['b/c']));
var_dump(is_set($phar[12]));
var_dump(is_set($phar['b']));

?>
===DONE===
--CLEAN--
<?php
unlink(dirname(__FILE__) . '/files/phar_oo_010.phar.php');
__halt_compiler();
?>
--EXPECTF--
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
===DIR===
bool(true)
===NA===
bool(false)
bool(false)
bool(false)
bool(true)
===DONE===
