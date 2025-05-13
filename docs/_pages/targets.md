---
permalink: :basename
title: Targets Overview
toc: true
sidebar:
    nav: "docs"
---

## `classMethod`

Mounts into the class method call.

| Parameter       | Required | Description                                           | Possible values        |
|-----------------|----------|-------------------------------------------------------|------------------------|
| `class`         | yes      | fully qualified class name                            | `\App\Helper\Arrays`   |
| `method`        | yes      | method name                                           | `getValue`             |
| `argument`      | yes      | position of the argument you want to make interactive | `0`, `1`, `2`, ...     |
| `targetValue`   | no       | should be used as direct value target (string)        | `true`, `false`        |
| `targetInArray` | no       | position in array expression                          | `key`, `value`, `none` |
| children        | no       | [features](#features-overview)                        |                        | 

### Example

```xml
<classMethod
        class="\Framework\AttributeArgumentValueInterface"
        method="attributeArgumentValue" argument="0">
    <!-- features -->
</classMethod>
```

## `classConstructor`

Mounts into the class constructor call or the attribute definition call.

| Parameter       | Required | Description                                           | Possible values        |
|-----------------|----------|-------------------------------------------------------|------------------------|
| `class`         | yes      | fully qualified class name                            | `\App\Helper\Arrays`   |
| `argument`      | yes      | position of the argument you want to make interactive | `0`, `1`, `2`, ...     |
| `targetValue`   | no       | should be used as direct value target (string)        | `true`, `false`        |
| `targetInArray` | no       | position in array expression                          | `key`, `value`, `none` |
| children        | no       | [features](#features-overview)                        |                        | 

### Example

```xml
<classConstructor class="\Framework\AttributeArgumentValueInterface" argument="0">
    <!-- features -->
</classConstructor>
```

## `classCallable`

Mounts into the class object invocation.

| Parameter       | Required | Description                                           | Possible values        |
|-----------------|----------|-------------------------------------------------------|------------------------|
| `class`         | yes      | fully qualified class name                            | `\App\Helper\Arrays`   |
| `argument`      | yes      | position of the argument you want to make interactive | `0`, `1`, `2`, ...     |
| `targetValue`   | no       | should be used as direct value target (string)        | `true`, `false`        |
| `targetInArray` | no       | position in array expression                          | `key`, `value`, `none` |
| children        | no       | [features](#features-overview)                        |                        | 

### Example

```xml
<classCallable class="\Framework\EventHandler" argument="0">
    <!-- features -->
</classCallable>
```

## `classProperty`

Mounts into the class property default value.

| Parameter       | Required | Description                                    | Possible values              |
|-----------------|----------|------------------------------------------------|------------------------------|
| `class`         | yes      | fully qualified class name                     | `\App\Helper\Arrays`         |
| `property`      | yes      | name of the property                           | `tableName`, `property`, ... |
| `targetValue`   | no       | should be used as direct value target (string) | `true`, `false`              |
| `targetInArray` | no       | position in array expression                   | `key`, `value`, `none`       |
| children        | no       | [features](#features-overview)                 |                              | 

### Example

```xml
<classProperty class="\Framework\Entity" property="table">
    <!-- features -->
</classProperty>
```

## `function`

Mounts into the function call.

| Parameter       | Required | Description                                           | Possible values        |
|-----------------|----------|-------------------------------------------------------|------------------------|
| `name`          | yes      | function name                                         | `file_get_contents`    |
| `argument`      | yes      | position of the argument you want to make interactive | `0`, `1`, `2`, ...     |
| `targetValue`   | no       | should be used as direct value target (string)        | `true`, `false`        |
| `targetInArray` | no       | position in array expression                          | `key`, `value`, `none` |
| children        | no       | [features](#features-overview)                        |                        | 

### Example

```xml
<function name="view" argument="0">
    <!-- features -->
</function>
```

## `returnValue`

Mounts into the returning value of the method.

| Parameter  | Required | Description                    | Possible values      |
|------------|----------|--------------------------------|----------------------|
| `class`    | yes      | fully qualified class name     | `\App\Helper\Arrays` |
| `method`   | yes      | method name                    | `getValue`           |
| children   | no       | [features](#features-overview) |                      | 

### Example

```xml
<returnValue class="\ActiveRecord" method="tableName">
  <!-- features -->
</returnValue>
```

## `arrayAccess`

Mounts into the variable array access position: `$var['here']'`

| Parameter  | Required | Description                                      | Possible values      |
|------------|----------|--------------------------------------------------|----------------------|
| `class`    | yes      | fully qualified class name, type of the variable | `\App\Helper\Arrays` |
| children   | no       | [features](#features-overview)                   |                      | 

### Example

```xml
<arrayAccess class="\ArrayAccess\Params">
    <!-- features -->
</arrayAccess>
```

## `files`

Mounts into the files satisfied by xpath.

| Parameter   | Required | Description                               | Possible values                 |
|-------------|----------|-------------------------------------------|---------------------------------|
| `xpath`     | yes      | xpath string to walk through the entities | `$project/resources/templates/` |
| `extension` | no       | method name                               | `getValue`                      |
| children    | no       | [features](#features-overview)            |                                 | 

> **Note:** `files` target xpath work properly only with `$project` start point

### Example

All `*.php` files under `$project/resources/templates` directory
```xml
<files xpath="$project/resources/templates" extension=".php">
  <!-- features -->
</files>
```

Any files under `$project/resources/templates` directory
```xml
<files xpath="$project/resources/templates">
  <!-- features -->
</files>
```
