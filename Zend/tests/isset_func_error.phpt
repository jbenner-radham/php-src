--TEST--
Error message for is_set(func())
--FILE--
<?php
is_set(abc());
?>
--EXPECTF--
Fatal error: Cannot use is_set() on the result of a function call (you can use "null !== func()" instead) in %s on line %d
