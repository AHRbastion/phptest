<?php
if (!isset($_REQUEST["roomno"])) {
    header("location:online.php");
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>AHR TicTac</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="index.php">
        <h1 class="th1">AHR Game</h1>
    </a>


    <div class="clear"></div>
    <p class="player"> <img src="aw.jpeg"><input id="playerp1" value="0" disabled="disabled"></p>

    <label class="computer" for="computer"> Room No : <?php echo $_REQUEST["roomno"]; ?> </label>

    <p class="player2"><img src="mr.jpeg"><input id="playerp2" value="0" disabled="disabled"></p>
    <div style="clear:both;"></div>
    <button id="Colorr" class="p1" style="width:90px;height:60px;margin:5px;display:inline-block;"></button>
    <button onclick="clearDiv();" id="currentTime" style="background:white;width:90px;height:60px;margin:5px;display:inline-block;float:right;">Clear</button>

    <div class="main" id="mainCon">
        <input type="hidden" id="who" value="o">
        <input type="hidden" id="player1" value="">
        <input type="hidden" id="player2" value="">

        <div class="sub"><input id="inp1" class="inp" onclick="clickedinp(1);" value="" readonly></div>
        <div class="sub"><input id="inp2" class="inp" onclick="clickedinp(2);" value="" readonly></div>
        <div class="sub"><input id="inp3" class="inp" onclick="clickedinp(3);" value="" readonly></div>
        <div class="sub"><input id="inp4" class="inp" onclick="clickedinp(4);" value="" readonly></div>
        <div class="sub"><input id="inp5" class="inp" onclick="clickedinp(5);" value="" readonly></div>
        <div class="sub"><input id="inp6" class="inp" onclick="clickedinp(6);" value="" readonly></div>
        <div class="sub"><input id="inp7" class="inp" onclick="clickedinp(7);" value="" readonly></div>
        <div class="sub"><input id="inp8" class="inp" onclick="clickedinp(8);" value="" readonly></div>
        <div class="sub"><input id="inp9" class="inp" onclick="clickedinp(9);" value="" readonly></div>
    </div>

    <div id="win" onclick="clearDiv();"></div>

    <audio id="winmusic" src="win.wav"></audio>
    <audio autoplay="false" class="sound" id="sound" src="soundClick.wav"></audio>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        var winmusic = document.getElementById("winmusic");
        var win = document.getElementById("win");
        var sub = document.getElementsByClassName("sub");
        var inp = document.getElementsByClassName("inp");

        var currentTime = document.getElementById("currentTime");
        var sound = document.getElementById("sound");
        var mainCon = document.getElementById("mainCon");
        // ********* end clear **********



        // **************** multiplayer ************************

        function clickedinp(e) {
            
        var player1 = document.getElementById("player1");
        var player2 = document.getElementById("player2");


            // *********** who **********
            var who = document.getElementById("who").value;
            // ********* who end ********
            sound.play();
            $.post('send.php', {
                roomno: "<?php echo $_REQUEST['roomno']; ?>",
                box: e,
                who: who
            }, function(data) {
                mainCon.innerHTML = data;
            });
        }
        setInterval(function() {
            $.post('send.php', {
                roomno: "<?php echo $_REQUEST['roomno']; ?>"
            }, function(data2) {
                mainCon.innerHTML = data2;
            });

            var inp1 = document.getElementById("inp1").value;
            var inp2 = document.getElementById("inp2").value;
            var inp3 = document.getElementById("inp3").value;
            var inp4 = document.getElementById("inp4").value;
            var inp5 = document.getElementById("inp5").value;
            var inp6 = document.getElementById("inp6").value;
            var inp7 = document.getElementById("inp7").value;
            var inp8 = document.getElementById("inp8").value;
            var inp9 = document.getElementById("inp9").value;

            // ********* win ***
            if ((inp[0].classList.contains("o")) && (inp[1].classList.contains("o")) && (inp[2].classList.contains("o"))) {
                        winner("o");
                    } else if ((inp[3].classList.contains("o")) && (inp[4].classList.contains("o")) && (inp[5].classList.contains("o"))) {
                        winner("o");
                    } else if ((inp[6].classList.contains("o")) && (inp[7].classList.contains("o")) && (inp[8].classList.contains("o"))) {
                        winner("o");
                    } else if ((inp[0].classList.contains("o")) && (inp[3].classList.contains("o")) && (inp[6].classList.contains("o"))) {
                        winner("o");
                    } else if ((inp[1].classList.contains("o")) && (inp[4].classList.contains("o")) && (inp[7].classList.contains("o"))) {
                        winner("o");
                    } else if ((inp[2].classList.contains("o")) && (inp[5].classList.contains("o")) && (inp[8].classList.contains("o"))) {
                        winner("o");
                    } else if ((inp[0].classList.contains("o")) && (inp[4].classList.contains("o")) && (inp[8].classList.contains("o"))) {
                        winner("o");
                    } else if ((inp[2].classList.contains("o")) && (inp[4].classList.contains("o")) && (inp[6].classList.contains("o"))) {
                        winner("o");
                    } else if ((inp[0].classList.contains("x")) && (inp[1].classList.contains("x")) && (inp[2].classList.contains("x"))) {
                        winner("x");
                    } else if ((inp[3].classList.contains("x")) && (inp[4].classList.contains("x")) && (inp[5].classList.contains("x"))) {
                        winner("x");
                    } else if ((inp[6].classList.contains("x")) && (inp[7].classList.contains("x")) && (inp[8].classList.contains("x"))) {
                        winner("x");
                    } else if ((inp[0].classList.contains("x")) && (inp[3].classList.contains("x")) && (inp[6].classList.contains("x"))) {
                        winner("x");
                    } else if ((inp[1].classList.contains("x")) && (inp[4].classList.contains("x")) && (inp[7].classList.contains("x"))) {
                        winner("x");
                    } else if ((inp[2].classList.contains("x")) && (inp[5].classList.contains("x")) && (inp[8].classList.contains("x"))) {
                        winner("x");
                    } else if ((inp[0].classList.contains("x")) && (inp[4].classList.contains("x")) && (inp[8].classList.contains("x"))) {
                        winner("x");
                    } else if ((inp[2].classList.contains("x")) && (inp[4].classList.contains("x")) && (inp[6].classList.contains("x"))) {
                        winner("x");
                    } else if ((inp[0].classList.contains("clicked")) && (inp[1].classList.contains("clicked")) && (inp[2].classList.contains("clicked")) && (inp[3].classList.contains("clicked")) && (inp[4].classList.contains("clicked")) && (inp[5].classList.contains("clicked")) && (inp[6].classList.contains("clicked")) && (inp[7].classList.contains("clicked")) && (inp[8].classList.contains("clicked"))) {
                        winner(5);
                    }

                    if(who === "x"){
                        inp[0][1][2][3][4][5][6][7][8].style.cursor="none !important";
                    }else{
                        inp[0][1][2][3][4][5][6][7][8].style.cursor="unset";
                    }
           

        }, 800);

        function clearDiv() {
            win.style.display = "none";
            $.post('send.php', {
                roomno: "<?php echo $_REQUEST['roomno']; ?>",
                reset: "reset"
            }, function(data3) {
                mainCon.innerHTML = data3;
            });
        }

        // ********** winner **********

        function winner(winner) {
            winmusic.play();
            if (winner === "o") {
                win.innerHTML = player1.value + " Win!";
            } else if (winner == "x") {
                win.innerHTML = player2.value + " Win!";
            }else if (winner == 5) {
                win.innerHTML = "Match Draw";

            } else {

            }
            win.style.display = "block";
            win.style.transform = "translate(-50%,-50%) scale(1)";
        }
    </script>

</body>

</html>
