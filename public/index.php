<?php

define('MIN_VALUE_MEASURE', -459.67);
define('MEASURE_CELSIUS_VALUE', 'celsius');
define('MEASURE_FAHRENHEIT_VALUE', 'fahrenheit');
define('MEASURE_KELVIN_VALUE', 'kelvin');
define('MEASURES_VALUE', [MEASURE_CELSIUS_VALUE, MEASURE_FAHRENHEIT_VALUE, MEASURE_KELVIN_VALUE]);

$firstMeasure  = empty($_POST['first-measure']) ? '' : $_POST['first-measure'];
$secondMeasure = empty($_POST['second-measure']) ? '' : $_POST['second-measure'];
$temperature   = empty($_POST['temperature']) ? '' : $_POST['temperature'];

if (in_array($firstMeasure, MEASURES_VALUE) 
    && in_array($secondMeasure, MEASURES_VALUE)
    && $firstMeasure != $secondMeasure
    && $firstMeasure > MIN_VALUE_MEASURE
    && is_numeric($temperature)) {
    if ($firstMeasure === MEASURE_CELSIUS_VALUE && $secondMeasure === MEASURE_FAHRENHEIT_VALUE) {
        $result = ($temperature * 1.8) + 32;
    } elseif ($firstMeasure === MEASURE_FAHRENHEIT_VALUE && $secondMeasure === MEASURE_CELSIUS_VALUE) {
        $result = ($temperature - 32) / 1.8;
    } elseif ($firstMeasure === MEASURE_CELSIUS_VALUE && $secondMeasure === MEASURE_KELVIN_VALUE) {
        $result = $temperature + 273.15;
    } elseif ($firstMeasure === MEASURE_KELVIN_VALUE && $secondMeasure === MEASURE_CELSIUS_VALUE) {
        $result = $temperature - 273.15;
    } elseif ($firstMeasure === MEASURE_FAHRENHEIT_VALUE && $secondMeasure === MEASURE_KELVIN_VALUE) {
        $result = ($temperature + 459.67) / 1.8;
    } elseif ($firstMeasure === MEASURE_KELVIN_VALUE && $secondMeasure === MEASURE_FAHRENHEIT_VALUE) {
        $result = ($temperature * 1.8) - 459.67;
    }

    echo "MON RESULTAT : " . $result . "<br><br><br>";
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Mon form</title>
</head>

<body>
	<form method="post" id="form-convert-temperature">

        <input type="number" id="temperature" name="temperature" min="-459.67" step="0.01" required value="<?php echo $temperature; ?>">

        <select name="first-measure">
            <option value="<?php echo MEASURE_CELSIUS_VALUE; ?>" <?php echo $firstMeasure === MEASURE_CELSIUS_VALUE ? 'selected' : '' ?>><?php echo ucfirst(MEASURE_CELSIUS_VALUE);?></option>
            <option value="<?php echo MEASURE_FAHRENHEIT_VALUE; ?>" <?php echo $firstMeasure === MEASURE_FAHRENHEIT_VALUE ? 'selected' : '' ?>><?php echo ucfirst(MEASURE_FAHRENHEIT_VALUE);?></option>
            <option value="<?php echo MEASURE_KELVIN_VALUE; ?>" <?php echo $firstMeasure === MEASURE_KELVIN_VALUE ? 'selected' : '' ?>><?php echo ucfirst(MEASURE_KELVIN_VALUE);?></option>
        </select>

        <span> Vers </span>

        <select name="second-measure">
            <option value="<?php echo MEASURE_CELSIUS_VALUE; ?>" <?php echo $secondMeasure === MEASURE_CELSIUS_VALUE ? 'selected' : '' ?>><?php echo ucfirst(MEASURE_CELSIUS_VALUE);?></option>
            <option value="<?php echo MEASURE_FAHRENHEIT_VALUE; ?>" <?php echo $secondMeasure === MEASURE_FAHRENHEIT_VALUE ? 'selected' : '' ?>><?php echo ucfirst(MEASURE_FAHRENHEIT_VALUE);?></option>
            <option value="<?php echo MEASURE_KELVIN_VALUE; ?>" <?php echo $secondMeasure === MEASURE_KELVIN_VALUE ? 'selected' : '' ?>><?php echo ucfirst(MEASURE_KELVIN_VALUE);?></option>
        </select>

		<button form="form-convert-temperature">Envoyer</button>
	</form>
</body>

</html>