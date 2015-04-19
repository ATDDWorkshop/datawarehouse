Datawarehouse
==============================

Introduction
------------
This is a REST based datawarehouse application created with https://apigility.org.

Routes
------------

Admin UI

    http://datawarehouse
    
REST services

    http://datawarehouse/user
    http://datawarehouse/packages

RPC services

    http://datawarehouse/marketing

Requirements
------------
  
Please see the [composer.json](composer.json) file.

Installation
------------

    git clone https://github.com/ATDDWorkshop/datawarehouse.git

Assuming you already have Composer:

    composer.phar install

Add a alias to your /etc/hosts

    127.0.0.1   datawarehouse

Create mysql database

    mysql -h hostname -u user --password=password < ATDD.sql
    
Configure DB adapter in config/autoload/local.php

    <?php
    return array(
        'db' => array(
            'adapters' => array(
                'ATDD' => array(
                    'driver' => 'Pdo_Mysql',
                    'database' => 'ATDD',
                    'username' => 'myuser',
                    'password' => 'mypassword',
                    'hostname' => 'localhost',
                ),
            ),
        ),
    );
    
    
    

### All methods

Once you have the basic installation, you need to put it in development mode:

```bash
cd path/to/install
php public/index.php development enable # put the skeleton in development mode
```

Now, fire it up! Do one of the following:

- Create a vhost in your web server that points the DocumentRoot to the
  `public/` directory of the project
- Fire up the built-in web server in PHP (5.4.8+) (**note**: do not use this for
  production!)

In the latter case, do the following:

```bash
cd path/to/install
php -S 0.0.0.0:8080 -t public public/index.php
```

You can then visit the site at http://localhost:8080/ - which will bring up a
welcome page and the ability to visit the dashboard in order to create and
inspect your APIs.

### NOTE ABOUT USING THE PHP BUILT-IN WEB SERVER

PHP's built-in web server did not start supporting the `PATCH` HTTP method until
5.4.8. Since the admin API makes use of this HTTP method, you must use a version
&gt;= 5.4.8 when using the built-in web server.

### NOTE ABOUT USING APACHE

Apache forbids the character sequences `%2F` and `%5C` in URI paths. However, the Apigility Admin
API uses these characters for a number of service endpoints. As such, if you wish to use the
Admin UI and/or Admin API with Apache, you will need to configure your Apache vhost/project to
allow encoded slashes:

```apache
AllowEncodedSlashes On
```

This change will need to be made in your server's vhost file (it cannot be added to `.htaccess`).

### NOTE ABOUT OPCACHE

**Disable all opcode caches when running the admin!**

The admin cannot and will not run correctly when an opcode cache, such as APC or
OpCache, is enabled. Apigility does not use a database to store configuration;
instead, it uses PHP configuration files. Opcode caches will cache these files
on first load, leading to inconsistencies as you write to them, and will
typically lead to a state where the admin API and code become unusable.

The admin is a **development** tool, and intended for use a development
environment. As such, you should likely disable opcode caching, regardless.

When you are ready to deploy your API to **production**, however, you can
disable development mode, thus disabling the admin interface, and safely run an
opcode cache again. Doing so is recommended for production due to the tremendous
performance benefits opcode caches provide.
