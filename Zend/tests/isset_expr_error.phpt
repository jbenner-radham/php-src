--TEST--
Error message for is_set(func())
--FILE--
<?php
is_set(1 + 1);
?>
--EXPECTF--
Fatal error: Cannot use is_set() on the result of an expression (you can use "null !== expression" instead) in %s on line %d
