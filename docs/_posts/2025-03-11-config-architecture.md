---
title: "Configuration architecture"
---

MetaStorm provides quite a flexible architecture to achieve your own goal of making the IDE work for you.

Let's have a look at the configuration example from [the previous article]({{ site.baseurl }}{% post_url 2025-03-07-introductory %}):

```xml
<?xml version="1.0" encoding="UTF-8" ?>
<meta-storm xmlns="meta-storm">
    <definitions>
        <classMethod class="\Framework\BaseController" method="withLayout" argument="0">
            <files xpath="$project/resources/layouts" extension="php" />
        </classMethod>
    </definitions>
</meta-storm>
```

Here is what you can see:
- Some XML metadata
- Common root tag `<meta-storm>`
- Tag `<definitions>` which groups all the definitions inside
- Tag `<classMethod>` with several attributes, which says what place IDE should check
- Tag `<files>` with the configuration attributes, which means that files matched the configuration should be suggested
- Closing tags

So, the architecture of the MetaStorm definitions configuration is pretty simple: 
target (`<classMethod>`) and feature (`<files>`) composition.

Based on that fact, you might configure **several** features at the same time

```xml
<target>
    <feature1 />
    <feature2 />
    <feature3 />
</target>
```

They might be either features of the same name or different.

> By the way, in future articles or instructions, you might encounter `<target>` and `<feature>` tags.
> This means it doesn’t matter much what target or feature should be used, highlighting the necessary aspects.


### First beta

Originally, the first version of MetaStorm had the following configs:

```xml
<?xml version="1.0" encoding="UTF-8" ?>
<meta-storm xmlns="meta-storm">
    <definitions>
        <properties
                className="\Framework\BaseController"
                methodName="withMixin"
                argumentIndex="1"
                relatedTo="argument"
                relatedArgumentIndex="0" />
    </definitions>
</meta-storm>
```

There were several ugly things that blocked the plugin’s internal architecture from reaching more and more different points to mount, 
combined with the features MetaStorm provides.

Either each feature should have supported each target, or the configuration had to be revised.
The latter happened at the time, and I really liked that it happened before MetaStorm gained lots of functionality. 

So now you are able to combine targets as you wish:
- Each target knows only about itself
- Features work with any targets by an internal contract

```xml
<classMethod class="\Framework\BaseController" method="withMixin" argument="1">  
    <properties relatedTo="argument" relatedArgument="0"/>  
</classMethod>
<classConstructor class="\Framework\BaseController">  
    <properties relatedTo="argument" relatedArgument="0"/>  
</classConstructor>
<classProperty class="\Framework\BaseModel" property="type" targetInArray="key">
    <properties relatedTo="argument" relatedArgument="0"/>
</classField>
<function name="\Framework\render" argument="1">
    <properties relatedTo="argument" relatedArgument="0"/>
</function>
```

Try to combine all of these definitions with the original configuration version 
and imagine how hard it might be to support all of these features and introduce new ones.

The problem is similar to inheritance vs. composition.


## Silver bullet

The current configuration architecture already has several limitations:
- It is not possible to define multiple targets for a single feature
- Targets cannot be combined with another target: classMethod + arguments 0, 1, 2 + at the value of array key “here”
- Value change propagation: even replacing a regex like /[a-zA-Z]+/ with lowercase($1) causes a combinatorial explosion
- Both targets and features are language-specific: you cannot specify a target for `\Namespace\MyClass` because, in JavaScript, there are no namespaces, etc

## Conclusion

Like every evolving concept, MetaStorm must go through several evolutionary upgrades.

Today, MetaStorm is only a 3-month-old project that might surpass several plugins in simplicity and flexibility.
I really hope that it will become as popular as `.gitignore` files.

You, as a vendor, can now control users’ IDEs to make them more productive.
