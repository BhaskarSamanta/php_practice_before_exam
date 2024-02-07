<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #F2AFEF;
        }
        .form {
            border: none;
            border-radius: 10px;
            width: 30%;
            margin-top: 15vh;
            background-color: #7077A1;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        fieldset {
            border: none;
        }
        button {
            width: 50%;
            border: none;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            margin-left: 23%;
            margin-top: 10px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form">
            <form action="insert.php" method="POST" id="insertForm">
                <fieldset>
                    <button type="submit">Insert record in the Cab table</button>
                </fieldset>
            </form>
            <form action="show.php" method="POST" id="showForm">
                <fieldset>
                    <button type="submit">Show results of the Cab table</button>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>
