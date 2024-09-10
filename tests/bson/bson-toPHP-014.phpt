--TEST--
Uninstantiatable classes are ignored when processing __pclass (enums)
--FILE--
<?php

require_once __DIR__ . '/../utils/basic.inc';

enum MyEnum
{
    case A;
}

enum MyBackedEnum: int
{
    case A = 1;
}

/* Note: the following BSON data corresponds to what might be produced by enums
 * implementing Persistable. Although that is now prohibited in the driver, it
 * could have been produced by an earlier version. */
var_dump(MongoDB\BSON\toPHP(MongoDB\BSON\fromJSON(sprintf('{"x": {"__pclass": {"$binary": "%s", "$type": "80"}, "name": "A"}}', base64_encode(MyEnum::class)))));

var_dump(MongoDB\BSON\toPHP(MongoDB\BSON\fromJSON(sprintf('{"x": {"__pclass": {"$binary": "%s", "$type": "80"}, "name": "A", "value": 1}}', base64_encode(MyBackedEnum::class)))));

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
Deprecated: Function MongoDB\BSON\fromJSON() is deprecated in %s

Deprecated: Function MongoDB\BSON\toPHP() is deprecated in %s
object(stdClass)#%d (%d) {
  ["x"]=>
  object(stdClass)#%d (%d) {
    ["__pclass"]=>
    object(MongoDB\BSON\Binary)#%d (%d) {
      ["data"]=>
      string(6) "MyEnum"
      ["type"]=>
      int(128)
    }
    ["name"]=>
    string(1) "A"
  }
}

Deprecated: Function MongoDB\BSON\fromJSON() is deprecated in %s

Deprecated: Function MongoDB\BSON\toPHP() is deprecated in %s
object(stdClass)#%d (%d) {
  ["x"]=>
  object(stdClass)#%d (%d) {
    ["__pclass"]=>
    object(MongoDB\BSON\Binary)#%d (%d) {
      ["data"]=>
      string(12) "MyBackedEnum"
      ["type"]=>
      int(128)
    }
    ["name"]=>
    string(1) "A"
    ["value"]=>
    int(1)
  }
}
===DONE===
