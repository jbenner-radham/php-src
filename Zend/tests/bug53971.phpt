--TEST--
Bug #53971 (is_set() and empty() produce apparently spurious runtime error)
--FILE--
<?php
$s = "";
var_dump(is_set($s[0][0]));
?>
--EXPECT--
bool(false)


