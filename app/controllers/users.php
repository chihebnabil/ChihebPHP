<?php /**
 *
 */




class Users extends Controller
{

   public function register()
   {
     # code...






      $this->view('users/register');
   }
   public function login()
   {
     # code...
      $Auth = new Auth();

    //$Auth->login('rppt','tooy');
    //  $Auth->loginform('login','','');
    //var_dump($Auth);
      $this->view('users/login');
   }




}
 ?>
