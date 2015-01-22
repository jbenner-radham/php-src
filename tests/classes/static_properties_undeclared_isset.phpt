--TEST--
Issetting a non-existent static property
--FILE--
<?php
Class C {}
var_dump(is_set(C::$p));
?>
--EXPECTF--
bool(false)