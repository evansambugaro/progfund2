<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        .Error {color: #FF0000;}
    </style>
    <title>PDO: Create a Record</title>
</head>
<body>
    <!-- container -->
<div class="container">
    <div class="page-header">
        <h1>Student Information</h1>
    </div>

    <?php
    $Fname="";
    $FnameErr="";
    $Lname="";
    $LnameErr="";
    $Email="";
    $EmailErr="";
    $Phone="";
    $PhoneErr="";
    $isFnameValid="false";
    $isLnameValid="false";

    if ($_SERVER['REQUEST_METHOD']=="POST")
    {
        // Validate empty or less than 6 characters
        if(empty($_POST['fname']))
        {
            $FnameErr="First Name is required";
        }
        else
        {
            // check if name only contains letters and whitespace
            //Regular Expressions
            $Fname= sanitize_input($_POST['fname']);
            // check if name only contains letters and whitespace

            if(!preg_match("/^[a-zA-Z-' ]*$/", $Fname))
            {
                $FnameErr="Only letters and white space allowed";
                $isNameValid= false;
            }
            else
            {
                $isNameValid= true;
            }

        }

         if(empty($_POST['lname']))
        {
            $LnameErr="Last Name is required";
        }
        else
        {
            // check if name only contains letters and whitespace
            //Regular Expressions
            $Lname= sanitize_input($_POST['lname']);
            // check if name only contains letters and whitespace

            if(!preg_match("/^[a-zA-Z-' ]*$/", $Lname))
            {
                $LnameErr="Only letters and white space allowed";
                $isNameValid= false;
            }
            else
            {
                $isNameValid= true;
            }

        }


    
        // Validate empty or less than 6 characters
        // Validate Lname
        if(empty($_POST['lname']))
        {
            $LnameErr="Last Name is required";
        }
        else
        {
            // check if name only contains letters and whitespace
            //Regular Expressions
            $Lname= sanitize_input($_POST['lname']);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $Lname))
            {
                $LnameErr="Only letters and white space allowed";
            }
        }



        // Validate empty or less than 6 characters
        // Validate Email
        if(empty($_POST['email']))
        {
            $EmailErr="Email is required";
        }
        else
        {
            // check if name only contains letters and whitespace
            //Regular Expressions
            $Email= sanitize_input($_POST['email']);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $Email))
            {
                $EmailErr="Only letters and white space allowed";
            }
        }
        
        // Validate empty or less than 6 characters
        // Validate Email
        if(empty($_POST['phone']))
        {
            $PhoneErr="Phone is required";
        }
        else
        {
            // check if name only contains letters and whitespace
            //Regular Expressions
            $Phone= sanitize_input($_POST['phone']);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $Phone))
            {
                $PhoneErr="Only letters and white space allowed";
            }
        }
    }



    function sanitize_input ($data)
    {
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;

    }

    if($isFnameValid && $isLnameValid)
    {

    }    
        // include database connection
        include"config/database.php";

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <table class="table table-hover table-responsive table-bordered">
            <tr>
                <td>First Name</td>
                <td>
                    <input type="text" name="fname" class="form-control" value="<?php echo $Fname; ?>">
                    <span class="Error"><?php echo $FnameErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>
                    <input type="text" name="lname" class="form-control" value="<?php echo $Lname; ?>">
                    <span class="Error"><?php echo $LnameErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Student Email</td>
                <td>
                    <input type="text" name="email" class="form-control">
                    <span class="Error"><?php echo $EmailErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Student Phone</td>
                <td>
                    <input type="text" name="phone" class="form-control">
                    <span class="Error"><?php echo $PhoneErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                <input type="submit" value="save" class="btn btn-primary">
                <a href="index.php" class="btn btn-danger">Go Back</a>
                </td>
            </tr>
        </table>
    </form>
</div>
<!-- End of container -->
</body>
</html>