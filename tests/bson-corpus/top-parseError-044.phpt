--TEST--
Top-level document validity: Null byte in $regularExpression options
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/basic.inc';

throws(function() {
    MongoDB\BSON\Document::fromJSON('{"a" : {"$regularExpression" : { "pattern": "b", "options" : "i\\u0000"}}}');
}, 'MongoDB\Driver\Exception\UnexpectedValueException');

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
OK: Got MongoDB\Driver\Exception\UnexpectedValueException
===DONE===