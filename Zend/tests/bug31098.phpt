--TEST--
Bug #31098 (is_set() / empty() incorrectly returns true in dereference of a wrong type)
--FILE--
<?php
$a = '';
var_dump(is_set($a->b));
$a = 'a';
var_dump(is_set($a->b));
$a = '0';
var_dump(is_set($a->b));
$a = '';
var_dump(is_set($a['b']));
$a = 'a';
var_dump(is_set($a['b']));
$a = '0';
var_dump(is_set($a['b']));

$simpleString = "Bogus String Text";
echo is_set($simpleString->wrong)?"bug\n":"ok\n";
echo is_set($simpleString["wrong"])?"bug\n":"ok\n";
echo is_set($simpleString[-1])?"bug\n":"ok\n";
echo is_set($simpleString[0])?"ok\n":"bug\n";
echo is_set($simpleString["0"])?"ok\n":"bug\n";
echo is_set($simpleString["16"])?"ok\n":"bug\n";
echo is_set($simpleString["17"])?"bug\n":"ok\n";
echo $simpleString->wrong === null?"ok\n":"bug\n";
echo $simpleString["wrong"] === "B"?"ok\n":"bug\n";
echo $simpleString["0"] === "B"?"ok\n":"bug\n";
$simpleString["wrong"] = "f";
echo $simpleString["0"] === "f"?"ok\n":"bug\n";
?>
--EXPECTF--
bool(false)
bool(false)
bool(false)
bool(false)
bool(false)
bool(false)
ok
ok
ok
ok
ok
ok
ok

Notice: Trying to get property of non-object in %s on line %d
ok

Warning: Illegal string offset 'wrong' in %s on line %d
ok
ok

Warning: Illegal string offset 'wrong' in %s on line %d
ok