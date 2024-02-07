<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        .form {
            margin-top: 25vh;
            background: #A9B388;
            width: 40%;
            padding: 10px;
            border-radius: 15px;
        }

        input[type=text]{
            width: 95%;
            margin-bottom: 20px;
            padding: 10px;
            border: none;
            border-radius: 10px;
        }

        input[type=submit] {
            width: 40%;
            margin-bottom: 20px;
            margin-left: 5px;
            margin-right: 5px;
            padding: 8px;
            border: none;
            border-radius: 10px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body {
            background: #607274;
            font-family: 'Inter', sans-serif;
        }
        .btn{

            margin-left: 34%;
            width: 200px;
            height: 40px;

            border-radius: 8px;
            background: white;


        }
    </style>


     
    <div class="container">
        <div class="form">
            <form action="./newResults.php" method="POST">
                <fieldset>
                   <legend align="center">
                    <font size ="5">Insert Record</font>
                   </legend>
                   <label for ="players">
                    Player: <input type="text" id="players" name="players">
                   </label>
                   <br>
                   <label for ="Run1">
                    Test Runs: <input type="text" id="T_run" name="testRun">
                   </label>
                   <br>
                   <label for ="Run2">
                    ODIR Runs: <input type="text" id="ODrun" name="odiRun">
                   </label>
                   <br>
                   <label for ="Run3">
                    T20 Runs: <input type="text" id="T20run" name="ttRun">
                   </label>
                   <br>

                   <button type="submit" value="Register" class="btn" name ="Submit" >Register</button>
                   
                   <button type="submit" value="Register" class="btn" name="results" >Show Results</button>
                </fieldset>
            </form>
        </div>
    </div>
   
        

</body>
</html>