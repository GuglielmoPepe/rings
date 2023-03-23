# Rings
Rings allows you to create and dispatch sequential, decorable, filterable and/or composable pipelines.

## Table of Contents 
* [Benefits](#benefits)
* [Features](#features)
* [Prerequisites](#prerequisites)
* [Installation](#installation)
* [Usage](#usage)
* [Documentation](#documentation)
* [Support](#support)
* [Faq](#faq)
* [Contributing](#contributing)
* [Contacts](#contacts)
* [Roadmap](#roadmap)
* [Change log](#change-log)
* [License](#license)


## Benefits
* Be highly composable.
* Be immutable.

## Features
Rings are implemented as immutable chains. When you enqueue a new decorator, a new stage will be created with the added decorator. 

You can enqueue decorators that add functionality to the pipeline. You can enqueue decorators that filter the operations to be done on data. You can enqueue decorators which add sub pipelines.

This makes pipelines easy to reuse, highly composable, and minimizes side-effects.

## Prerequisites
* PHP 7.2.0

Yes, that's the only hard requirement.

## Installation
Use Composer

``` bash
$ composer require guglielmopepe/rings
```

## Usage
``` php
// create pipeline
$pipeline = new \Rings\Classes\Pipeline(new \SplQueue());

// add decorators: 
$pipeline->addDecorator(new \Rings\Classes\Decorator(function (\Rings\Interfaces\Data $data) {echo 'Stage 1 <br />';return $data;}));
$pipeline->addDecorator(new \Rings\Classes\Decorator(function (\Rings\Interfaces\Data $data) {echo 'Stage 2 <br />';return $data;}));
$pipeline->addDecorator(new \Rings\Classes\Decorator(function (\Rings\Interfaces\Data $data) {echo 'Stage 3 <br />';return $data;}));

// execute command
$data = $pipeline->execute(new \Rings\Classes\Data([]));
```

## Documentation

### Create pipeline like macro
``` php
// create pipeline
$pipeline = new \Rings\Classes\Pipeline(new \SplQueue());

// add decorators: 
$pipeline->addDecorator(new \Rings\Classes\Decorator(
    function (\Rings\Interfaces\Data $data)
    {
        return new \Rings\Classes\Data(['foo' => '***' . $data['foo'] . '***']);
    })
);

$pipeline->addDecorator(new \Rings\Classes\Decorator(
    function (\Rings\Interfaces\Data $data)
    {
        return new \Rings\Classes\Data(['foo' => '___' . $data['foo'] . '___']);
    })
);

// execute command
$data = $pipeline->execute(new \Rings\Classes\Data(['foo' => 'bar']));


// print ___***bar***___
echo $data['foo'];
```

### Create pipeline with filter
``` php
// create pipeline
$pipeline = new \Rings\Classes\Pipeline(new \SplQueue());

// add decorators: 
$pipeline->addDecorator(new \Rings\Classes\Decorator(
    function (\Rings\Interfaces\Data $data)
    {
        if (strpos($data['foo'], '***') !== FALSE)
        {
            return $data;
        }

        return new \Rings\Classes\Data(['foo' => '***' . $data['foo'] . '***']);
    })
);

$pipeline->addDecorator(new \Rings\Classes\Decorator(
    function (\Rings\Interfaces\Data $data)
    {
        if (strpos($data['foo'], '___') !== FALSE)
        {
            return $data;
        }

        return new \Rings\Classes\Data(['foo' => '___' . $data['foo'] . '___']);
    })
);

// execute command
$data = $pipeline->execute(new \Rings\Classes\Data(['foo' => 'bar']));


// print ___***bar***___
echo $data['foo'];

// execute command
$data = $pipeline->execute(new \Rings\Classes\Data(['foo' => '***bar***']));


// print ***bar***
echo $data['foo'];

// execute command
$data = $pipeline->execute(new \Rings\Classes\Data(['foo' => '___bar___']));


// print ***bar***
echo $data['foo'];
```

## Support
If you have a request, please create a GitHub [issue](https://github.com/GuglielmoPepe/rings/issues).

If you discover a security vulnerability, please send an email to Guglielmo Pepe at [&#105;&#110;&#102;&#111;&#64;&#103;&#117;&#103;&#108;&#105;&#101;&#108;&#109;&#111;&#112;&#101;&#112;&#101;&#46;&#99;&#111;&#109;](&#109;&#97;&#105;&#108;&#116;&#111;&#58;%69%6e%66%6f%40%67%75%67%6c%69%65%6c%6d%6f%70%65%70%65%2e%63%6f%6d). All security vulnerabilities will be promptly addressed.

## Faq
_To do_


## Contributing
If you want to say **thank you** and/or support the active development of `Rings`:

1. Add a [GitHub Star](https://github.com/GuglielmoPepe/rings/stargazers) to the project.
2. Share the project on social media.
3. Write a review or tutorial on [Medium](https://medium.com/), [Dev.to](https://dev.to/) or personal blog.

## Contacts
If you need information please send an email to [&#105;&#110;&#102;&#111;&#64;&#103;&#117;&#103;&#108;&#105;&#101;&#108;&#109;&#111;&#112;&#101;&#112;&#101;&#46;&#99;&#111;&#109;](&#109;&#97;&#105;&#108;&#116;&#111;&#58;%69%6e%66%6f%40%67%75%67%6c%69%65%6c%6d%6f%70%65%70%65%2e%63%6f%6d).

## Roadmap
See the list of [open issues](https://github.com/GuglielmoPepe/rings/issues):
- [enhancement](https://github.com/GuglielmoPepe/rings/issues?q=label%3Aenhancement+is%3Aopen+sort%3Areactions-%2B1-desc)
- [bugs](https://github.com/GuglielmoPepe/rings/issues?q=is%3Aissue+is%3Aopen+label%3Abug+sort%3Areactions-%2B1-desc) 


## Change log
Please see [Changelog file](changelog.md) for more information on what has changed recently.

## License
Distributed under the MIT License. Please see [License File](license.md) for more information.
