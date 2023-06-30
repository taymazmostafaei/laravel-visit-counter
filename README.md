[![Latest Stable Version](http://poser.pugx.org/taymaz/laravel-visitcounter/v)](https://packagist.org/packages/taymaz/laravel-visitcounter)
[![Total Downloads](http://poser.pugx.org/taymaz/laravel-visitcounter/downloads)](https://packagist.org/packages/taymaz/laravel-visitcounter)
[![Latest Unstable Version](http://poser.pugx.org/taymaz/laravel-visitcounter/v/unstable)](https://packagist.org/packages/taymaz/laravel-visitcounter) [![License](http://poser.pugx.org/taymaz/laravel-visitcounter/license)](https://packagist.org/packages/taymaz/laravel-visitcounter)
[![PHP Version Require](http://poser.pugx.org/taymaz/laravel-visitcounter/require/php)](https://packagist.org/packages/taymaz/laravel-visitcounter)

<img alt="screenshot" src="https://github.com/taymazmostafaei/laravel-visit-counter/blob/main/Untitled.png?raw=true" alt="laravel view count"/>

# laravel-visitcounter
laravel package to count pages and posts visits

## Install
From your terminal:

```sh
composer require taymaz/laravel-visitcounter
```

This starts to install laravel-visitcounter package its working with composer so you can use it to easy.

## Basic use

for starting you need to create a file named config to setup backup options like directories and backup export path and ...

### First publish package service provider
You have to this part of code in ``config/app.php``
```php
Taymaz\Visitcounter\VisitCounterServiceProvider::class,
```
### then set middleware
package provide middleware to count each visits from your particular route./n
example:
```php
Route::get('/hello', [HelloWorld::class, 'hello'])->middleware('visitcount');
```
give middleware ``visitcount`` \n
it can handle uri passed parameters.

### get visits result

have easy acess for route visits in your controller.
```php
public function hello(Request $request){
    $request->input('views'); //465
}
```
