<?php /**
 *
 */
use Nette\Mail\Message;
use Illuminate\Database\Capsule\Manager as Capsule;




class Users extends Controller
{

   public function register()
   {
     # code...





   }

   public function api_upload()
   {
     # code...
     $http = new Http();
     $http->cors();



     if (!empty($_FILES['file'])) {

       $handle = new upload($_FILES['file']);
       if ($handle->uploaded) {
         $file_name = md5(rand(1000, 9999999)) ;
        $ext =   explode(".", strtolower($_FILES['file']['name']));
         $handle->file_new_name_body   = $file_name ;


         $handle->image_ratio_y        = true;
         $handle->process(APP.'files');
         if ($handle->processed) {
           $capsule = new Capsule;
           $capsule::table('spicies')->insert([[

             'title' => $_POST['title'] ,
             'category_id' => $_POST['category_id']  ,
             'photo' =>  $file_name.".".$ext[1],
             'user_id' =>  1,




           ]  , ]);

           var_dump($ext[1]);



           $handle->clean();
         } else {
           echo 'error : ' . $handle->error;
         }
       }

}




   }
   public function api_register()
   {
     $http = new Http();
     $http->cors();
     # code...
     $Auth = new Auth();
     $capsule = new Capsule;
     $postdata = file_get_contents("php://input");
                 $request = json_decode($postdata);
                 $email = $request->email;
                 $pass = $request->password;


     $capsule::table('users')->insert([['email' => $email ,'password' => $Auth->hash($pass)], ]);
     $logged =   $Auth->login($email,$pass);
     $arr = array(
       'logged' => $logged,
       'email' => $email,
       'password' => $pass
     );
     echo json_encode($arr);




   }
   public function api_login()
   {
   $http = new Http();
   $capsule = new Capsule;
   $http->cors();

   $Auth = new Auth();
  // $Auth->login('rppt','tooy');



   $postdata = file_get_contents("php://input");
               $request = json_decode($postdata);
               $email = $request->email;
               $pass = $request->password;

   $logged =   $Auth->login($email,$pass);
//   $user = $capsule::table('users')->where('email ','=',$email)->get();

   $arr = array(
     'logged' => $logged,
  //   'id' => $user->id,
     'email' => $email,
     'password' => $pass
   );


   echo json_encode($arr);




   }
   public function login()
   {

      $Auth = new Auth();

    //$Auth->login('rppt','tooy');
    //  $Auth->loginform('login','','');
    //var_dump($Auth);
      $this->view('users/login');
   }




}
 ?>
