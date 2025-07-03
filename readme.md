# Jigsaw Blog Starter Template

This is a starter template for creating a beautiful, customizable blog in Jigsaw with minimal effort. You’ll only have to change a few settings and you’re ready to go.

[View a preview of the blog template.](http://jigsaw-blog-template.tighten.co/)

## Installation

After installing Jigsaw, run the following command from your project directory:

```bash
./vendor/bin/jigsaw init blog
```

This starter template includes samples of common page types, and comes pre-configured with:

- A fully responsive navigation bar
- [Tailwind CSS](https://tailwindcss.com/), a utility CSS framework that allows you to customize your design without touching a line of CSS
- Syntax highlighting using [Prism](https://prismjs.com/)
- A script that automatically generates a `sitemap.xml` file
- A custom 404 page
- A sample contact form
- A search bar powered by [Fuse.js](http://fusejs.io/) and [Alpine.js](https://alpinejs.dev/), which indexes your content automatically and requires zero configuration

---

![Blog starter template screenshot](/.github/screenshots/template-blog.png)

---

### Configuring your new site

As with all Jigsaw sites, configuration settings can be found in `config.php`; you can update the variables in that file with settings specific to your site. You can also add new configuration variables there to use across your site; take a look at the [Jigsaw documentation](http://jigsaw.tighten.co/docs/site-variables/) to learn more.

```php
// config.php
return [
    'baseUrl' => 'https://my-awesome-jigsaw-site.com/',
    'production' => false,
    'siteName' => 'My Site',
    'siteDescription' => 'Give your blog a boost with Jigsaw.',
    ...
];
```

> Tip: This configuration file is also where you’ll define any "collections" (for example, a collection of the contributors to your site, or a collection of blog posts organized by topic). Check out the official [Jigsaw documentation](https://jigsaw.tighten.co/docs/collections/) to learn more.

---

### Adding Content

You can write your content using a [variety of file types](http://jigsaw.tighten.co/docs/content-other-file-types/). By default, this starter template expects your content to be located in the `source/_posts/` folder.

The top of each content page contains a YAML header that specifies how it should be rendered. The `title` attribute is used to dynamically generate HTML `title` and OpenGraph tags for each page. The `extends` attribute defines which parent Blade layout this content file will render with (e.g. `_layouts.post` will render with `source/_layouts/post.blade.php`), and the `section` attribute defines the Blade "section" that expects this content to be placed into it.

```yaml
---
extends: _layouts.post
section: content
title: Getting Started
date: 2022-08-02
description: Getting started with the Jigsaw blog starter template
cover_image: /assets/img/post-cover-image-2.png
featured: true
---
```

---

### Adding Assets

Any assets that need to be compiled, such as JavaScript or CSS using Tailwind, can be added to the `source/_assets/` directory. Vite will process them when running `npm run dev` or `npm run build`, and the processed assets will be stored in `/build_local` or `/build_production`, respectively.

Files that don't require processing (such as images and fonts) can be added directly to `/source/assets/`.

[Read more about compiling assets in Jigsaw using Vite.](http://jigsaw.tighten.co/docs/compiling-assets/)

---

## Building Your Site

Now that you’ve edited your configuration variables and know how to customize your styles and content, let’s build the site.

```bash
# run development server
npm run dev

# build static files with Vite
npm run build
```
