---
extends: _layouts.post
section: content
title: Fuse Search
date: 2018-12-22
description: Fast local search powered by FuseJS
cover_image: /assets/img/post-cover-image.svg
categories: [feature]
featured: true
---

To provide fast local search, the Jigsaw Blog skeleton comes with a pre-built Vue.js component that uses Fuse.js. [Fuse.js](http://fusejs.io/) is a "lightweight fuzzy-search library with _no_ dependencies." It works by running queries against a JSON index. 

During the [build process](http://jigsaw.tighten.co/docs/building-and-previewing/), a `index.json` file is generated in the build directory, with the content from `source/_posts`. The `Search.vue` component then consumes this index file, and uses the search input for querying. 

There's no configuration, just search results.

