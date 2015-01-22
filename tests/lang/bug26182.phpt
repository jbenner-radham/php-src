--TEST--
Bug #26182 (Object properties created redundantly)
--INI--
error_reporting=4095
--FILE--
<?php

class A {
    function NotAConstructor ()
    {
        if (is_set($this->x)) {
            //just for demo
        }
    }
}

$t = new A ();

print_r($t);

?>
--EXPECT--
A Object
(
)
