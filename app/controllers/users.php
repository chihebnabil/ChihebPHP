<?php /**
 *
 */
use Nette\Mail\Message;





class Users extends Controller
{

   public function register()
   {
     # code...






      $this->view('users/register');
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
