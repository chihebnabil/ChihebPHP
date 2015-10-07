#PHP MVC FRAMEWORK

[![Join the chat at https://gitter.im/chihebnabil/Chiheb-PHP](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/chihebnabil/Chiheb-PHP?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

This php MVC Framework uses as a dependency  cakephp ORM to manage database .


###INSTALATION


####DOWNLOAD

Download the github repo  Unzip it then make a composer install to install dependencies

####DATABASE

To setup your database go to  /app/database.php and change the (username,password,database)

```php

use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
ConnectionManager::config('default', [
    'className' => 'Cake\Database\Connection',
    'driver' => 'Cake\Database\Driver\Mysql',
    'database' => DATABASE,
    'username' => DB_USERNAME,
    'password' => DB_PASSWORD,
    'host'     => HOSTNAME
]);



```


####HTML HELPERS
Example of script & css tags

```php


    echo Html::script($src);

    echo Html::css($link);

    echo Html::image($src, $attributes = '');

    echo Html::email($email, $label = null, $attributes = null);


```

####MAIL
Example of creating an e-mail using Nette\Mail\Message class:

```php
 use Nette\Mail\Message;

    $mail = new Message;

    $mail->setFrom('John <john@example.com>')
    ->addTo('peter@example.com')
    ->addTo('jack@example.com')
    ->setSubject('Order Confirmation')
    ->setBody("Hello, Your order has been accepted.");
```




####UPLOAD

Example of UPLOADING  a file


```php
    if (!empty($_FILES['file'])) {

      $handle = new upload($_FILES['file']);
      if ($handle->uploaded) {
        $file_name = md5(rand(1000, 9999999)) ;
       $ext =   explode(".", strtolower($_FILES['file']['name']));
        $handle->file_new_name_body   = $file_name ;


        $handle->image_ratio_y        = true;
        $handle->process(APP.'files');
        if ($handle->processed) {




          $handle->clean();
        } else {
          echo 'error : ' . $handle->error;
        }
      }

}
```
##DOCUMENTATION


### License

This framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
