--TEST--
Testing is_set and unset with variable variables
--FILE--
<?php

print "- is_set ---\n";

$var_name = 'unexisting';

if (is_set($$var_name)) {
	print "error\n";
}

$test = 'var_name';

if (is_set($$$test)) {
	print "error\n";
}

print "- unset ---\n";

unset($$var_name);

unset($$$test);

print "done\n";

?>
--EXPECT--
- is_set ---
- unset ---
done
