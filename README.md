# blade-pagination
Laravel's pagination with Blade templating support.

This package is compatible with Laravel 5.0 and Laravel 5.1
(but if you are using Laravel 5.0 you should update to 5.1 it takes 20 minutes or so)

To install through *Composer*:

1 - Add the following instruction to the "require" object in your composer.json:

`"styde/blade-pagination": "5.1.*@dev"`

And execute `composer update` in the console, inside the project's folder.

Or execute `composer require styde/blade-pagination:5.1.*@dev` in the console, inside the project's folder.

2 - Add the service provider to the config/app.php file of your Laravel app:

`'Styde\BladePagination\ServiceProvider'`

3 - To change the templates, please execute the following command in the console:

`php artisan vendor:publish`

4 - Then you can: 

Change the theme (if necessary) in `config/blade-pagination.php`

Change the templates in the `resources/views/blade-pagination` directory
(make sure to edit or add a new template according to the theme specify in `config/blade-pagination.php`)

Alternatively you can just copy the following code:

```
<?php

/***
 * Choose from: bootstrap, foundation, materialize
 * or create your own theme inside resources/views/pagination/
 * If you create a theme for a popular CSS framework
 * Please submit a pull request to: https://github.com/styde/blade-pagination
 * Or send me the template to admin@styde.net
 */
return array(
    'theme' => 'bootstrap'
);
```

Paste it in a new file: `config/blade-pagination.php`

And change the default's theme name to materialize, foundation or create your own theme.