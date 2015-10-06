#PHP MVC FRAMEWORK

this php MVC Framework uses as a dependency  the package :  illuminate/database to manage database


"require": {
   "php": ">=5.4.0",
    "illuminate/database": "^5.1"
}

##INSTALATION

####DOWNLOAD

Download the github repo  Unzip it then make a composer install to install dependencies

####DATABASE

To setup your database go to  /app/database.php and change the (username,password,atabase)



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
