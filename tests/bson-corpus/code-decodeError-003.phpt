--TEST--
Javascript Code: bad code string length: eats terminator
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/basic.inc';

$bson = hex2bin('100000000D6100050000006200620000');

throws(function() use ($bson) {
    MongoDB\BSON\Document::fromBSON($bson)->toPHP();
}, 'MongoDB\Driver\Exception\UnexpectedValueException');

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
OK: Got MongoDB\Driver\Exception\UnexpectedValueException
===DONE===