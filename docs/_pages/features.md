---
permalink: :basename
title: Features Overview
toc: true
sidebar:
  nav: "docs"
---
Once you configured target it's possible to inject one or many features into the mounting point.

Many of the following features automatically enable the following IDE abilities:
- Autocompletion
    - When you start typing inside the string literal IDE suggest you necessary endings
- Referencing string literals as program language entities that automatically enables:
    - Navigating from the usage to the definition
        - From `method('prop')`  to `class { public $prop }`
        - From `render('index')`  to `templates/site/index.php`
    - Navigating from the definition to the usages
        - Vise-serve of the navigating from the usage to the definition
    - Renaming
    - Refactoring
    - Finding usages

## `properties`

Provide properties of the related class.

| Parameter         | Required                | Description                                                | Possible values                |
|-------------------|-------------------------|------------------------------------------------------------|--------------------------------|
| `relatedTo`       | no (if `xpath` set)     | relative point to lookup for entries                       | See [Related type](#relatedto) |
| `xpath`           | no (if `relatedTo` set) | xpath string to walk through the entities                  | See [Related type](#xpath)     |
| `relatedArgument` | no                      | related argument index, useful for many `relatedTo` values | `0`, `1`, `2`, ...             |
| `public`          | no                      | show or hide such properties                               | `true`, `false`                |
| `protected`       | no                      | show or hide such properties                               | `true`, `false`                |
| `private`         | no                      | show or hide such properties                               | `true`, `false`                |
| `static`          | no                      | show or hide such properties                               | `true`, `false`                |
| `dynamic`         | no                      | show or hide such properties                               | `true`, `false`                |
| children          | no                      | feature processors                                         |                                | 

### Example

```xml
<properties relatedTo="argument" relatedArgument="0"/>
```

## `methods`

Provide properties of the related class.

| Parameter         | Required                | Description                                                | Possible values                |
|-------------------|-------------------------|------------------------------------------------------------|--------------------------------|
| `relatedTo`       | no (if `xpath` set)     | relative point to lookup for entries                       | See [Related type](#relatedto) |
| `xpath`           | no (if `relatedTo` set) | xpath string to walk through the entities                  | See [Related type](#xpath)     |
| `relatedArgument` | no                      | related argument index, useful for many `relatedTo` values | `0`, `1`, `2`, ...             |
| `public`          | no                      | show or hide such methods                                  | `true`, `false`                |
| `protected`       | no                      | show or hide such methods                                  | `true`, `false`                |
| `private`         | no                      | show or hide such methods                                  | `true`, `false`                |
| `abstract`        | no                      | show or hide such methods                                  | `true`, `false`                |
| `static`          | no                      | show or hide such methods                                  | `true`, `false`                |
| `dynamic`         | no                      | show or hide such methods                                  | `true`, `false`                |
| children          | no                      | feature processors                                         |                                | 

### Example

```xml
<methods relatedTo="containingClass" static="false" />
```

## `files`

Provide files and directories at the related filesystem point.

| Parameter   | Required                | Description                                                    | Possible values                    |
|-------------|-------------------------|----------------------------------------------------------------|------------------------------------|
| `relatedTo` | no (if `xpath` set)     | relative point to lookup for entries                           | See [Related type](#relatedto)     |
| `xpath`     | no (if `relatedTo` set) | xpath string to walk through the entities                      | See [Related type](#xpath)         |
| `extension` | no                      | file extension you want to filter and hide from autocompletion | `(empty)`, `php`, `blade.php`, ... |
| children    | no                      | feature processors                                             |                                    | 

### Example

Directory-related files
```xml
<files extension="" relatedTo="directory"/>
```
Absolute directory lookup
```xml
<files extension="" xpath="$project/resources/templates"/>
```

### Processors

`directoryProcessors` is applied here as the children element.

## `directories`

Provide directories only at the related filesystem point.

| Parameter   | Required                | Description                                                    | Possible values                    |
|-------------|-------------------------|----------------------------------------------------------------|------------------------------------|
| `relatedTo` | no (if `xpath` set)     | relative point to lookup for entries                           | See [Related type](#relatedto)     |
| `xpath`     | no (if `relatedTo` set) | xpath string to walk through the entities                      | See [Related type](#xpath)         |
| children    | no                      | feature processors                                             |                                    | 

### Example

Directory-related files
```xml
<directories relatedTo="directory"/>
```
Absolute directory lookup
```xml
<directories xpath="$project/resources/templates"/>
```

### Processors

`directoryProcessors` is applied here as the children element.

## `tables`

Provide database table names.

| Parameter  | Required | Description                                 | Possible values   |
|------------|----------|---------------------------------------------|-------------------|
| `database` | yes      | connection exact name OR regular expression | `main`, `.+`, ... |
| children   | no       | feature processors                          |                   | 

### Example

```xml
<tables />
```

## `returnType`

Overrides returning type by matching value alias.

`returnType`:

| Parameter  | Required | Description  | Possible values        |
|------------|----------|--------------|------------------------|
| children   | no       | aliases list |                        | 

`alias`:

| Parameter | Required | Description                                 | Possible values               |
|-----------|----------|---------------------------------------------|-------------------------------|
| `name`    | yes      | argument value matched returning class      | `int`, `user`                 | 
| `class`   | yes      | fully qualified class name                  | `\IntResult`, `\UserFactory`  | 

### Example

```xml
<returnType>
    <alias name="int" class="\IntResult" />
    <alias name="string" class="\StringResult" />
    <alias name="null" class="\NullResult" />
    <alias name="object" class="\ObjectResult" />
</returnType>
```

## `variableInjection`

Injects variable into the target.

| Parameter | Required | Description                | Possible values                                          |
|-----------|----------|----------------------------|----------------------------------------------------------|
| `name`    | yes      | variable name              | `this`, `urlGenerator`                                   | 
| `class`   | yes      | fully qualified class name | `\Framework\View\View`, `\Framework\Router\UrlGenerator` | 

> **Note:** `variableInjection` feature works properly only with `files` target.

### Example

```xml
<variableInjection name="this" class="\Framework\View\View" />
```

## `languageInjection`

Injects language support into the target.

| Parameter  | Required | Description             | Possible values        |
|------------|----------|-------------------------|------------------------|
| `language` | yes      | known PHPStorm language | `RegExp`, `CSS`, `SQL` | 

### Example

```xml
<languageInjection language="RegExp" />
```

## `collection`

Provide value from the [defined collections](/collections)

| Parameter  | Required | Description                                           | Possible values              |
|------------|----------|-------------------------------------------------------|------------------------------|
| `name`     | yes      | collection name                                       | `tags`, `cycle/orm:entities` |
| `argument` | yes      | position of the argument you want to make interactive | `0`, `1`, `2`, ...           |
| children   | no       | feature processors                                    |                              | 

### Example

```xml
<collection name="workflows_methods" argument="0" />
```
