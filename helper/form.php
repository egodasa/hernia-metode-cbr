<?php
	function formInput($type, $nama, $name, $max = "100", $value = "")
	{	
		$hasil = array("<div class='form-group'>");
		$hasil[] = "<div class='form-label-group'>";
		$hasil[] = "<label>$nama</label>";
		switch($type)
		{
			case "text":
			case "number":
			case "email":
			case "password":
			case "date":
				$hasil[] = "<input type='$type' name='$name' class='form-control' min='0' max='$max' value='$value' />";
			break;
			case "hidden":
				$hasil = array("<input type='$type' name='$name' value='$value' />");
				return implode("", $hasil);
			break;
			case "textarea":
				$hasil[] = "<textarea name='$name' class='form-control'>$value</textarea>";
			break;
			case "checkbox":
			case "radio":
				$hasil = array("<input type='$type' name='$name' value='$value' /> $nama");
				return implode("", $hasil);
			break;
		}
		$hasil[] = "</div></div>";
		return implode("", $hasil);
	}

	function formSelect($nama, $name, $captionMember, $valueMember, $options, $value = '')
	{	
		$hasil = array("<div class='form-group'>");
		$hasil[] = "<label>$nama</label>";
		$hasil[] = "<select name='$name' class='form-control'>";
		foreach($options as $data)
		{
			$hasil[] = "<option value='".$data[$captionMember]."'>".$data[$valueMember]."</option>";
		}
		$hasil[] = "</select>";
		if(!empty($value))
		{
			$hasil[] = "<script>";
			$hasil[] = "document.getElementsByName('$name')[0].value = '$value'";
			$hasil[] = "</script>";
		}
		$hasil[] = "</div>";

		return implode("", $hasil);
	}

	function formButton($type, $text, $class)
	{
		return "<button class='$class' type='$type'>$text</button>";
	}

	function alert($type, $title, $message)
	{
		
	}
?>