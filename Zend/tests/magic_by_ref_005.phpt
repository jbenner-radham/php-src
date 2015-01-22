--TEST--
passing parameter of __is_set() by ref
--FILE--
<?php

class test {
    function __is_set(&$name) { }
}

$t = new test;
$name = "prop";

var_dump(is_set($t->$name));

echo "Done\n";
?>
--EXPECTF--
Fatal error: Method test::__is_set() cannot take arguments by reference in %s on line %d
