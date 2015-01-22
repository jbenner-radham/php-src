--TEST--
Bug #27304 (Static functions don't function properly)
--FILE--
<?php

class Staticexample
{
	static function test()
	{
		var_dump(is_set($this));
	}
}

$b = new Staticexample();
Staticexample::test();
$b->test();

?>
===DONE===
--EXPECT--
bool(false)
bool(false)
===DONE===
