---
permalink: :basename
title: Environment Variables Overview
toc: true
sidebar:
  nav: "docs"
---

Environment variables make it able to have late static binding for vendor <-> user definitions.

E.g., you as a vendor may define default path or a part of path, database name, default class or whatever*,
buy a user when face with its custom settings will have incorrect behaviour.

This is when `envs` will come in useful:
- Replace a changing part with an `env`
- Set default value
- Let user redefine the variable

A few rules about the `envs`:
- Variable name must be in uppercase
- Values outside the vendor folder override those within it
- Since there may be multiple files, the order of value overwriting is not guaranteed

## `envs`

Defines variables to be replaced in some other strings.

### `env`

| Parameter | Required | Description        | Possible values                            |
|-----------|----------|--------------------|--------------------------------------------|
| `name`    | yes      | variable name      | `VIEW-THEME`, `YII2/FRAMEWORK:VIEW-THEME`  |
| `value`   | yes      | variable values    | `dark`, `database-name`, ...               |
| children  | no       | feature processors |                                            | 

#### Example

```xml
<envs>
    <env name="VIEW-THEME" value="dark" />
</envs>
```
