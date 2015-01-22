--TEST--
Testing is_set with string offsets
--FILE--
<?php

print "- is_set ---\n";

$str = "test0123";

var_dump(is_set($str[-1]));
var_dump(is_set($str[0]));
var_dump(is_set($str[1]));
var_dump(is_set($str[4])); // 0
var_dump(is_set($str[5])); // 1
var_dump(is_set($str[8]));
var_dump(is_set($str[10000]));
// non-numeric offsets
print "- string ---\n";
var_dump(is_set($str['-1']));
var_dump(is_set($str['0']));
var_dump(is_set($str['1']));
var_dump(is_set($str['4'])); // 0
var_dump(is_set($str['1.5']));
var_dump(is_set($str['good']));
var_dump(is_set($str['3 and a half']));
print "- bool ---\n";
var_dump(is_set($str[true]));
var_dump(is_set($str[false]));
var_dump(is_set($str[false][true]));
print "- null ---\n";
var_dump(is_set($str[null]));
print "- double ---\n";
var_dump(is_set($str[-1.1]));
var_dump(is_set($str[-0.8]));
var_dump(is_set($str[-0.1]));
var_dump(is_set($str[0.2]));
var_dump(is_set($str[0.9]));
var_dump(is_set($str[M_PI]));
var_dump(is_set($str[100.5001]));
print "- array ---\n";
var_dump(is_set($str[array()]));
var_dump(is_set($str[array(1,2,3)]));
print "- object ---\n";
var_dump(is_set($str[new stdClass()]));
print "- resource ---\n";
$f = fopen(__FILE__, 'r');
var_dump(is_set($str[$f]));
print "done\n";

?>
--EXPECTF--
- is_set ---
bool(false)
bool(true)
bool(true)
bool(true)
bool(true)
bool(false)
bool(false)
- string ---
bool(false)
bool(true)
bool(true)
bool(true)
bool(false)
bool(false)
bool(false)
- bool ---
bool(true)
bool(true)
bool(false)
- null ---
bool(true)
- double ---
bool(false)
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
bool(false)
- array ---
bool(false)
bool(false)
- object ---
bool(false)
- resource ---
bool(false)
done
