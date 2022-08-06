# Arrays
**Arrays** is a composer library designed to make easy some actions withs arrays.

# How to start 🚀

Follow the next steps to use Arrays, you will see that is very easy to use.

## Prerequisites 📋

You will need to have installed php and composer in your computer.

## Installation 🔧

You need to require the package to your project.

```bash
composer require agrandesr/arrays
```

Next, you can use in your code. We encourage to use in the root file _index.php_. It is important to write under the autoload require.

```php
<?php

use AgrandesR\Utils\Arrays;

$array=["lvl1"=>["lvl2"=>"lvl3"=>"content"];

$data = Arrays::pathGet('lvl1.lvl2.lvl3',$array);

echo $data
```

The result will be:

There is a easy example to test!

``` bash
content
```
Like you can see it is very easy to add **Arrays** into your project. In the _Documentation_ section you will be able to see the functions of the Utils components and there use. 

# Documentation

All the functions of Arrays are static. Now you can see each function, how to use and the utility.

*Future I will try to make an easy video tutorial to make easy the first steps with this library.*

## pathSet()

...content...

## pathGet()

...content...

# Aditional information

<!--

Contributing 🖇️ 
Please read [CONTRIBUTING.md]() for details of our code of conduct, and the process for sending us pull requests. 

-->

## Versioning: 📌

For all available versions, see the [tags in this repository](https://github.com/AGrandesR/php-utils-arrays/tags).

## Authors ✒️

* **A.Grandes.R** - *Main worker* - [AGrandesR](https://github.com/AGrandesR)

You can also look at the list of all [contributors] (https://github.com/your/project/contributors) who have participated in this project.

## License 📄

This project is under the License MIT - read the file [LICENSE.md](LICENSE.md) for more details.

## Thanks to: 🎁

* [Villanuevand](https://github.com/Villanuevand) for his incredible [template](https://gist.github.com/Villanuevand/6386899f70346d4580c723232524d35a) for documentation 😊
