--TEST--
Bug #29883 (is_set gives invalid values on strings)
--FILE--
<?php
$x = "bug";
var_dump(is_set($x[-1]));
var_dump(is_set($x["1"]));
echo $x["1"]."\n";
?>
--EXPECT--
bool(false)
bool(true)
u
