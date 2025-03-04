---
permalink: :basename
title: Quick Start
toc: true
sidebar:
  nav: "docs"
---

Short Youtube demo: [Watch here](https://youtu.be/fFGrRNFDZIg)

### Goal

When using `ArrayHelper::getValue`, the IDE should suggest properties for autocompletion:

```php
public static function getValue(object $object, string $property)
```

### Setup

1. Create `.meta-storm.xml` in your project:

```xml
<?xml version="1.0" encoding="UTF-8" ?>
<meta-storm xmlns="meta-storm">
    <definitions>
        <classMethod class="\ArrayHelper" method="getValue" argument="1">
            <properties relatedTo="argument" relatedArgument="0"/>
        </classMethod>
    </definitions>
</meta-storm>
```

2. Use it in PHP:

```php
class User { private $id; protected $name; public $age; }

$a = new User;

class ArrayHelper {
    public static function getValue(object $object, string $property) {}
}

ArrayHelper::getValue($a, 'age');
```

Now, the IDE provides autocompletion and navigation support.
