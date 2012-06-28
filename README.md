About
============

Bundle that provides user functionality for Symfony2 projects. This bundle is provided as a part of the
SmartBusinessPlatform from ROTEX Heating Systems and is most usefull in combination with other bundles of this
platform.

[![Build Status](https://secure.travis-ci.org/RtxLabs/UserBundle.png)](http://travis-ci.org/RtxLabs/UserBundle)

Installation
============

## Installation

### Step 1) Get the bundle

First, grab the RtxLabsUserBundle. There are two different ways
to do this:

#### Method a) Using the `deps` file

Add the following lines to your  `deps` file and then run `php bin/vendors
install`:

```
[RtxLabsUserBundle]
    git=https://github.com/RtxLabs/UserBundle.git
    target=bundles/RtxLabs/UserBundle
```

#### Method b) Using submodules

Run the following commands to bring in the needed libraries as submodules.

```bash
git submodule add https://github.com/RtxLabs/UserBundle.git vendor/bundles/RtxLabs/UserBundle
```

### Step 2) Register the namespaces

Add the following namespace entry to the `registerNamespaces` call
in your autoloader:

``` php
<?php
// app/autoload.php
$loader->registerNamespaces(array(
    // ...
    'RtxLabs' => __DIR__.'/../vendor/bundles',
    // ...
));
```

### Step 3) Register the bundle

To start using the bundle, register it in your Kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new RtxLabs\LiquibaseBundle\RtxLabsUserBundle(),
    );
    // ...
)
```

Usage
============

```

TODO
============

* Write a decent documentation
* Add unit tests