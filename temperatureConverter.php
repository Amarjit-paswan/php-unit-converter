<?php 

$result = '';
// Check form is submitted
if(isset($_POST['submit'])){

    // Store the input value
    $temperature_unit = $_POST['temperture_unit'];
    $temperature_value = $_POST['temperture_value'];
    $converted_temparture_unit = $_POST['convert_temperture_unit'];

  function convertTemperature($value, $from, $to) {
    // Convert input to Celsius first
    switch($from) {
        case 'celsius':
            $celsius = $value;
            break;
        case 'fahrenheit':
            $celsius = ($value - 32) * 5/9;
            break;
        case 'kelvin':
            $celsius = $value - 273.15;
            break;
        case 'rankine':
            $celsius = ($value - 491.67) * 5/9;
            break;
        case 'reaumur':
            $celsius = $value * 5/4;
            break;
        default:
            return "Invalid 'from' unit.";
    }

    // Convert Celsius to target unit
    switch($to) {
        case 'celsius':
            return round($celsius, 2);
        case 'fahrenheit':
            return round(($celsius * 9/5) + 32, 2);
        case 'kelvin':
            return round($celsius + 273.15, 2);
        case 'rankine':
            return round(($celsius + 273.15) * 9/5, 2);
        case 'reaumur':
            return round($celsius * 4/5, 2);
        default:
            return "Invalid 'to' unit.";
    }
}

$result = convertTemperature($temperature_value,$temperature_unit,$converted_temparture_unit);

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="title my-3">
            <h2>Temperture Converter</h2>
        </div>

        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Selct Temperture Unit</label>
                <select name="temperture_unit" id="" class="form-select">
                    <option value="celsius">Celsius</option>
                    <option value="fahrenheit">Fahrenheit</option>
                    <option value="kelvin">Kelvin</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Enter Value</label>
                <input type="number" name="temperture_value" id="" class="form-control" placeholder="Enter Value">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Convert Temperature</label>
                 <select name="convert_temperture_unit" id="" class="form-select">
                    <option value="celsius">Celsius</option>
                    <option value="fahrenheit">Fahrenheit</option>
                    <option value="kelvin">Kelvin</option>
                </select>
            </div>

            <div class="d-grid">
                <input type="submit" value="Submit" name="submit" class="btn btn-danger">
            </div>
        </form>

        <div class=" my-2 d-flex justify-content-between gap-3">
            <div class="col-6 d-grid">

                <a href="lengthConverter.php" class="btn btn-primary">Length Converter</a>
            </div>

            <div class="col-6 d-grid">

                <a href="weightConverter.php" class="btn btn-secondary">Weigth Converter</a>
            </div>
        </div>

        <?php if($result !== ''): ?>
            <div class="alert alert-success mt-3">
                <strong>Converted Value:</strong> <?= $result ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>