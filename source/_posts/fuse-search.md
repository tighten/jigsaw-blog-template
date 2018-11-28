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

To provide fast local search, this skeleton comes with a Vue.js component that uses Fuse.js. [FuseJS](http://fusejs.io/) is a lightweight fuzzy-search library with _no_ dependencies. It works by running queries against a JSON index. 

During the build process, the skeleton automatically builds an `index.json` file with the content from `source/_posts`. The `Search.vue` component consumes this index, and uses the input for querying. 

There's no configuration, just search results.

