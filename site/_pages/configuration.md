---
permalink: :basename
title: Configuration
sidebar:
  nav: "docs"
---

## Configuration files

Meta Storm searches for any files with the `.meta-storm.xml` at the end of file name so:

- A file can be placed at any place (except ignored directories)
- A file may have any name with the specific postfix, e.g.: `arrays.meta-storm.xml`, `files.meta-storm.xml`,
  `.meta-storm.xml`, etc
- Configuration files could exist more than one at the moment
- The whole config is combines with several config files

> The best way to use the plugin is to add a specific configuration to a package and distribute the config file with the
> package.

##### Empty configuration file

```xml
<?xml version="1.0" encoding="UTF-8" ?>
<meta-storm xmlns="meta-storm">
    <definitions>
        <!-- ... -->
    </definitions>
    <collections>
        <!-- ... -->
    </collections>
</meta-storm>
```

## Configuration Overview

- The configuration files are written in XML format.
- There can be any number of configuration files, as long as their names end with `.meta-storm.xml`.
- Configuration files can be distributed with libraries and may be located in the `vendor/*` directory.

Each configuration file follows this structure:

- **Definitions**
    - **Mount Point** (Where?)
        - **Functionality to Add** (What?)
            - **Display Method** (How?)
- **Collections**
    - **Collection Assembly Instructions**

Now that you understand how the configuration is structured,
you can assemble it using existing components or
submit [an issue](https://github.com/xepozz/meta-storm-idea-plugin/issues/new)
or [pull request](https://github.com/xepozz/meta-storm-idea-plugin/compare) with your idea.
