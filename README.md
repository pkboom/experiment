---
title: Example
foo: bar
bar:
    foo: bar
    bar: baz
---

A to the point front matter parser. Front matter is metadata written in yaml, located at the top of a fil

```md
Lorem ipsum.
```

```php
$object = YamlFrontMatter::parse(file_get_contents(__DIR__.'/example.md'));

$object->matter('title'); // => 'Example';
$object->body(); // => 'Lorem ipsum.'

// Or retrieve front matter with a property call...

$object->title; // => 'Example';
```

Spatie is a webdesign agency based in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://spatie.be/opensource).
