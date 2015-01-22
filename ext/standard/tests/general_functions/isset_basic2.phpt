--TEST--
Test is_set() function : basic functionality
--FILE--
<?php
/* Prototype  : bool is_set  ( mixed $var  [, mixed $var  [,  $...  ]] )
 * Description:  Determine if a variable is set and is not NULL
 */

class foo {}

echo "*** Testing is_set() : basic functionality ***\n";

$i = 10;
$f = 10.5;
$s = "Hello";
$b = true;
$n = NULL;

echo "Test multiple scalar variables in a group\n";
var_dump(is_set($i, $f, $s, $b));
var_dump(is_set($i, $f, $s, $b, $n));

echo "Unset a few\n";
unset($i, $b);

echo "Test again\n";
var_dump(is_set($i, $f, $s, $b));

echo "\n\nArray test:\n";
$arr = array();
var_dump(is_set($var));
var_dump(is_set($var[1]));
var_dump(is_set($var, $var[1]));
echo "..now set\n";
$var[1] = 10;
var_dump(is_set($var));
var_dump(is_set($var[1]));
var_dump(is_set($var, $var[1]));

?>
===DONE===
--EXPECT--
*** Testing is_set() : basic functionality ***
Test multiple scalar variables in a group
bool(true)
bool(false)
Unset a few
Test again
bool(false)


Array test:
bool(false)
bool(false)
bool(false)
..now set
bool(true)
bool(true)
bool(true)
===DONE===