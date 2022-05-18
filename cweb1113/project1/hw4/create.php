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
        <h1>Contacts</h1>
    </div>

    <?php
    $Name="";
    $NameErr="";

    $Email="";
    $EmailErr="";

    $Phone="";
    $PhoneErr="";

    $Title="";
    $TitleErr="";

    $Createddate="";
    $CreateddateErr="";

    $Modifieddate="";
    $ModifieddateErr="";

    $isNameValid="false";
    $isEmailValid="false";
    $isPhoneValid="false";
    $isTitleValid="false";
    $isCreateddateValid="false";
    $isModifieddateValid="false";
    
    if ($_SERVER['REQUEST_METHOD']=="POST")
    {
        // Validate empty or less than 6 characters
        if(empty($_POST['name']))
        {
            $NameErr="First and Last Name is required";
        }
        else
        {
            // check if name only contains letters and whitespace
            //Regular Expressions
            $Name= sanitize_input($_POST['name']);
            // check if name only contains letters and whitespace

           if(!preg_match("/^[a-zA-Z-' ]*$/", $Name))
            {
                $NameErr="Only letters and white space allowed";
                $isNameValid= false;
            }
            else
            {
                $isNameValid= true;
            }

        }

         if(empty($_POST['email']))
        {
            $EmailErr="Email is required";
        }
        else
        {
            // check if name only contains letters and whitespace
            //Regular Expressions
            $Email= sanitize_input($_POST['email']);
            // check if name only contains letters and whitespace

            if(!preg_match("/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)*(\.[a-zA-Z]{2,3})$/", $Email))
            {
                $EmailErr="Only letters and white space allowed";
                $isEmailValid= false;
            }
            else
            {
                $isEmailValid= true;
            }

        }


    
        // Validate empty or less than 6 characters
        // Validate Lname
        if(empty($_POST['phone']))
        {
            $PhoneErr="Phone Number is required";
        }
        else
        {
            // check if name only contains letters and whitespace
            //Regular Expressions
            $Phone= sanitize_input($_POST['phone']);
            if(!preg_match("/^[0-9]*$/", $Phone))
            {
                $PhoneErr="Only numbers and white space allowed";
                $isPhoneValid= false;
            }
            else
            {
                $isPhoneValid= true;
            }
        }



        // Validate empty or less than 6 characters
        // Validate Email
        if(empty($_POST['title']))
        {
            $TitleErr="Title is required";
        }
        else
        {
            // check if name only contains letters and whitespace
            //Regular Expressions
            $Title= sanitize_input($_POST['title']);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $Title))
            {
                $TitleErr="Only letters and white space allowed";
                $isTitleValid= false;
            }
            else
            {
                $isTitleValid= true;
            }
                
        }
        
        // Validate empty or less than 6 characters
        // Validate Email
        if(empty($_POST['createddate']))
        {
            $CreateddateErr="Created Date is required";
        }
        else
        {
            // check if name only contains letters and whitespace
            //Regular Expressions
            $Createddate= sanitize_input($_POST['createddate']);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $Createddate))
            {
                $CreateddateErr="Only letters and white space allowed";
                $isCreateddateValid= false;
            }
            else
            {
                $isCreateddateValid= true;
            }
        }

        if(empty($_POST['modifieddate']))
        {
            $ModifieddateErr="Modified Date is required";
        }
        else
        {
            // check if name only contains letters and whitespace
            //Regular Expressions
            $Modifieddate= sanitize_input($_POST['modifieddate']);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $Modifieddate))
            {
                $ModifieddateErr="Only letters and white space allowed";
                $isModifieddateValid= false;
            }
            else
            {
                $isModifieddateValid= true;
            }
        }



        if($isNameValid && $isEmailValid && $isPhoneValid && $isTitleValid && $isCreateddateValid && $isModifieddateValid)
        {
              try 

            {
                include"config/database.php";
            // insert query
            $query="INSERT INTO contacts SET Id =:id, Name =:name, Email=:email, Phone=:phone, Title=:title";

            // prepare query for execution
            $stmt=$con->prepare($query);

           
            $name=htmlspecialchars(strip_tags($_POST['name']));
            $email=htmlspecialchars(strip_tags($_POST['email']));
            $phone=htmlspecialchars(strip_tags($_POST['phone']));
            $title=htmlspecialchars(strip_tags($_POST['title']));

            //bind the parameters
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':phone',$phone);
            $stmt->bindParam(':title',$title);

            //Execute the query
            if($stmt->execute())
            {
                    echo '<div class="alert alert-success" role="alert"> Record saved successfully. </div>';
            }
            else
            {
                    echo  '<div class="alert alert-warning" role="alert"> Warning record was NOT saved. </div>';
            }



        }
        catch(PDOException $e)
        {
            echo"Error".$e->getMessage();
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

    if($isNameValid && $isEmailValid)
    {

    }    

    $date = new DateTime('2000-01-01');
    //echo $date->format('Y-m-d H:i:s');


        // include database connection
        include"config/database.php";
    
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <table class="table table-hover table-responsive table-bordered">
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" class="form-control" value="<?php echo $Name; ?>">
                    <span class="Error"><?php echo $NameErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email" class="form-control" value="<?php echo $Email; ?>">
                    <span class="Error"><?php echo $EmailErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>
                    <input type="text" name="phone" class="form-control">
                    <span class="Error"><?php echo $PhoneErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Title</td>
                <td>
                    <input type="text" name="title" class="form-control">
                    <span class="Error"><?php echo $TitleErr ; ?></span>
                </td>
            </tr>
            <!--<tr>
                <td>Created Date</td>
                <td>
                    <input type="text" name="createddate" class="form-control">
                    <span class="Error"><?php echo $CreateddateErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Modified Date</td>
                <td>
                    <input type="text" name="modifieddate" class="form-control">
                    <span class="Error"><?php echo $ModifieddateErr ; ?></span>
                </td>
            </tr>-->
            <tr>
                <td></td>
                <td>
                <input type="submit" value="save" class="btn btn-primary">
                <a href="index.php" class="btn btn-danger">Go Back</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>