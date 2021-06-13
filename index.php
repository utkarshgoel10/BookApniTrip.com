            <?php
            $insert= false;
            if (isset($_POST['name'])){

                //Connection Variables
                $server= "localhost";
                $username="root";
                $password="";

                //Create a database connection
                $con = mysqli_connect($server,$username,$password);

                //Check for Connection success
                if(!$con){
                    die("Connection to this database failed due to".mysqli_connect_error());
                }

                //Collect Post var
                $name = $_POST['name'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $phone = $_POST['phone'];
                $desc = $_POST['desc'];

                $sql= " INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `date`) 
                VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp()); ";


                //Execute query

                if($con->query($sql)==true){
                    // echo "Successfully inserted";
                    $insert= true;

                }
                else{
                    echo "Error: $sql <br> $con->error";
                }


                //Close connection
                $con-> close();

            }
            ?>


            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
                <title>BookApniTrip.com</title>
                <link rel="stylesheet" href="styles.css">
            </head>
            <body>
                <img class="bg" src="jonatan-pie-OPOg0fz5uIs-unsplash.jpg" alt="Travel" style="opacity: 0.9;">
                <div class="container">
                    <h1>Welcome to BookApniTrip.com</h1>
                    <p>Enter your Details to confirm your participation.</p>
                    <?php
                    if($insert==true){
                    echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the trip</p> ";
                    }
                    ?>
                    <form action="index.php" method="post">
                        <input type="text" name="name" id="name" placeholder="Enter your name">
                        <input type="text" name="age" id="age" placeholder="Enter your age">
                        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
                        <input type="email" name="email" id="email" placeholder="Enter your email">
                        <input type="phone" name="phone" id="phone" placeholder="Enter your mobile number">
                        <textarea name="desc" id="desc" cols="30" rows="10"placeholder="Enter any other information here"></textarea>
                        <button class="btn">Submit</button>
                        <!-- <button class="btn">Reset</button> -->
                        </form> 


                </div>


            </body>
            </html>
