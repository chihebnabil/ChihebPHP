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
   $http->cors();

   $Auth = new Auth();
  // $Auth->login('rppt','tooy');



   $postdata = file_get_contents("php://input");
               $request = json_decode($postdata);
               $email = $request->email;
               $pass = $request->password;

   $logged =   $Auth->login($username,$pass);
   $arr = array(
     'logged' => $logged,
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
