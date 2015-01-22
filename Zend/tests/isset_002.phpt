--TEST--
Testing is_set with several undefined variables as argument
--FILE--
<?php

var_dump(is_set($a, ${$b}, $$c, $$$$d, $e[$f->g]->d));

?>
--EXPECT--
bool(false)
