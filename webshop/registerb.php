<?php
    if (isset($_POST['leadas2']) && isset($_POST['Username_2']) && isset($_POST['Password_2']) && isset($_POST['Email'])){
        $username = $_POST['Username_2'];
        $password = $_POST['Password_2'];
        $email = $_POST['Email'];
        $duplicate=mysqli_query($csatlakozas ,"SELECT * FROM loginform WHERE Username='$username' OR Email='$email'");
        if (mysqli_num_rows($duplicate)>0)
        {
        echo 'User name or Email id already exists.';
        }
        else{
        try {
        $sql = "INSERT INTO loginform (Username, Email, Pass) VALUES ('$username','$email','$password')";
        mysqli_query($csatlakozas, $sql);
        echo 'Registered';
        }
        catch(PDOException $e)
            {
                echo $sql . "
                " . $e->getMessage();
            }
        }
    }
?>