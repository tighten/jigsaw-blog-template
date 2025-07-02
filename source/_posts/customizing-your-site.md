---
extends: _layouts.post
section: content
title: Customizing Your Site
date: 2022-08-01
description: Customize your site with CSS and JS
categories: [configuration]
featured: true
excerpt: This starter template comes pre-loaded with Tailwind CSS, a utility CSS framework that allows you to customize and build complex designs without touching a line of CSS.
---

This starter template comes pre-loaded with [Tailwind CSS](https://tailwindcss.com), a utility CSS framework that allows you to customize and build complex designs without touching a line of CSS. There are also a few base CSS files in the `/source/_assets/css` folder, set up with the expectation that you can add any custom CSS into `_blog.css`.

```css
@import "tailwindcss";

@import './base.css' layer(components);
@import './blog.css' layer(components);
```

---

## Typography Styles

Here’s a quick preview of what some of the basic type styles will look like in this starter template:

# h1 Heading
## h2 Heading
### h3 Heading
#### h4 Heading
##### h5 Heading
###### h6 Heading

The quick brown fox jumps over the lazy dog

- The quick brown fox
    - jumps over
        - the lazy dog

1. The quick brown fox
    1. jumps over
        1. the lazy dog

<s>The quick brown fox jumps over the lazy dog</s>

<u>The quick brown fox jumps over the lazy dog</u>

_The quick brown fox jumps over the lazy dog_

**The quick brown fox jumps over the lazy dog**

`The quick brown fox jumps over the lazy dog`

<small>The quick brown fox jumps over the lazy dog</small>

> The quick brown fox jumps over the lazy dog

[The quick brown fox jumps over the lazy dog](#)

```php
class Foo extends bar
{
    public function fooBar()
    {
        //
    }
}
```
