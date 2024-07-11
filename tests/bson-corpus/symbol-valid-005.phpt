--TEST--
Symbol: three-byte UTF-8 (☆)
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/basic.inc';

$canonicalBson = hex2bin('190000000E61000D000000E29886E29886E29886E298860000');
$convertedBson = hex2bin('190000000261000D000000E29886E29886E29886E298860000');
$canonicalExtJson = '{"a": {"$symbol": "☆☆☆☆"}}';
$convertedExtJson = '{"a": "☆☆☆☆"}';

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
190000000e61000d000000e29886e29886e29886e298860000
{"a":{"$symbol":"\u2606\u2606\u2606\u2606"}}
190000000e61000d000000e29886e29886e29886e298860000
===DONE===