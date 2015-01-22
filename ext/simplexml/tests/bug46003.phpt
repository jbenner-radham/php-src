--TEST--
Bug #46003 (is_set on nonexisting nodes return unexpected results)
--SKIPIF--
<?php if (!extension_loaded("simplexml")) print "skip"; ?>
--FILE--
<?php
$xml =<<<XML
<r>
  <p>Test</p>
  <o d='h'>
    <xx rr='info' />
    <yy rr='data' />
  </o>
</r>
XML;

$x = simplexml_load_string($xml);

var_dump(is_set($x->p));
var_dump(is_set($x->p->o));
var_dump(is_set($x->o->yy));
var_dump(is_set($x->o->zz));
var_dump(is_set($x->o->text));
var_dump(is_set($x->o->xx));
?>
===DONE===
--EXPECTF--
bool(true)
bool(false)
bool(true)
bool(false)
bool(false)
bool(true)
===DONE===
