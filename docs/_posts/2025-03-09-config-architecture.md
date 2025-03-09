---
title: "Configuration architecture"
---

MetaStorm provides quite flexible architecture to reach your own goal for making IDE work on you.

Let's have a look at the configuration example from [the previous article](2025-03-07-introductory.md):

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

Here what you can see:
- Some XML metadata
- Common root tag `<meta-storm>`
- Tag `<definitions>` which groups all the definitions inside
- Tag `<classMethod>` with several attributes, which says what place IDE should check
- Tag `<files>` with the configuration attributes, which means that files matched the configuration should be suggested
- Closing tags

So the architecture of the MetaStorm definitions configuration is pretty simple: 
target (`<classMethod>`) and feature (`<files>`) composition.

Based on that fact your might configure **several** features at the time:

```xml
<target>
    <feature1 />
    <feature2 />
    <feature3 />
</target>
```

They might be either features of the same name or different.

> Btw, at future articles or instruction you might face with `<target>` and `<feature>` tags. 
This does mean it doesn't much matter what target or feature should be used, highlighting an accent on the necessary things.


### First beta

Originally the first version of the MetaStorm had the following configs:

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

There were several ugly things that blocked the plugin internal architecture from reaching more and more 
different **points to mount** combining with the features MetaStorm provides.

Either each feature should have supported each target or configuration must be revised. 
The last thing happened at the time and I really liked that it had happened before MetaStorm gained lots of functionality. 

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

Try to combine all of these definitions to the original configuration version and imagine how it might be hard to support all of these feature and invert new.

The problem is similar to inheritance vs composition.


## Silver bullet

Current config architecture already has several limitations:
- Unavailable to define several targets for one feature
- Targets aren't be combined with another target: classMethod + arguments 0, 1, 2 + at value of array key "here"
- Value changes back propagation: even replacing of regexp /[a-zA-Z]+/ to lowercase($1) cause combinatorial bomb
- Both targets and features are language specific: you cannot specify target for \Namespace\MyClass because in javascript there are no namespaces, etc

## Conclusion

As every evolution think MetaStorm must go through several evolution upgrades.

Today MetaStorm is only 3 months old project which might bite several plugins in simplicity and flexibility. 
I really hope that it would be popular as much as `.gitignore` files are. 

You as a vendor are now available to control users IDE to make your users be more productive!
