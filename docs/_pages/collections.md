---
permalink: :basename
title: Collections
toc: true
sidebar:
  nav: "docs"
---

Using collections helps to first define a set of values, prepare, filter and then use as definitions.

Collections can be merged. So it's possible to build a collection with different sources (attributes, yaml, json, php).

## Global collections

| Name                    | Description                                                                    | Example                   |
|-------------------------|--------------------------------------------------------------------------------|---------------------------|
| `GLOBAL:env`            | Provides collected ENV variables from `putenv` function calls and `.env` files | `APP_ENV`, `APP_DEBUG`    |
| `GLOBAL:mime-types`     | Provides IDE known Mime types                                                  | `application/json`        |
| `GLOBAL:html-tags`      | Provides known html tags                                                       | `div`, `span`, `abbr`     |
| `GLOBAL:http-methods`   | Provides HTTP methods                                                          | `GET`, `POST`, `PUT`      |
| `GLOBAL:http-headers`   | Provides IDE known HTTP Headers                                                | `Accept`, `Content-Type`  |
| `GLOBAL:php-classes`    | Provides php full qualified class names                                        | `\App\MyService`          |
| `GLOBAL:php-interfaces` | Provides php full qualified interface names                                    | `\App\MyServiceInterface` |
| `GLOBAL:php-traits`     | Provides php full qualified trait names                                        | `\App\Traits\Deletable`   |
| `GLOBAL:php-functions`  | Provides php full qualified function names                                     | `time`, `user_function`   |

## Collection definition

All collections must be defined in the `collections` tag in the root xml tag `<meta-storm>`.

Each collection can be used with many different targets, except specific targets and collections combination goes out a rational way.

Collection usage defines as `<collection name="desired-collection">"`


```xml
<meta-storm xmlns="meta-storm">
    <definitions>
        <target>
            <!-- there are only usages of the collections defined below-->
            <collection name="collection-name" />
        </target>
    </definitions>
    <collections>
        <!-- there are collection definitions-->
        <strings name="hello-world">
            <value>Hello</value>
            <value>World!</value>
        </strings>
    </collections>
</meta-storm>
```

### `attributeClass`

Collects **attribute** from the attribute usage.

| Parameter | Required | Description                          | Possible values              |
|-----------|----------|--------------------------------------|------------------------------|
| `name`    | yes      | collection name                      | `tags`, `cycle/orm:entities` |
| `class`   | yes      | fully qualified attribute class name | `\Attributes\AsCommand`      |

#### Example

```xml
<attributeClass
        name="workflows_classes"
        class="\Framework\ClassMarker"
/>
```

### `attributeArgument`

Collects **argument** from the attribute usage.

| Parameter  | Required | Description                                  | Possible values              |
|------------|----------|----------------------------------------------|------------------------------|
| `name`     | yes      | collection name                              | `tags`, `cycle/orm:entities` |
| `class`    | yes      | fully qualified attribute class name         | `\Attributes\AsCommand`      |
| `argument` | yes      | position of the argument you want to collect | `0`, `1`, `2`, ...           |

#### Example

```xml
<attributeArgument
        name="commands"
        class="\Framework\Command"
        argument="0"
/>
```

### `jsonFile`

Collects keys from the json file.

| Parameter | Required | Description                               | Possible values                           |
|-----------|----------|-------------------------------------------|-------------------------------------------|
| `name`    | yes      | collection name                           | `tags`, `cycle/orm:entities`              |
| `xpath`   | yes      | xpath string to walk through the entities | `$project/resources/translations/en.json` |

#### Example

```xml
<jsonFile name="translations" xpath="$directory/en.json"/>
```

### `xmlFile`

Collects keys from the xml file.

| Parameter | Required | Description                               | Possible values                                                      |
|-----------|----------|-------------------------------------------|----------------------------------------------------------------------|
| `name`    | yes      | collection name                           | `tags`, `translations`                                               |
| `xpath`   | yes      | xpath string to walk through the entities | `$project/resources/resource.xml`, `$project/resources/resource.xsd` |

#### Example

```xml
<xmlFile name="translations" xpath="$directory/resource.xml"/>
```

### `yamlFile`

Collects keys from the yaml file.

| Parameter | Required | Description                               | Possible values                    |
|-----------|----------|-------------------------------------------|------------------------------------|
| `name`    | yes      | collection name                           | `tags`, `translations`             |
| `xpath`   | yes      | xpath string to walk through the entities | `$project/resources/resource.yaml` |

#### Example

```xml
<yamlFile name="translations" xpath="$directory/resource.yaml"/>
```

### `strings`

Defines static strings from the current definition.

| Parameter | Required | Description     | Possible values                   |
|-----------|----------|-----------------|-----------------------------------|
| `name`    | yes      | collection name | `tags`, `cycle/orm:entities`, ... |
| children  | no       | strings itself  |                                   | 

#### Example

```xml
<strings name="static_strings">
    <value>Hello</value>
    <value>Static</value>
    <value>World</value>
</strings>
```

### `classAliases`

Class aliases defines simple text-to-class map.

| Parameter | Required | Description     | Possible values      |
|-----------|----------|-----------------|----------------------|
| `name`    | yes      | collection name | `short-classes`, ... |
| children  | no       | strings itself  |                      | 

#### Example

```xml
<classAliases name="classes-aliases">
    <alias value="dt" class="\DateTime"/>
    <alias value="random" class="\Random\Randomizer"/>
</classAliases>
```

