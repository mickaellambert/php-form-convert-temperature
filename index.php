<?php

define('MAX_KELVIN', 373.15);

if (!empty($_POST['temperature']) && is_numeric($_POST['temperature'])) {
    $kelvin = floatval($_POST['temperature']);
        
    if ($kelvin >= 0 && $kelvin <= MAX_KELVIN) {
        echo $kelvin - 273.15;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Mon form</title>
</head>

<body>
	<form method="post" id="myForm">
		<label for="temperature">Température</label>
		<input type="number" id="temperature" name="temperature" min="0" max="<?php echo MAX_KELVIN; ?>" step="0.01">

		<button form="myForm">Envoyer</button>
	</form>
</body>

</html>