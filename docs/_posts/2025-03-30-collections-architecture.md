---
title: "Configuring Collections"
---

[Collections]({{ site.baseurl }}{% link _pages/collections.md %}) in MetaStorm provide a structured way to gather, filter, and reuse values across your project. 
Whether it’s class names, function references, or environment variables, collections allow you to organize and retrieve relevant data efficiently.

## Structure

Each collection consists of a name and a source — it can be built dynamically from attributes, JSON files, or even hardcoded values.

Once defined, collections can be referenced anywhere in the configuration, enabling smart autocompletion, validation, and better code organization.

Example of a simple collection:

```xml
<collections>
    <strings name="statuses">
        <value>pending</value>
        <value>approved</value>
        <value>rejected</value>
    </strings>
</collections>
```

With this, statuses can be used throughout the project, ensuring consistency in values like `pending`, `approved`, and `rejected`.

In [the previous article]({{ site.baseurl }}{% post_url 2025-03-11-config-architecture %}) 
we touched config structure a bit, now with the Collections it will look like the following:

```xml
<?xml version="1.0" encoding="UTF-8" ?>
<meta-storm xmlns="meta-storm">
    <definitions>
        <target>
            <!-- collection usage -->
            <collection name="collection-name" />  
        </target>
    </definitions>
    <collections>
        <!-- collection definition -->
    </collections>
</meta-storm>
```

### Rules

- Collections are merged if they defined with the same name
- Due to prevent unexpected merge, use prefixes in your libraries: `yiisoft/html:tags` instead of `tags`
- Collection values are built dynamically, they are not caching or reused. 


> Make your collections are optimized as much as possible


## Built-in Collections

MetaStorm includes several global collections that you can use right away.

### IDE-independent collections
- `GLOBAL:env` – Environment variables from `.env` files and `putenv()`.
- `GLOBAL:mime-types` – A list of known MIME types `application/json`, `image/jpeg`.
- `GLOBAL:html-tags` – A list of known HTML elements like `div`, `span`, `input`.
- `GLOBAL:http-headers` – HTTP headers like `Accept`, `Content-Type`.
- `GLOBAL:http-methods` – HTTP verbs like `GET`, `POST`, `DELETE`.

### PHPStorm related

- `GLOBAL:php-classes` – Fully qualified PHP class names.
- `GLOBAL:php-interfaces` – All PHP interfaces in your project.
- `GLOBAL:php-traits` – All PHP traits in your project.
- `GLOBAL:php-functions` – PHP function names, including built-ins and user-defined ones.

These collections save time and reduce errors by providing predefined lists for common use cases.

> It's not the final list of collections. <br>
> Tell me if you have an idea about a new global collection.

## Custom Collections

Need a collection tailored to your project? 
MetaStorm supports multiple ways to define them:

### From Attributes

```xml
<attributeClass name="events" class="\App\Attributes\Event"/>
```
Collects all classes using the Event attribute.

### From JSON Files

```xml
<jsonFile name="routes" xpath="$directory/routes.json"/>
```

Extracts keys from a JSON structure.

### Static Values

```xml
<strings name="user_roles">
    <value>admin</value>
    <value>editor</value>
    <value>subscriber</value>
</strings>
```

## Usage

Collections are useful in various scenarios:

- Autocompletion – Suggest valid values where needed.
- Validation – Ensure only expected values are used.
- Configuration Management – Keep settings organized.

For example, you can restrict method parameters to valid HTTP methods:

```xml
<classMethod class="\Framework\Http\HttpRequest" method="withMethod" argument="0">
    <collection name="GLOBAL:http-methods" />
</classMethod>
```

Now, `withMethod()` will only accept `GET`, `POST`, etc.

## Future

MetaStorm continues to evolve, with planned features like dynamic filtering or cross-referencing collections.

