<?php /**
 *
 */
class Html
{

  public function __construct()
  {

  }
  public static function css($link)
  {
  return '<link rel="stylesheet" charset="utf-8" href="' .CSS.$link . '" >';
  }

  public static function script($src)
  {
    # code...
    return '<script src="' .JS.$src . '" ></script>';
  }
  public static function image($src, $attributes = '') {
		if (isset($attributes) && !empty($attributes)) {
			$attributes = self::parse_attr($attributes);
		}
		$border = (isset($attributes['border']) && !empty($attributes['border'])) ? $attributes['border'] . ' ' : 'border="0" ';
		$alt = (isset($attributes['alt']) && !empty($attributes['alt'])) ? $attributes['alt'] . ' ' : 'alt="" ';
		return '<img src="' .IMG.$src . '"' . $attributes . ' ' . $border . $alt . '/>';
	}


  public static function email($email, $label = null, $attributes = null)	{
		$label = (!empty($label)) ? $label : $email;
		if (isset($attributes) && !empty($attributes)) {
			$attributes = self::parse_attr($attributes);
		}
		$html = '<a href="mailto:' . $email . '"' . $attributes . '>' . $label . '</a>';
		return $html;
	}



  private static function parse_attr($attributes) {
		if (is_string($attributes)) {
			return (!empty($attributes)) ? ' ' . trim($attributes) : '';
		}
		if (is_array($attributes)) {
			$attr = '';
			foreach ($attributes as $key => $val) {
				$attr .= ' ' . $key . '="' . $val . '"';
			}
			return $attr;
		}
	}
	/**
	 * ONLY FOR THIS CLASS (self)
	 * HTML::parse_fields($fields) -> Parse the $fields array and transform into a valid HTML input
	 *
	 * @static
	 * @access private
	 * @param  array $fields An array with the following structure -> 'Type' => array($attributes)
	 * @return string The parsed input HTML
	 */
	private static function parse_fields($fields) {
		if (is_array($fields)) {
			$field = '';
			foreach ($fields as $key => $val) {
				$attributes = self::parse_attr($val);
				$field .= '<input type="' . $key .'"' . $attributes . ' />' . PHP_EOL;
			}
			return $field;
		}
	}

}
 ?>
