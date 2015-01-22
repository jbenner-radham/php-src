--TEST--
Bug #63982 (is_set() inconsistently produces a fatal error on protected property)
--FILE--
<?php
class Test {
        protected $protectedProperty;
}

$test = new Test();

var_dump(is_set($test->protectedProperty));
var_dump(is_set($test->protectedProperty->foo));
--EXPECTF--
bool(false)
bool(false)
