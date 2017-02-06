# Unravel

WordPress plugin to separate concerns for [Models](https://github.com/soberwp/models) and [Advanced Custom Fields](https://www.advancedcustomfields.com/) from your theme. 

## Installation

#### Composer:

Recommended method; [Roots Bedrock](https://roots.io/bedrock/) and [WP-CLI](http://wp-cli.org/)
```shell
$ composer require soberwp/unravel
$ wp plugin activate unravel
```

#### Manual:

* Download the [zip file](https://github.com/soberwp/unravel/archive/master.zip)
* Unzip to your sites plugin folder
* Activate via WordPress

#### Requirements:

* [PHP](http://php.net/manual/en/install.php) >= 5.6.x

## Usage:

Move your data/model config files out of your theme folder for better separation of concerns.

**Unravel performs the following tasks;**

* Moves folders `model-config/` and `acf-json/` within your theme to `wp-content/models/` (or `web/app/models/` for Bedrock).
* Updates and overrides save/load filter paths for each plugin.

**Deactivation;**

* Data/model config files are moved back to their default locations within your theme.

## Updates

#### Composer:

* Change the composer.json version to ^1.0.0**
* Check [CHANGELOG.md](CHANGELOG.md) for any breaking changes before updating.

```shell
$ composer update
```

#### WordPress:

Includes support for [github-updater](https://github.com/afragen/github-updater) to keep track on updates through the WordPress backend.
* Download [github-updater](https://github.com/afragen/github-updater)
* Clone [github-updater](https://github.com/afragen/github-updater) to your sites plugins/ folder
* Activate via WordPress

## Social

* Twitter [@withjacoby](https://twitter.com/withjacoby)
