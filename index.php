<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiktak AHR</title>
    <link rel="stylesheet" href="style.css">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        ul {}

        ul li {
            list-style: none;

        }

        ul li a {
            text-decoration: none;
            font-size: 20px;
            color: #ffffff;
            display: block;
            margin: 10px auto;
            width: 266px;
            background: #4caf50;
            text-align: center;
            border-radius: 4px;
            padding: 4px;
            font-family: cursive;
        }

        .center {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <div class="center">
        <h1 style="
    text-align: center;
    font-family: cursive;
    color: #47bc47;
">AHR Game</h1>

        <ul>
            <li> <a href="single.php"> Local Player</a></li>
            <li><a href="online.php">Online</a></li>
            <li><a href="computer.php">Computer</a></li>
        </ul>

    </div>
</body>

</html>