--TEST--
errmsg: __is_set() must take exactly 1 argument
--FILE--
<?php

class test {
	function __is_set() {
	}
}

echo "Done\n";
?>
--EXPECTF--
Fatal error: Method test::__is_set() must take exactly 1 argument in %s on line %d
