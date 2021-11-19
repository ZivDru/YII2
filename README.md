<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Test Project</h1>
    <br>
</p>

INSTALLATION
------------

1. Get into your project directory:

~~~
cd some_folder/dirrectory
~~~

2. Make git clone:

~~~
git clone https://github.com/ZivDru/YII2.git .
~~~

3. Manually create database with name: `yii2basic`


4. Run composer update to update dependencies:
~~~
composer update
~~~

5. Run migrations command:
~~~
yii migrate
~~~

6. Then seed db with data:
~~~
yii seed-user-data
~~~
**NOTES:**
- If you want to set custom passwords to the users, create config file user_passwords.php in base config folder.
With 'user_id' => 'password' array, sample:
```php
return [
    'userPasswords' => [
        1 => 'test_pass',
        2 => 'sad pass',
        5 => 'root_pass'
    ]
];
```
- If this config is empty or invalid seed will create users with random password

Api
------------

We have base REST api for users and albums here, all methods are described in documentation: (see [REST API](https://www.yiiframework.com/doc/guide/2.0/en/rest-quick-start#trying-it-out)).

Users base API URL:

~~~
http://your_domain/web/api/users
~~~

Albums base API URL:

~~~
http://your_domain/web/api/albums
~~~

**NOTES:**
- If you want to get response with pagination, simply add page and per-page params to url, example:
~~~
http://your_domain/web/api/albums?page=3&per-page=2
~~~
  

Tests
------------

Created one additional test: NewUserTest for new User model.

To run test run command:
~~~
php vendor/bin/codecept run unit
~~~