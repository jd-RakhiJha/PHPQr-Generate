<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>QR code Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

   <style>
    body{
        margin: 0;
        background-color: #ecfab6;
    }
    </style>
</head>
<body>
     <div class="container py-3">

     <div class="row">
       <div class="col-md-12">

 <div class="row justify-content-center">
   <div class="col-md-6">
<!--- form user info--->
    <div class="card card-outline-secondary">
        <div class="card-header">
            <h3 class="mb-0">User Information</h3>
        </div>
     <?php

$first_name = "Rakhi ";
$last_name = "Jha";
$email = "rakhi@gmail.com";
$company = "google";
$website = "http://www.google.com";

if(isset($_POST['btnsubmit'])){
   $first_name = $_POST["first_name"];
   $last_name = $_POST["last_name"];
   $email = $_POST["email"];
   $company = $_POST["company"];
   $website = $_POST["website"]; 
}

?>
        <div class="card-body"></div>
<form autocomplete="off" class="form" role="form" action="index.php" method="post">
<div class="form-group row">
    <label class="col-lg-3 col-form-label form-control-label">First name</label>
   <div class="col-lg-9">
    <input class="form-control" type="text" value="<?php echo $first_name;?>" name="first_name">

   </div>
 </div>

 <div class="form-group row">
    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
   <div class="col-lg-9">
    <input class="form-control" type="text" value="<?php echo $last_name;?> " name="last_name">
   </div>
 </div>

 <div class="form-group row">
    <label class="col-lg-3 col-form-label form-control-label">Email</label>
   <div class="col-lg-9">
    <input class="form-control" type="email" value="<?php echo $email;?>" name="email">
   </div>
 </div>

 <div class="form-group row">
    <label class="col-lg-3 col-form-label form-control-label">Company</label>
   <div class="col-lg-9">
    <input class="form-control" type="text" value="<?php echo $company;?>" name="company">
   </div>
 </div>

 <div class="form-group row">
    <label class="col-lg-3 col-form-label form-control-label">Website</label>
   <div class="col-lg-9">
    <input class="form-control" type="url" value="<?php echo $website;?>" name="website">
   </div>
 </div>

 <div class="form-group row">
    <label class="col-lg-3 col-form-label form-control-label"></label>
   <div class="col-lg-9">
    <input class="btn btn-primary" type="submit"  name="btnsubmit" value="Genrated QR Code">
   </div>
   </div>
 </form>

 <?php
include("phpqrcode/qrlib.php");

// Corrected variable name for the temporary directory
$PNG_TEMP_DIR = 'temp/';

// Check if the directory exists, and create it if it doesn't
if (!file_exists($PNG_TEMP_DIR)) {
    mkdir($PNG_TEMP_DIR, 0755, true);
}

// Initial filename
$filename = $PNG_TEMP_DIR . 'test.png';

// Check if the form has been submitted
if (isset($_POST["btnsubmit"])) {

    // Build the string to be encoded in the QR code
    $codeString = $_POST["first_name"] . "\n";
    $codeString .= $_POST["last_name"] . "\n";
    $codeString .= $_POST["email"] . "\n";
    $codeString .= $_POST['company'] . "\n";
    $codeString .= $_POST['website'] . "\n";

    // Generate a unique filename based on the content
    $filename = $PNG_TEMP_DIR . 'test_' . md5($codeString) . '.png';

    // Generate the QR code and save it to the file
    QRcode::png($codeString, $filename);

    // Display the generated QR code
    echo '<img src="' . $filename . '" /> <hr />';
}
?>


  </div>
  <!--/form user info--->
  </div>

 </div>       
    
 </div>
    </div>
     </div>

</body>

</head>

</html>


