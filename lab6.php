<?php 
require_once 'inc/ctec_functions.php';




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
$error=array();
// Function 2 test
if(is_get_request()){
    echo '<p>2.  get request is working</p>';
}

// Function 1 test
if(is_post_request()){$var = is_post_request();
$num = $_POST['num'];
echo "<p>1.  post request is working</p> <br>";
// Function 3 test
$var2 = h($_POST['name']);
echo "<p>3.  output of the function for htmlspecialchars is: <b>" . $var2 . '</b></p>';
// Function 4 test
$var = u($_POST['name']);
echo "<p>4.  output of the function for urlencode is: <b>" . $var . '</b></p>';
// Function 5 test
$var = raw_u($_POST['name']);
echo "<p>5.  output of the function for rawurlencode is: <b>" . $var . '</b></p>' ;
// Function 6 test
if(is_blank($_POST['name'])){
echo '6.  value is blank';
}
// Function 7 test
if(has_presence($_POST['name'])){
    echo '7.  value has presence';
}
// Function 8 test
if(has_length_greater_than($_POST['name'], $num)){

    echo "<p>8.  the string " .$_POST['name'] . "length is greater than $num</p>";
}
else{
    echo "<p>8.  the string " .$_POST['name'] . "length is not greater than $num</p>";
}

// Function 9 test
if(has_length_less_than($_POST['name'], $num)){

    echo "<p>9.  the string " . $_POST['name'] . "length is less than $num</p>";
}
else{
    echo "<p>9.  the string " . $_POST['name'] . "length is not less  than $num</p>";
}
//function 10 test
if(has_length_exactly($_POST['name'], $num)){

    echo "<p>10. the string " .$_POST['name'] . "length is greater than $num</p>";
}
else{
    echo "<p>10. the string " .$_POST['name'] . "length is not greater than $num</p>";
}
// Function 11 test
if(has_length($_POST['name'], ['min' => 1, 'max' => 6])){
echo "<p>11. the value " . $_POST['name'] . "length is inbetween 1 and 6</p>";
}
else{
    echo "<p>11. the string " . $_POST['name'] . "length is not inbetween 1 and 6</p>";
}
// Function 12 test
if (has_inclusion_of( $num, [1,3,5,7,9] )) {
    echo "<p>12. the number " . $num . " is included in the array</p>";
}
// Function 13 test
if (has_exclusion_of( $num, [1,3,5,7,9] )) {
    echo "<p>13. the number " . $num . " is excluded in the array</p>";
}
// Function 14 test
if (has_string($_POST['email'], '.com')) {
    echo "14. the email has a .com in it";
}
else{
    array_push($error,"<p> .com is required.</p>");

}
// Function 15 test
if (has_valid_email_format($_POST['email'])) {
    echo "15. email is valid";
}
else{
    array_push($error,"<p>A Valid email is required.</p>");

}
// Function 16 test
echo "16. ";
echo display_errors($error);
}
 
?>
<div class="container">
    <p>To use this error checker input values into the form below then hit submit<br></p>
<form action="lab6.php" method="post"><label for="number">Number<br>
<input type="number" name="num" id="num value="<?php echo (isset($value) ? $value: '');?>"">
</label><br>
<label for="name">Name<br>
<input type="text" name="name" id="name value="<?php echo (isset($value) ? $value: '');?>"">
</label><br>
<label for="email"> Email<br>
<input type="text" name="email" id="email" value="<?php echo (isset($value) ? $value: '');?>">
</label><br>
<button type="submit">submit</button>
</form>
</div>
<a href="lab6.php?stuff=yes">click to test get request </a>

</body>
</html>