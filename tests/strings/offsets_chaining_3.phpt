--TEST--
testing the behavior of string offset chaining
--INI--
error_reporting=E_ALL | E_DEPRECATED
--FILE--
<?php
$string = "foobar";
var_dump(is_set($string[0][0][0][0]));
?>
--EXPECTF--
bool(true)

