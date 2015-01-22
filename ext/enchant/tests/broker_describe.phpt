--TEST--
enchant_broker_describe() function
--SKIPIF--
<?php
if(!extension_loaded('enchant')) die('skip, enchant not loader');

 ?>
--FILE--
<?php
$broker = enchant_broker_init();

if(!$broker) exit("failed, broker_init failure\n");

$provides = enchant_broker_describe($broker);

if (is_array($provides)) {
	foreach ($provides as $backend) {
		if (!(is_set($backend['name']) && is_set($backend['desc']) && is_set($backend['file']))) {
			exit("failed\n");
		}
	}
	exit("OK\n");
} else {
	echo "failed";
}
?>
--EXPECTF--
OK
