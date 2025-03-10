PHP MVC FRAMEWORK
===

This php MVC Framework uses as a dependency  Cakephp ORM to manage database .


INSTALATION
====

DOWNLOAD
==
Download the github repo  Unzip it then make a composer install to install dependencies

Change the rewritebase in  public/.htaccess

DATABASE
==

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
Controllers
==
Example of users controller [user's Auth] :

```php

use Cake\ORM\TableRegistry;




class Users extends Controller
{
public function login()
   {
     $Auth = new Auth();
     $Auth->login('username','password');
     $this->view('users/login');  // load view file in app/views/users/login.php

   }

}


```
Views
==
Views are in app/views/YOURCONTROLLER/ folder

you can call the views function ex:

```php

 $this->view('users/login');  // load view file in
 app/views/users/login.php



```
Layouts
==
Layouts are in app/views/layouts/ folder

by default the layout is default.php

if you want to change the default layout in the view function :


```php

$this->view('users/login',$data,'mylayout.php');

 // load view file with layout file mylayout.php


```

HTML HELPERS
==
Example of script & css tags

```php


    echo Html::script($src);

    echo Html::css($link);

    echo Html::image($src, $attributes = '');

    echo Html::email($email, $label = null, $attributes = null);


```

HTTP HELPERS
==
Example of enabling cors function  :

```php

Http::cors();


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
DOCUMENTATION
==

### License

This framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
