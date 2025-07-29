<?php 

// Store the all weight length value
$toWeight = [
    'kilogram' => 1,
    'gram' => 0.001,
    'miligram' => 0.000001,
    'metric_ton' => 1000,
    'pound' => 0.453592,
    'ounce' => 0.0283495,
    'stone' => 6.35029
];

// Intialize empty array to show error
$error = [];
// Intialize null value
$converted_length_value = null;

// Check submit button is clicked
if(isset($_POST['submit'])){

    // Store the weight given by input
    $weight_length = $_POST['weight_length'];
    $input_value = (float) $_POST['weight_value'];
    $convert_weight_length = $_POST['convert_length'];

    // Check input length and convert weight unit not same
    if($weight_length !== $convert_weight_length){


    // Convert input value into weight length
    $input_length_value = $input_value * $toWeight[$weight_length];

    // Convert weight length
    $converted_length_value = $input_length_value / $toWeight[$convert_weight_length];

    }else if(empty($input_value)){
        $error = ['error' => 'Kindly fill the value'];
    }else{
        $error = ['error' => 'Kindly Select Different Weight Unit'];
    }

}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="title p-3">
            <h2>Weight Converter</h2>
        </div>

        <div class="mb-3">
            <h4 class="text-danger">
                <?php 
                
                // Show error
                if(is_array($error) && count($error) > 0){
                    echo $error['error'];
                }
                
                ?>
            </h4>
        </div>

        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Select Weight Unit</label>
                <select name="weight_length" id="" class="form-select">
                    <option value="miligram">Miligram</option>
                    <option value="gram">Gram</option>
                    <option value="kilogram">Kilogram</option>
                    <option value="ounce">Ounce</option>
                    <option value="pound">Pound</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Enter Value</label>
                <input type="number" name="weight_value" id="" class="form-control" placeholder="Enter Value">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Convert Length Unit</label>
                <select name="convert_length" id="" class="form-select">
                    <option value="miligram">Miligram</option>
                    <option value="gram">Gram</option>
                    <option value="kilogram">Kilogram</option>
                    <option value="ounce">Ounce</option>
                    <option value="pound">Pound</option>
                </select>
            </div>

          

            <div class="d-grid">
                <input type="submit" value="Submit" name="submit" class="btn btn-primary">
            </div>
        </form>

        
        <div class=" my-2 d-flex justify-content-between gap-3">
            <div class="col-6 d-grid">

                <a href="lengthConverter.php" class="btn btn-warning">Length Converter</a>
            </div>

            <div class="col-6 d-grid">

                <a href="temperatureConverter.php" class="btn btn-secondary">Temperature Converter</a>
            </div>
        </div>

        
            <div class="my-3">
                 <?php 
                     // Show result
                     if(!empty($converted_length_value) && $converted_length_value !== null ){ ?>
                <h3>Result: <span class="text-primary">
                    <?php
                   
                        echo number_format($converted_length_value,2);
                     }

                    
                    ?>
                </span></h3>
            </div>

    </div>
</body>
</html>