<?php 

// Store the unit of each length
$toLenth = [
    'meter' => 1,
    'kilometer' => 1000,
    'centimeter' => 0.01,
    'millimeter' => 0.001,
    'inch' => 0.0254,
    'foot' => 0.3048,
    'yard' => 0.9144,
    'mile' => 1609.34
];

$convertValue = null;
$error = [];
// if form is submitted
if(isset($_POST['submit'])){



// Store value given by user
$length = $_POST['length'];
$input_value = $_POST['input_value'];
$convert_length = $_POST['Convert_length'];

// Check given unit and convert unit are not same
if($length !== $convert_length){

    //Convert input value to selected unit
    $inputLength = $input_value * $toLenth[$length];

    //Convert input unit value 
    $convertValue = $inputLength / $toLenth[$convert_length];


}else if(empty($input_value)){
    $error = ['error' => 'Kindly Enter Value'];

}else{
    $error = ['error' => 'Kindly Select different Convert Length'];
}

}





?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lenth Unit Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="title p-3">
            <h2>Unit Converter</h2>
        </div>
        <div class="my-3">
            <?php 
            // show error if input length and convert length are same
            if(is_array($error) && count($error) > 0){
            
            ?>
            <h4 class="text-danger"><?= $error['error'] ?></h4>
            <?php } ?>
        </div>
        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Select Length</label>
                <select name="length" id="" class="form-select">
                    <option value="millimeter">Milimeter</option>
                    <option value="centimeter">Centimeter</option>
                    <option value="meter">Meter</option>
                    <option value="kilometer">Kilometer</option>
                    <option value="inch">Inch</option>
                    <option value="foot">Foot</option>
                    <option value="yard">Yard</option>
                    <option value="mile">Mile</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Enter Value</label>
                <input type="number" name="input_value" id="" class="form-control" placeholder="Enter Value">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Select Length</label>
                <select name="Convert_length" id="" class="form-select">
                    <option value="millimeter">Milimeter</option>
                    <option value="centimeter">Centimeter</option>
                    <option value="meter">Meter</option>
                    <option value="kilometer">Kilometer</option>
                    <option value="inch">Inch</option>
                    <option value="foot">Foot</option>
                    <option value="yard">Yard</option>
                    <option value="mile">Mile</option>
                </select>
            </div>

            

            <div class="d-grid">
                <input type="submit" value="Submit" name="submit" class="btn btn-warning">
            </div>
        </form>

        <div class="my-3">
            <?php 
            
            // if result exist
            if(!empty($convertValue) && $convertValue !== null){
            
            ?>
            <h3>Result:  <?= number_format( $convertValue,2 ). " ". $convert_length?> </h3>
            <?php } ?>
        </div>
    </div>
</body>
</html>