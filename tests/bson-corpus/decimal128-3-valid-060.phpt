--TEST--
Decimal128: [basx635] Zeros
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/basic.inc';

$canonicalBson = hex2bin('180000001364000000000000000000000000000000463000');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "0E+3"}}';
$degenerateExtJson = '{"d" : {"$numberDecimal" : "0.00E+5"}}';

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
180000001364000000000000000000000000000000463000
{"d":{"$numberDecimal":"0E+3"}}
180000001364000000000000000000000000000000463000
180000001364000000000000000000000000000000463000
===DONE===