# my-wordpress-starter

A quick setup for WordPress development.

This project setup is based on [my-wordpress-starter](https://github.com/zemian/my-wordpress-starter/).

## Quick start

```
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
alias wp='php wp-cli.phar'

cd my-wordpress-starter
cp wp-config-local.php wp-config.php
# Edit DB connection config in wp-config.php

wp core download
wp db create
wp core install
wp server
open http://localhost:8080/wordpress/wp-admin/
```

## About `my-wordpress-starter` Project

This project starter template provides a streamlined WordPress (WP) structure setup for local
development.

Instead of writing directly into `wordpress` application folder, we let WP loads the 
`<my-wordpress-starter>/config.php` on parent directory for configuration, and we have changed
and use the `<my-wordpress-starter>/my-wp-content` folder for all the plugins and themes files instead.

### Why we need this?

The WordPress was designed to deploy itself under a web server DocumentRoot, and all the plugins and themes
under the `wordpress/wp-content` folder. This makes local development difficult to source control and separate
your own plugin work from the core WordPress file. This is specially true when you have to run WordPress core
upgrade. The files updated by core are all mixed with your own plugin/theme development file.

### How is it done?

So to solve this problem, we setup a separate `my-wp-content` folder outside of WordPress. The trick is to tell
WordPress how to load and bootstrap itself with that and mange the `wp-config.php`. The `wp-config.php` file
is never part of WordPress core, and it's always user generated. It turns out that WordPress will automatically
look for this `wp-config.php` outside of itself from a parent directory! So this works well when we setup our
project as parent directory, and simply add `wordpress` core files under. In our custom `wp-config.php` we simply
change the location of `WP_CONTENT_DIR` value.

## First Time Setup

What you need (assume you are on MacOS):

* You would need to install MySQL database with `brew install mysql`.
* You would need to install PHP 8.0 with `brew install php@8.0`.
* You need to install `WP-CLI` tool with `brew install wp-cli`.
* Optional: Install Apache web server with `brew install httpd`.

1. Setup a new DB user for development:

```
bash> mysql -u root

sql> CREATE USER IF NOT EXISTS 'mydbuser'@'localhost' IDENTIFIED BY 'test123';
sql> GRANT ALL PRIVILEGES ON *.* TO 'mydbuser'@'localhost';
```

NOTE: I have setup this DB user to have access to any database locally. If you want to restrict only to
WordPress db, then change `*.*` to `mywordpress.*` instead. The DB name is set inside the `wp-config-local.php` file.

2. Download WordPress (WP) application:

```
cd <my-wordpress-starter>
wp core download
```

This will download and create the `wordpress` folder. This is the WP application, and we will not 
add this into our Git repository. We will setup local dev web server document root at the project root, and set the `wordpress` as sub folder. (See `wp-cli.yml` configuration).

3. Copy `<my-wordpress-starter>/wp-config-local.php` to `<my-wordpress-starter>/wp-config.php` and change the default if needed. (We recommend you to change the salt keys for each new environment as well!)

NOTE: This `wp-config.php` file should be copied into `<my-wordpress-starter>` project directory 
(not inside `wordpress`). We do not  want to touch the original `wordpress` core files. The WP will automatically 
detect the `wp-config.php` file from parent directory and uses it. With this custom WP config, we have stream-lined the 
structure of WP. Instead of writing directly into `wordpress` application folder, we let WP loads the
`<my-wordpress-starter>/config.php` on parent directory for configuration, and we have changed
and use the `<my-wordpress-starter>/my-wp-content` folder for all the plugins and themes files instead.

5. Setup and install WP for the first time:

```
cd <my-wordpress-starter>
wp db create
wp core install --url=http://localhost:8080/wordpress --title=MyWP \
  --admin_user=admin --admin_email=admin@localhost.local --admin_password=test123
```

NOTE: To re-run the installation, run `wp db clean` first and then `wp db install` again.

NOTE: To remove all the sample pages from the site after install, run `wp site empty`. 

6. Run local WP web server

```
cd <my-wordpress-starter>
wp server
open http://localhost:8080/wordpress/wp-admin/
```

NOTE: Since we set web server documentRoot folder same as this project root directory, thus we need
to access WP with `/wordpress` path. However we do added a `<project-root>/index.php` can also bootstrap
WP nicely as well. Meaning you should able to get to WP by http://localhost:8080/ as well.

## How to start WP development?

Just start creating plugins or themes under `<my-wordpress-starter>/my-wp-content` folder!

See [WordPress Developer Guide](https://developer.wordpress.org/) for more.

## How to run WP Updates?

```
wp core update
```

You can also use `check-update` or `version` to verify your installations.

NOTE: The `wp core update` command will up auto update Themes! You have to run `wp theme update --all` separately.

## How to remove default themes?

We have used a must-use plugin `my-wp-content/mu-plugins/register-theme-directory.php` to load all the default themes inside of `wordpress/wp-content/themes` directory. If you do not want these to be listed under Themes menu inside Admin, then remove this plugin.

## How is this compare to Bedrocks?

This project template is inspired by [Bedrock](https://roots.io/bedrock/), and in fact, we re-use
one of theri mu-plugins named "register-theme-directory.php". However, we kept it very minimal, 
and we do not use/depends on "composer" to get dependencies. We simply take advantage of the
"wp-cli" command line tool. This allows us to stay close to WordPress structure as much as 
possible, and yet still having the advantage of separation of "wp-content" away from deployed 
"wordpress" directory. We believe this is a good balance and bring efficient and quick way to 
setup and start WordPress development.
