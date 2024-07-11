--TEST--
Int64 type: 0
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/basic.inc';

$canonicalBson = hex2bin('10000000126100000000000000000000');
$canonicalExtJson = '{"a" : {"$numberLong" : "0"}}';
$relaxedExtJson = '{"a" : 0}';

// Canonical BSON -> BSON object -> Canonical BSON
echo bin2hex((string) MongoDB\BSON\Document::fromBSON($canonicalBson)), "\n";

// Canonical BSON -> BSON object -> Canonical extJSON
echo json_canonicalize(MongoDB\BSON\Document::fromBSON($canonicalBson)->toCanonicalExtendedJSON()), "\n";

// Canonical BSON -> BSON object -> Relaxed extJSON
echo json_canonicalize(MongoDB\BSON\Document::fromBSON($canonicalBson)->toRelaxedExtendedJSON()), "\n";

// Canonical extJSON -> BSON object -> Canonical BSON
echo bin2hex((string) MongoDB\BSON\Document::fromJSON($canonicalExtJson)), "\n";

// Relaxed extJSON -> BSON object -> Relaxed extJSON
echo json_canonicalize(MongoDB\BSON\Document::fromJSON($relaxedExtJson)->toRelaxedExtendedJSON()), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
10000000126100000000000000000000
{"a":{"$numberLong":"0"}}
{"a":0}
10000000126100000000000000000000
{"a":0}
===DONE===