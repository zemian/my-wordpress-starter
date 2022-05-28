## About This Project

My streamlined WordPress (WP) Setup for local dev.

Instead of writing directly into `wordpress` application folder, we let WP loads the 
`<my-wordpress-starter>/config.php` on parent directory for configuration, and we have changed
and use the `<my-wordpress-starter>/my-wp-content` folder for all the plugins and themes files instead.


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

3. Copy `<my-wordpress-starter>/wp-config-local.php` to `<my-wordpress-starter>/wp-config.php` and change the default if needed. (We recommend you to change the salt keys for each new environment!)

NOTE: This file is under `<my-wordpress-starter>` project directory (not inside `wordpress`). We do not 
want to touch the original `wordpress` if possible. The WP will automatically detect the `wp-config.php`
file from parent directory and uses it. With this custom WP config, we have stream-lined the 
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
