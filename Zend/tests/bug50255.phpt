--TEST--
Bug #50255 (is_set() and empty() silently casts array to object)
--FILE--
<?php

$arr = array('foo' => 'bar');

print "is_set\n";
var_dump(is_set($arr->foo));
var_dump(is_set($arr->bar));
var_dump(is_set($arr['foo']));
var_dump(is_set($arr['bar']));
print "empty\n";
var_dump(empty($arr->foo));
var_dump(empty($arr->bar));
var_dump(empty($arr['foo']));
var_dump(empty($arr['bar']));

?>
--EXPECT--
is_set
bool(false)
bool(false)
bool(true)
bool(false)
empty
bool(true)
bool(true)
bool(false)
bool(true)
