<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .container{
        display:flex;
        align-items: center;
        justify-content: center;
    }
    .form{
        margin-top: 15vh;
        width: 40%;
    }
    input{
        width:95%;
        border-radius: 4px;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .btn{
        border-radius: 4px;
        height: 30px;
        width: 200px;
    }
    .Button{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    legend{
        padding:30px 6px;
    }
    </style>
</head>
<body>
    <?php
    $serverName="127.0.0.1:3308";
    $userName="myadmin";
    $password="ritwika_123";
    $dbname = "Art_gallery";

    $conn = mysqli_connect($serverName, $userName, $password, $dbname);
    if(!$conn){
        die ("Connenction failed".mysqli_connect_error());
    }else{
        //$sql = "CREATE DATABASE Art_gallery";
        // $sql = "CREATE TABLE Artists (
        //                     aid varchar(10),
        //                     aname varchar(30),
        //                     age int,
        //                     artist_rank int )";
        if(isset($_POST['Submit']))
        {
            $ArtistID = $_POST['artistID'];
            $ArtistName = $_POST['artistName'];
            $ArtistAge = $_POST['artistAge'];
            $ArtistRank = $_POST['artistRank'];
        $sql= "INSERT INTO Artists(aid, aname,age, artist_rank) VALUES ('$ArtistID', '$ArtistName', '$ArtistAge', '$ArtistRank')";
        $res = mysqli_query($conn, $sql);

        if($res)
        {
            echo "<p>Vaslues successfully inserted</p>";
        }else{
            echo "<p>Values can not be inserted</p>";
        }
    }
        
    }
    ?>

<div class ="container">
<div class ="form">
<form action="#"  method ="POST">
    <fieldset>
        <legend>Register Form</legend>
    Artist ID : <br><input type = "text" id="userID" name="artistID" ><br>
    Artist Name : <br> <input type = "text" id ="username" name = "artistName"><br>
    Artist Age : <br><input type = "number" id ="age" name = "artistAge"><br>
    Artist Rank : <br><input type = "number" id ="rank" name = "artistRank"><br>
    <div class ="Button"><button type="submit" value="Register" class="btn" name ="Submit" >Register</button></div>
    </fieldset>
</form>
</div>
</div>
    
</body>
</html>