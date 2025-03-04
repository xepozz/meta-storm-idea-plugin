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
| `GLOBAL:html-tags`      | Provides known html tags                                                       | `div`, `span`, `abbr`     |
| `GLOBAL:http-methods`   | Provides HTTP methods                                                          | `GET`, `POST`, `PUT`      |
| `GLOBAL:php-classes`    | Provides php full qualified class names                                        | `\App\MyService`          |
| `GLOBAL:php-interfaces` | Provides php full qualified interface names                                    | `\App\MyServiceInterface` |
| `GLOBAL:php-functions`  | Provides php full qualified function names                                     | `time`, `user_function`   |
| `GLOBAL:env`            | Provides collected ENV variables from `putenv` function calls and `.env` files | `APP_ENV`, `APP_DEBUG`    |

## Collection definition

All collections must be defined in the `collections` tag in the root xml tag:

```xml

<meta-storm xmlns="meta-storm">
    <definitions>
        <target>
            <collection name=""/>
            //<-- there is only usage of the collection defined below
        </target>
    </definitions>
    <collections>
        ... //<-- there are collection definitions
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

### `strings`

Defines static strings from the current definition.

| Parameter | Required | Description     | Possible values              |
|-----------|----------|-----------------|------------------------------|
| `name`    | yes      | collection name | `tags`, `cycle/orm:entities` |
| children  | no       | strings itself  |                              | 

#### Example

```xml

<strings name="static_strings">
    <value>Hello</value>
    <value>Static</value>
    <value>World</value>
</strings>
```
