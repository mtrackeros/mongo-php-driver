--TEST--
Binary type: subtype 0x05
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/basic.inc';

$canonicalBson = hex2bin('1D000000057800100000000573FFD26444B34C6990E8E7D1DFC035D400');
$canonicalExtJson = '{"x" : { "$binary" : {"base64" : "c//SZESzTGmQ6OfR38A11A==", "subType" : "05"}}}';

// Canonical BSON -> BSON object -> Canonical BSON
echo bin2hex((string) MongoDB\BSON\Document::fromBSON($canonicalBson)), "\n";

// Canonical BSON -> BSON object -> Canonical extJSON
echo json_canonicalize(MongoDB\BSON\Document::fromBSON($canonicalBson)->toCanonicalExtendedJSON()), "\n";

// Canonical extJSON -> BSON object -> Canonical BSON
echo bin2hex((string) MongoDB\BSON\Document::fromJSON($canonicalExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
1d000000057800100000000573ffd26444b34c6990e8e7d1dfc035d400
{"x":{"$binary":{"base64":"c\/\/SZESzTGmQ6OfR38A11A==","subType":"05"}}}
1d000000057800100000000573ffd26444b34c6990e8e7d1dfc035d400
===DONE===