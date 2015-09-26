<?php /**
 *
 */
 use  Illuminate\Database\Eloquent\Model as Eloquent;


class User extends Eloquent
{
  public $name;
  protected $table = 'users';
  protected $fillable = ['username','email'];


  function __construct()
  {

  }



}
 ?>
