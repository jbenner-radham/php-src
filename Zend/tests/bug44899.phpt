--TEST--
Bug #44899 (__is_set usage changes behavior of empty())
--FILE--
<?php

class myclass
{
	private $_data = array();

	function __construct($data)
	{
		$this->_data = $data;
	}

	function __is_set($field_name)
	{
		return is_set($this->_data[$field_name]);
	}
}

$arr = array('foo' => '');

$myclass = new myclass($arr) ;

echo (is_set($myclass->foo)) ? 'is_set' : 'not is_set';
echo "\n";
echo (empty($myclass->foo)) ? 'empty' : 'not empty';
echo "\n";
echo ($myclass->foo) ? 'not empty' : 'empty';
echo "\n";

?>
--EXPECTF--
is_set
empty

Notice: Undefined property: myclass::$foo in %s on line %d
empty
