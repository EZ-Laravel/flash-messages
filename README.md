# EZ Laravel Flash Messages

[![Build Status](https://travis-ci.org/ez-laravel/flash-messages.svg?branch=master)](https://travis-ci.org/ez-laravel/flash-messages) [![StyleCI](https://github.styleci.io/repos/264743455/shield?branch=master)](https://github.styleci.io/repos/264743455)

Package to provide you with an easy way to implement flash messages in your Laravel application.

## Installation

Run the following command in your project directory to install the package:
```
composer require ez-laravel/flash-messages
```

Publish the vue components using the following commands:
```
php artisan vendor:publish --provider=EZ\FlashMessages\FlashServiceProvider --tag=vue
```

This will publish a `flash-messages` directory in your `resources/js/components` directory. 

Make sure these components are (auto) loaded in. I usually make this happen using:
```
// app.js

// Automatically load all vue components
const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
```

To be able to render the 'important' icon this package makes use of [Font Awesome](https://fontawesome.com) icons so make sure that's loaded if you intend to use the 'important' status

## Usage

Use the following blade directive to include the flash messages partial in any view you'd like to display flash messages in
```
@include("flash::messages")
```

Afterwards you can call the following methods from your controller to flash messages to the session which will be displayed on the next page load.

```
// Message with level 'info'
flash('Your message');

// Message with level 'success'
flash('Your message')->success();

// Message with level 'error'
flash('Your message')->error();

// Message with level 'warning'
flash('Your message')->warning();

// Overlay (modal) with default title and custom message
flash('Your message')->overlay();

// Overlay (modal) with custom title and message
flash()->overlay('Your message', 'Your title');

// Message with level 'info' which is important (so it gets a warning icon)
flash('Your message')->important();
```

## Flash message partial

If you'd like to customize the flash message partial you can publish it using the following command:
```
php artisan vendor:publish --provider=EZ\FlashMessages\FlashServiceProvider --tag=views
```
This will publish the partial to the ```resources/views/vendor/flash``` directory.

## Customize styling

All styling is defined inside of the vue components you've published.

## To do

- [ ] Add an option to automatically hide the flash message after X seconds

## Credits

This package was basically copied from [laracasts/flash](https://github.com/laracasts/flash) as a practice project. I used to use that package a lot and this one is custom tailored to how I like to use it. So big thank you to laracasts for the code and all lessons provided by their platform.