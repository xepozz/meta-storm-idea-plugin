---
permalink: :basename
title: Other
toc: true
sidebar:
   nav: "docs"
---

## `relatedTo`

- Complex parameter changes interpretation of the files
- Possible values:
    - `file` – related to the current (opened) file
    - `containingClass` – related to the current (opened) class
    - `directory` – related to the current file directory
    - `project` – related to the project path
    - `argument` – related to the positioned argument: it's `$obj` in `$service->method($obj, $prop)`
    - `variable` – related to the variable holding the method: it's `$service` in `$service->method()`

## `xpath`

### XPath for `<files>`

- A string used to walk through the file system, like regular Unix-based FS path
- XPath must be started from a relative point:
    - `$project` – project base path
    - `$file` – related to the current file
    - `$directory` – related to the current directory

### Examples

Absolute directory
```
$project/resources/templates
```
Current directory
```
$directory/views
```
Current file
```
$file/../views
```

### XPath for `<methods>`, `<properties>`, `<arrayValues>`
- A string used to walk through the programming entities: classes, methods, properties, constants, etc
- XPath must be a **FQCN** or started with a relative point:
    - `$containingClass` – means the class in which context the target is placed
    - `$argument` – related to the positioned argument: it's `$obj` in `$service->method($obj, $prop)`
    - `$variable` – related to the variable holding the method: it's `$service` in `$service->method()`
- After you specified starting point you may walk further:
    - Each "entrance" must be a dot symbol: `.`
    - Each "property" must be prefixed with a dollar symbol: `$`
    - Each "method return type" must have double squares as a suffix : `()`
- Lookup supports:
    - Typed properties: `private Class $property`
    - Untyped properties with reference inside: `private string $propertyClass = Class::class`
    - Typed methods' returning: `public function methodA(): Class`

### Examples

Look through a property in a factory
```
$containingClass.$originalClass
```

Look through the decorator
```
$variable.$decorated
```

Could be chained any number of times
```
$variable.$a.$b.$c.$d.methoA().methodB()
```

# Processors

## `regexp`

- Regular expression based processor, helps you to change directory, convert camelCase to snake_case and other
- Parameters:
    - `from`: **required**
        - Regular expression
    - `to`: **required**
        - Regular expression, could you \$1, \$2, etc as group references
- Supports [envs](/envs) substitution

### Examples

Converts `HelloWorld` to `Hello-World`
```xml
<regexp from="([a-z])([A-Z])" to="$1-$2"/>
```

Using `envs`:
```xml
<regexp from="(${VIEW-THEME})" to="$1-${VIEW-THEME}"/>
```

## `case`

- Regular expression based processor, helps you to change directory, convert camelCase to snake_case and other
- Parameters:
    - `from`: **required**
        - Regular expression
    - `case`: **required**
        - **lower**
        - **upper**
- `from` supports [envs](/envs) substitution

### Examples

Converts `/MyPath/To/HelloWorld` to `/MyPath/To/helloworld`
```xml
<regexp from="[^/]+$" case="lower"/>
```

## `append`

- Such prefixing basically used for some static values like static path from the project directory
- Parameters:
    - `value`: **required**
        - String
- Supports [envs](/envs) substitution

### Examples

Regular case:
```xml
<append value="/common/mail"/>
```

Using `envs`:
```xml
<append value="/resources/themes/${VIEW-THEME}/layout"/>
```
