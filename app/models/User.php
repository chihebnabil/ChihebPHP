<?php /**
 *
 */
 use  Illuminate\Database\Eloquent\Model as Eloquent;


class User extends Eloquent
{


  public $name;
  protected $table = 'users';
  public $timestamps = [];
  protected $fillable = ['username','email'];


  function __construct()
  {

  }



}
 ?>
