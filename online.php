<?php 
require_once("config.php");
if (isset($_REQUEST["createroomcode"]) && isset($_REQUEST["name1"])) {
    $player1=$_REQUEST["name1"];
    $createroomcode=$_REQUEST["createroomcode"];
    $insert="INSERT INTO game (player1,roomno) VALUES('$player1','$createroomcode')";
    $query1=mysqli_query($conn,$insert);
    if ($query1 == true) {
       header("location:multi.php?roomno=$createroomcode");
    }else{
        echo '<script>alert("Create Faild!");</script>';
    }
}else{

}
if (isset($_REQUEST["roomcode"]) && isset($_REQUEST["name2"])) {
    $name2=$_REQUEST["name2"];
    $roomcode=$_REQUEST["roomcode"];
    $select="SELECT * FROM game WHERE roomno='$roomcode'";
    $query=mysqli_query($conn,$select);
    $count=mysqli_num_rows($query);

    if ($count > 0) {
    $update="UPDATE game SET player2='$name2' WHERE roomno='$roomcode'";
    $query2=mysqli_query($conn,$update);
    
       header("location:multi.php?roomno=$roomcode");
    }else{
        echo '<script>alert("Join Faild!");</script>';
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AHR Join or crete</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="modal-container">
        <div class="modal">
            <div class="tab">
                <div class="tabtitle"><button class="btn active" onclick="tabchange1()">Create</button><button class="btn" onclick="tabchange2()">Join</button></div>
                <div class="tab1">
                    <form>
                        <center>
                            <h2 style="color: white; font-family:cursive;">Create Room</h2>
                        </center>
                        <input type="text" name="name1" placeholder="Your Name" required>
                        <input id="roomcode" name="createroomcode" type="text" placeholder="Create Room Code" required>
                        <input type="submit" value="Create">
                    </form>
                </div>
                <div class="tab2">
                    <form>
                        <center>
                            <h2 style="color: white; font-family:cursive;">Join Room</h2>
                        </center>
                        <input type="text" name="name2" placeholder="Your Name" required>
                        <input type="text" name="roomcode" placeholder="Enter Room Code" required>
                        <input type="submit" value="Join">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var roomcode = document.getElementById("roomcode");
        var rndmcode = Math.floor(100000 + Math.random() * 999999);
        roomcode.value = rndmcode;


        // ********** tab ***************

        var btn = document.getElementsByClassName("btn");
        var tab1 = document.getElementsByClassName("tab1")[0];
        var tab2 = document.getElementsByClassName("tab2")[0];

        function tabchange1() {
            btn[1].classList.remove("active");
            btn[0].classList.add("active");
            tab2.style.display = "none";
            tab1.style.display = "block";
        }

        function tabchange2() {
            btn[0].classList.remove("active");
            btn[1].classList.add("active");
            tab1.style.display = "none";
            tab2.style.display = "block";
        }

        //*********** end tab *****************



    </script>
</body>

</html>