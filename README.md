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

$array=['lvl1'=>['lvl2'=>'lvl3'=>'content'];

$data = Arrays::pathGet('lvl1.lvl2.lvl3',$array);

echo $data;
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
This function allows to us to upsert a value into an array using a path route. The default value separator of the Arrays functions is the dot (.), but you can change this separator with the method _setPathSeparator()_ that you can check in this documentation. With this function you can save time when you want to update a unique field of a big multidimensional array.

### Parameters
 - **path**: This is the route from the root of the array to the specific value that we want to upsert. [string]
 - **value**: This is the content to upsert in the path position of the array. [mixed]
 - **receivedArray**: This is the model array that is going to be use to insert the value. [array]
 - **byReference**: Indicate if we are going to modify the original array or is goint to return only the copy modified. [bool][default: true]
### Return
 - **array**: Is the modified value set in *receivedArray* or a copy with the upsert. 
### Examples
``` php
$test=[];
echo json_encode(Arrays::pathSet('lvl1.lvl2.lvl3','test',$test));
//Output: {'lvl1':{'lvl2':{'lvl3':'test'}}}
```
Like you see, all the route is created. For this case is better directly, but in loops that you don't know if the path exist or not can be very usefull to avoid problems with array offset.
``` php
$test=[
    'lvl1'=>[
        'lvl2'=>''
    ],
    '1lvl'=>[
        '2lvl'=>[1,2,3]
    ]
];
echo json_encode(Arrays::pathSet('lvl1.lvl2.lvl3','test',$test));
/*
//Output:
{
    "lvl1":{
        "lvl2":{
            "lvl3":"test"
        }
    },
    "1lvl":{
        "2lvl":[1,2,3]
    }
}
*/
```
You can also change the value in arrays with content.

## pathGet()
This function allows to us to get the value in an array using a path route. The default value separator of the Arrays functions is the dot (.), but you can change this separator with the method _setPathSeparator()_ that you can check in this documentation. With this function you can save time when you want to get a array in a loop or in a function that you are not going to be sure if is going to exist and the deep of multidimensional array.

### Parameters
 - **path**: This is the route from the root of the array to the specific value that we want to read. [string]
 - **receivedArray**: This is the model array that is going to be use to get the value. [array]
### Return
 - **value**: Is the value of inside the array. Null if not exist. 

### Examples
``` php
$test=[
    'lvl1'=>[
        'lvl2'=>''
    ],
    '1lvl'=>[
        '2lvl'=>[1,2,3]
    ]
];
echo Arrays::pathGet('1lvl.2lvl.1',$test);
//Output: 2
```


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
