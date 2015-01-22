--TEST--
is_set() with object properties when operating on non-object
--FILE--
<?php

$foo = NULL;
is_set($foo->bar->bar);

echo "Done\n";
?>
--EXPECT--
Done
