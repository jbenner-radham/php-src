--TEST--
Testing is_set accessing undefined array itens and properties
--SKIPIF--
<?php if (version_compare(zend_version(), '2.4.0', '<')) die('skip ZendEngine 2.4 needed'); ?>
--FILE--
<?php

$a = 'foo';
$b =& $a;

var_dump(is_set($b));

var_dump(is_set($a[0], $b[1]));

var_dump(is_set($a[0]->a));

var_dump(is_set($c[0][1][2]->a->b->c->d));

var_dump(is_set(${$a}->{$b->$c[$d]}));

var_dump(is_set($GLOBALS));

var_dump(is_set($GLOBALS[1]));

var_dump(is_set($GLOBALS[1]->$GLOBALS));

?>
--EXPECTF--
bool(true)
bool(true)
bool(false)
bool(false)

Notice: Undefined variable: c in %s on line %d

Notice: Undefined variable: d in %s on line %d

Notice: Trying to get property of non-object in %s on line %d
bool(false)
bool(true)
bool(false)
bool(false)
