/*comment*/
<?php
echo"Hi Evan";
Echo"<br>";
echo"Hi Evan2";
ecHo"<br>";
ECHO"Hi Evan3";
echo"<br>";
echo"<br>";

echo"Hi Evan";
echo"<br>";
echo print("Hi Evan2");
echo"<br>";
echo"<br>";

$x=20;
$y="45";
echo $x+$y;
echo"<br>";
echo"<br>";

$myNum =$arrayName = array(40,60,80,90,62);

echo $myNum[0];
echo "<br>";
print_r($myNum);
echo "<br>";

echo"<pre>";
print_r($myNum);
echo"</pre>";
echo "<br>";
echo "<br>";

$myArr = array('Evan' =>39 , "Sambugaro"=>29, "Amalan"=>56);
echo"<pre>";
print_r($myArr);
echo"<pre>";
echo "<br>";
echo "<br>";

foreach ($myArr as $Name => $Age) 
{
    echo $Name .'&nbsp;&nbsp;'  .$Age."<br>";
}
echo "<br>";
echo "<br>";

echo "<br>";
$price=50;
echo "$". $price;
echo "<br>";
echo "<br>";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <div class="container">
        <h2> Basic Table </h2>
        <table class="table">
            <head>
                <tr>
                    <th>NAME</th>
                    <th>AGE</th>
                    <th>Action</th>
                </tr>
            </head>
            <tbody>
                <tr>
                    <td>Evan</td>
                    <td>39</td>
                </tr>
                <tr>
                    <td>Evan1</td>
                    <td>390</td>
                </tr>
            </tbody>
            <tbody>
                <?php
                foreach ($myArr as $name => $age )
                {  ?>

                    <tr>
                    <td> <?php echo $name; ?> </td>
                    <td> <?php echo $age; ?> </td>
                    <td>
                        <button type="button" class="btn btn-success btn-sm">Read</button>
                        <button type="button" class="btn btn-warning btn-sm">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                    </td>


                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

 

    </div>

 

</body>
</html>