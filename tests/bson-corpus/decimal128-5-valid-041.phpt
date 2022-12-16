--TEST--
Decimal128: [decq613] fold-down full sequence (Clamped)
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/basic.inc';

$canonicalBson = hex2bin('18000000136400000000E83C80D09F3C2E3B030000FE5F00');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "1.000000000000000000000000000E+6138"}}';
$degenerateExtJson = '{"d" : {"$numberDecimal" : "1E+6138"}}';

// Canonical BSON -> Native -> Canonical BSON
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> BSON object -> Canonical BSON
echo bin2hex((string) MongoDB\BSON\Document::fromBSON($canonicalBson)), "\n";

// Canonical BSON -> Canonical extJSON
echo json_canonicalize(toCanonicalExtendedJSON($canonicalBson)), "\n";

// Canonical BSON -> BSON object -> Canonical extJSON
echo json_canonicalize(MongoDB\BSON\Document::fromBSON($canonicalBson)->toCanonicalExtendedJSON()), "\n";

// Canonical extJSON -> Canonical BSON
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

// Canonical extJSON -> BSON object -> Canonical BSON
echo bin2hex((string) MongoDB\BSON\Document::fromJSON($canonicalExtJson)), "\n";

// Degenerate extJSON -> Canonical BSON
echo bin2hex(fromJSON($degenerateExtJson)), "\n";

// Degenerate extJSON -> BSON object -> Canonical BSON
echo bin2hex((string) MongoDB\BSON\Document::fromJSON($degenerateExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
18000000136400000000e83c80d09f3c2e3b030000fe5f00
18000000136400000000e83c80d09f3c2e3b030000fe5f00
{"d":{"$numberDecimal":"1.000000000000000000000000000E+6138"}}
{"d":{"$numberDecimal":"1.000000000000000000000000000E+6138"}}
18000000136400000000e83c80d09f3c2e3b030000fe5f00
18000000136400000000e83c80d09f3c2e3b030000fe5f00
18000000136400000000e83c80d09f3c2e3b030000fe5f00
18000000136400000000e83c80d09f3c2e3b030000fe5f00
===DONE===