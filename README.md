# Laravel Simple Tree

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ionesculiviucristian/laravel-simple-tree.svg?style=flat-square)](https://packagist.org/packages/ionesculiviucristian/laravel-simple-tree)
[![Build Status](https://img.shields.io/travis/ionesculiviucristian/laravel-simple-tree/master.svg?style=flat-square)](https://travis-ci.org/ionesculiviucristian/laravel-simple-tree)
[![Quality Score](https://img.shields.io/scrutinizer/g/ionesculiviucristian/laravel-simple-tree.svg?style=flat-square)](https://scrutinizer-ci.com/g/ionesculiviucristian/laravel-simple-tree)
[![Total Downloads](https://img.shields.io/packagist/dt/ionesculiviucristian/laravel-simple-tree.svg?style=flat-square)](https://packagist.org/packages/ionesculiviucristian/laravel-simple-tree)

This package provides functionality for handling simple tree structures.

## Installation

You can install the package via composer:

```bash
composer require ionesculiviucristian/laravel-simple-tree
```

## Usage

``` php
$tree = new ionesculiviucristian\LaravelSimpleTree([
    ['id' => 1, 'parent_id' => 0],
    ['id' => 2, 'parent_id' => 1],
    ['id' => 3, 'parent_id' => 1],
    ['id' => 4, 'parent_id' => 3],
    ['id' => 5, 'parent_id' => 0],
    ['id' => 6, 'parent_id' => 0],
    ['id' => 7, 'parent_id' => 0],
    ['id' => 8, 'parent_id' => 7],
    ['id' => 9, 'parent_id' => 0],
]);

print_r($tree->build());
```

outputs:

```
Array
(
    [0] => Array
        (
            [id] => 1
            [parent_id] => 0
            [children] => Array
                (
                    [0] => Array
                        (
                            [id] => 2
                            [parent_id] => 1
                        )

                    [1] => Array
                        (
                            [id] => 3
                            [parent_id] => 1
                            [children] => Array
                                (
                                    [0] => Array
                                        (
                                            [id] => 4
                                            [parent_id] => 3
                                        )

                                )

                        )

                )

        )

    [1] => Array
        (
            [id] => 5
            [parent_id] => 0
        )

    [2] => Array
        (
            [id] => 6
            [parent_id] => 0
        )

    [3] => Array
        (
            [id] => 7
            [parent_id] => 0
            [children] => Array
                (
                    [0] => Array
                        (
                            [id] => 8
                            [parent_id] => 7
                        )

                )

        )

    [4] => Array
        (
            [id] => 9
            [parent_id] => 0
        )

)
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Ionescu Liviu Cristian](https://github.com/ionesculiviucristian)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
