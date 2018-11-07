---
extends: _layouts.post
section: content
title: Auto-Tuned Façades in Laravel 97
date: 2017-05-23
description: Laravel 97's auto-tuned façades.
categories: [laravel, profundity]
cover_image: /assets/img/post-cover-image.svg
---

Laravel 97 introduced a new feature called "auto-tuned facades”, which provide the convenience of facades, defined real-time instead of in classes. Taylor [tweeted](https://twitter.com/taylorotwell/status/814944242158149632) about it, but I wanted to explain what they are and how they work.

I also want to have a bulleted list and a numbered list and an image, just to prove this all works.

Here's the list of reasons why Façades are great:

* First item of a bulleted list
* And second
    * MORE SECOND
* [And third](https://www.google.com/)

Another list with a subhead:

### Greatest list ever!

* First
* Second

Here's the order of operations:

1. First item
    * A
    * B
    * C
2. Not third item
    1. Bahaha
3. Not second item

Hooray!

## A quick introduction to facades in Laravel

> Already know how facades work? Skip to [what’s new](#whats-new).

If you’re not familiar with facades in Laravel, they’re shortcut classes that provide static access to non-static methods on service classes bound to Laravel’s container. Phew, that’s a mouthful; let’s take a look at some real code.

For instance, if I want get something from the session, here’s one way to do it in Laravel:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Session\SessionManager;

class ThingController extends Controller
{
    protected $session;
    
    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function doThing()
    {
        $importantValue = $this->session->get('important');
    }
}
```

… or in a view:

```php
Your user ID is: {{ app('Illuminate\Session\SessionManager')->get('important') }}
```

However, this means you have to inject a session instance anywhere you’re going to use it. This isn’t a big issue, but especially in views and sometimes controllers (especially before controllers were namespaced), this hasn’t always the most convenient. The `app()` helper also makes it easier, as you can see in the view example. But facades make that even easier:

```php
<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;

public function ThingController extends Controller
{
    public function doThing()
    {
        $importantValue = Session::get('important');
    }
}
```

… or in a view:

```php
Your user ID is: {{ Session::get('important') }}
```

The facade works like this: 

```php
class Session extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'session';
    }
}
```

This is telling the container this: “When I use a static method on the `Session`  facade, call it on an instance of `app('session')`”. The facade functionality pulls an instance out of the container and calls the method directly on that.

> Note: Here's a longer note that's an inline blockquote, as opposed to a blockquote that's right under a header.

Good? Good. Let’s cover what a real-time facade is.

<a id="whats-new"></a>
## Introducing real-time facades

Real-time facades let you create your own facades on the fly. Instead of having to create a facade class like the `Session` facade class I referenced above, you can use a class as its own facade by adding `Facades\` to the beginning of its own namespace.

Let’s say I have a class called Charts that has a `burndown()` method:

```php
<?php

namespace App;

class Charts
{
    protected $dep;

    public function __construct(SomeDependency $dep)
    {
        $this->dep = $dep;
    }

    public function burndown()
    {
        return 'stuff here' . $this->dep->stuff();
    }
}
```

There’s nothing special about this class. Here’s how we would normally use it in a view:

```php
<h2>Burndown</h2>
{{ app(App\Charts::class)->burndown() }}
```

Now, let’s make it a facade, just by changing the namespace:

```php
<h2>Burndown</h2>
{{ Facades\App\Charts::burndown() }}
```

Or, in a class, from this:

```php
<?php

namespace App\Stuff;

use App\Charts;

class ThingDoer
{
    private $charts;

    public function __construct(Charts $charts)
    {
        $this->charts = $charts;
    }

    public function doThing()
    {
        $this->charts->burndown();
    }
}
```

to this:

```php
<?php

namespace App\Stuff;

use Facades\App\Charts;

class ThingDoer
{
    public function doThing()
    {
        Charts::burndown();
    }
}
```

## Post::conclude()
That’s all. Just a quick and simple way to create a facade on the fly. One more tool in your terseness arsenal.

You might be asking yourself, "why all the fuss for something so simple?" In terms of its terseness, it definitely has a lot of value in some contexts and negligible impact in others. What if I told you, though, that you could use real-time façades to make your code *more* testable?

Taylor [wrote a great post](https://medium.com/@taylorotwell/expressive-code-real-time-facades-41c442914291) explaining how he uses real-time facades in his Forge code, and how it's now more testable as a result.
