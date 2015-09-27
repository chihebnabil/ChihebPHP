<?php /**
 *
 */
class Form
{


  public static function Form($action, $fields, $name = null, $method = 'post', $enctype = 'multipart/form-data') {
		$name = (isset($name) && !empty($name)) ? ' name="' . $name . '"' : null;
		$method = (isset($method)) ? ' method="' . $method . '"': null;
		$enctype = (isset($enctype)) ? ' enctype="' . $enctype . '"': null;
		$html = '<form action="' . $action . '"' . $name . $method . $enctype . '>' . PHP_EOL;
		$html .= self::parse_fields($fields);
		$html .= '</form>' . PHP_EOL;
		return $html;
	}

  public function input()
  {
    # code...
  }
  public function submit()
  {
    # code...
  }
}
 ?>
