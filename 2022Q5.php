<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>

<body>
<style>
    .head{
     font-size:30px;
     color: #F8FAE5;
     font-weight: bold;
    }
    body{
        background-color: #F6B17A;
    }
    .form{
        width: 30%;
        margin-top: 15vh;
        border-radius: 15px;
        border: none;
        background-color: #7077A1;
    }
    input[type=text],[type=password]{
        width: 95%;
        margin-bottom: 25px;
        padding: 10px;
        border-radius: 10px;
        border: none;
    }
    button{
        width: 60%;
        padding: 8px;
        margin-left: 20%;
        border-radius: 10px;
        border: none;
        margin-top: 8px;
        margin-bottom: 10px;
        font-weight: bold;
        font-size: 20px;
    }
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    fieldset{
        border: none;
    }
</style>
<div class="container">
    <div class="form">
    <form action="signup.php" method ="POST">
        <fieldset>
            <legend class="head" align ="center" >Login Form</legend>
   <b><font size = "5" color="#F8FAE5">Username :</font></b> <br>
    <input type="text" name = "user" require placeholder="enter your username"><br>
    <b><font size = "5" color = "#F8FAE5">Password:</font></b> <br>
        <input type="password" name ="user_pass" require placeholder="enter your password"><br>
        <button type="submit">Login</button>

    </fieldset>
    </form>
</div>
</div>
</body>
</html>