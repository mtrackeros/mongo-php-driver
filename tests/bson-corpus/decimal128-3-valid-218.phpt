--TEST--
Decimal128: [basx349] Engineering notation tests
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/basic.inc';

$canonicalBson = hex2bin('180000001364000A00000000000000000000000000283000');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "1.0E-11"}}';
$degenerateExtJson = '{"d" : {"$numberDecimal" : "10e-12"}}';

// Canonical BSON -> BSON object -> Canonical BSON
echo bin2hex((string) MongoDB\BSON\Document::fromBSON($canonicalBson)), "\n";

// Canonical BSON -> BSON object -> Canonical extJSON
echo json_canonicalize(MongoDB\BSON\Document::fromBSON($canonicalBson)->toCanonicalExtendedJSON()), "\n";

// Canonical extJSON -> BSON object -> Canonical BSON
echo bin2hex((string) MongoDB\BSON\Document::fromJSON($canonicalExtJson)), "\n";

// Degenerate extJSON -> BSON object -> Canonical BSON
echo bin2hex((string) MongoDB\BSON\Document::fromJSON($degenerateExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
180000001364000a00000000000000000000000000283000
{"d":{"$numberDecimal":"1.0E-11"}}
180000001364000a00000000000000000000000000283000
180000001364000a00000000000000000000000000283000
===DONE===