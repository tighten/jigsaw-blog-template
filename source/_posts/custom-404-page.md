---
extends: _layouts.post
section: content
title: Custom 404 Pages
date: 2022-07-24
description: Add a custom 404 page is easy with Jigsaw
categories: [configuration, feature]
---

This starter template includes a custom __404 Not Found__ error page, located at `/source/404.blade.php`. [To preview the 404 page](/404), you can visit `/404` in your browser.

```html
<!-- source/404.blade.php -->

@extends('_layouts.main')

@section('body')
    <div class="flex flex-col items-center mt-32 text-gray-700">
        <h1 class="mb-2 text-6xl font-light leading-none">404</h1>

        <h2 class="text-3xl">Page not found.</h2>

        <hr class="block w-full max-w-sm mx-auto my-8 border">

        <p class="text-xl">
            Need to update this page? See the <a title="404 Page Documentation" href="https://jigsaw.tighten.co/docs/custom-404-page/">Jigsaw documentation</a>.
        </p>
    </div>
@endsection
```

---

Depending on where your site is hosted, you may need to configure your server to use the custom 404 page. For more details, visit the [Jigsaw documentation about configuring a custom 404 page](https://jigsaw.tighten.co/docs/custom-404-page/).
