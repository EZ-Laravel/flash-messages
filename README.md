# EZ Laravel Flash Messages

[![Build Status](https://travis-ci.org/ez-laravel/flash-messages.svg?branch=master)](https://travis-ci.org/ez-laravel/flash-messages) [![StyleCI](https://github.styleci.io/repos/264743455/shield?branch=master)](https://github.styleci.io/repos/264743455)

Package to provide you with an easy way to implement flash messages in your Laravel application.

## Installation

Run the following command in your project directory to install the package:
```
composer require ez-laravel/flash-messages
```

Publish the vue components 
```
php artisan vendor:publish --provider="EZ\FlashMessages\FlashServiceProvider" --tag=vue
```

### Views

The message partials which will be rendered whenever you flash a message can be found in the ```resources/views/vendor/flash``` directory.

Adjust them as you see fit.

### Styling

A Sass stylesheet has been published to ```resources/sass/_flash-messages.scss``` which you should adjust as you see fit and import in your ```app.scss``` file as following:

```
@import "flash-messages";
```

## Usage



## Credits

This package was basically copied from [laracasts/flash](https://github.com/laracasts/flash) as a practice project. I used to use that package a lot and this one is custom tailored to how I like to use it. So big thank you to laracasts for the code and all lessons provided by their platform.