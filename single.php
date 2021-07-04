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
    <p class="player"> <img src="https://ahrbastion.github.io/phptest/AW.jpeg"><input id="playerp1" value="0" disabled="disabled"></p>
    <p class="player2"><img src="https://ahrbastion.github.io/phptest/MR.jpeg"><input id="playerp2" value="0" disabled="disabled"></p>
    <div style="clear:both;"></div>
    <button id="Colorr" class="p1" onclick="recall()" style="width:90px;height:60px;margin:5px;display:inline-block;"></button>
    <button onclick="clearDiv()" id="currentTime" style="background:white;width:90px;height:60px;margin:5px;display:inline-block;float:right;">Clear</button>
    <div class="main">

        <div class="sub"></div>
        <div class="sub"></div>
        <div class="sub"></div>
        <div class="sub"></div>
        <div class="sub"></div>
        <div class="sub"></div>
        <div class="sub"></div>
        <div class="sub"></div>
        <div class="sub"></div>
    </div>

    <div id="win" onclick="clearDiv();"></div>

    <audio id="winmusic" src="win.wav"></audio>
    <audio autoplay="false" class="sound" id="sound" src="soundClick.wav"></audio>



    <script type="text/javascript">
        var winmusic = document.getElementById("winmusic");
        var win = document.getElementById("win");
        var sub = document.getElementsByClassName("sub");
        var colord = document.getElementById("Colorr");
        var sound = document.getElementById("sound");
        var playerp1 = document.getElementById("playerp1");
        var playerp2 = document.getElementById("playerp2");
        var plyc1 = document.getElementsByClassName("player")[0];
        var plyc2 = document.getElementsByClassName("player2")[0];
        var tim = 0;
        var who = 0;

        function clearDiv() {
            win.style.display = "none";
            sub[0].classList.remove("p1");
            sub[1].classList.remove("p1");
            sub[2].classList.remove("p1");
            sub[3].classList.remove("p1");
            sub[4].classList.remove("p1");
            sub[5].classList.remove("p1");
            sub[6].classList.remove("p1");
            sub[7].classList.remove("p1");
            sub[8].classList.remove("p1");

            sub[0].classList.remove("p2");
            sub[1].classList.remove("p2");
            sub[2].classList.remove("p2");
            sub[3].classList.remove("p2");
            sub[4].classList.remove("p2");
            sub[5].classList.remove("p2");
            sub[6].classList.remove("p2");
            sub[7].classList.remove("p2");
            sub[8].classList.remove("p2");

            sub[0].classList.remove("clicked");
            sub[1].classList.remove("clicked");
            sub[2].classList.remove("clicked");
            sub[3].classList.remove("clicked");
            sub[4].classList.remove("clicked");
            sub[5].classList.remove("clicked");
            sub[6].classList.remove("clicked");
            sub[7].classList.remove("clicked");
            sub[8].classList.remove("clicked");
            tim = 0;

        }

        p1 = prompt("Player 1 Name");
        p2 = prompt("Player 2 Name");
        if ((p1 == "") || (p1== null)) {
            p1 = "Player 1";
        }
        if ((p2 == "") || (p2== null)) {
            p2 = "Player 2";
        }

        function winner(winner) {
            winmusic.play();
            if (winner == 0) {
                win.innerHTML = p1 + " Win!";
                pp1 = parseInt(playerp1.value) + 1;
                playerp1.value = pp1;
                who = 1;
                if (playerp1.value > playerp2.value) {
                    plyc1.style.boxShadow = "inset 0 0 15px 2px green";
                    plyc2.style.boxShadow = "none";
                }
            } else if (winner == 1) {
                win.innerHTML = p2 + " Win!";
                pp2 = parseInt(playerp2.value) + 1;
                playerp2.value = pp2;
                who = 0;
                if (playerp2.value > playerp1.value) {
                    plyc2.style.boxShadow = "inset 0 0 15px 2px green";
                    plyc1.style.boxShadow = "none";
                }
            } else if (winner == 5) {
                win.innerHTML = "Match Drp1";
                if (colord.classList.contains("p2")) {
                    who = 1;
                } else {
                    who = 0;
                }

            } else {

            }

            sub[0].classList.add("clicked");
            sub[1].classList.add("clicked");
            sub[2].classList.add("clicked");
            sub[3].classList.add("clicked");
            sub[4].classList.add("clicked");
            sub[5].classList.add("clicked");
            sub[6].classList.add("clicked");
            sub[7].classList.add("clicked");
            sub[8].classList.add("clicked");
            win.style.display = "block";
            win.style.transform = "translate(-50%,-50%) scale(1)";
        }

        var color = "p2";
        for (var i = 0; i < sub.length; i++) {
            sub[i].addEventListener('click', function() {

                if (this.classList.contains("clicked")) {

                } else {

                    function whoo() {
                        if (color == "p2") {
                            colord.classList.add("p2");
                            color = "p1";
                        } else {
                            colord.classList.remove("p2");
                            colord.classList.add("p1");
                            color = "p2";
                        }
                    }

                    this.classList.add(color);
                    this.classList.add("clicked");
                    sound.play();


                    if ((sub[0].classList.contains("p1")) && (sub[1].classList.contains("p1")) && (sub[2].classList.contains("p1"))) {
                        winner(0);
                    } else if ((sub[3].classList.contains("p1")) && (sub[4].classList.contains("p1")) && (sub[5].classList.contains("p1"))) {
                        winner(0);
                    } else if ((sub[6].classList.contains("p1")) && (sub[7].classList.contains("p1")) && (sub[8].classList.contains("p1"))) {
                        winner(0);
                    } else if ((sub[0].classList.contains("p1")) && (sub[3].classList.contains("p1")) && (sub[6].classList.contains("p1"))) {
                        winner(0);
                    } else if ((sub[1].classList.contains("p1")) && (sub[4].classList.contains("p1")) && (sub[7].classList.contains("p1"))) {
                        winner(0);
                    } else if ((sub[2].classList.contains("p1")) && (sub[5].classList.contains("p1")) && (sub[8].classList.contains("p1"))) {
                        winner(0);
                    } else if ((sub[0].classList.contains("p1")) && (sub[4].classList.contains("p1")) && (sub[8].classList.contains("p1"))) {
                        winner(0);
                    } else if ((sub[2].classList.contains("p1")) && (sub[4].classList.contains("p1")) && (sub[6].classList.contains("p1"))) {
                        winner(0);
                    } else if ((sub[0].classList.contains("p2")) && (sub[1].classList.contains("p2")) && (sub[2].classList.contains("p2"))) {
                        winner(1);
                    } else if ((sub[3].classList.contains("p2")) && (sub[4].classList.contains("p2")) && (sub[5].classList.contains("p2"))) {
                        winner(1);
                    } else if ((sub[6].classList.contains("p2")) && (sub[7].classList.contains("p2")) && (sub[8].classList.contains("p2"))) {
                        winner(1);
                    } else if ((sub[0].classList.contains("p2")) && (sub[3].classList.contains("p2")) && (sub[6].classList.contains("p2"))) {
                        winner(1);
                    } else if ((sub[1].classList.contains("p2")) && (sub[4].classList.contains("p2")) && (sub[7].classList.contains("p2"))) {
                        winner(1);
                    } else if ((sub[2].classList.contains("p2")) && (sub[5].classList.contains("p2")) && (sub[8].classList.contains("p2"))) {
                        winner(1);
                    } else if ((sub[0].classList.contains("p2")) && (sub[4].classList.contains("p2")) && (sub[8].classList.contains("p2"))) {
                        winner(1);
                    } else if ((sub[2].classList.contains("p2")) && (sub[4].classList.contains("p2")) && (sub[6].classList.contains("p2"))) {
                        winner(1);
                    } else if ((sub[0].classList.contains("clicked")) && (sub[1].classList.contains("clicked")) && (sub[2].classList.contains("clicked")) && (sub[3].classList.contains("clicked")) && (sub[4].classList.contains("clicked")) && (sub[5].classList.contains("clicked")) && (sub[6].classList.contains("clicked")) && (sub[7].classList.contains("clicked")) && (sub[8].classList.contains("clicked"))) {
                        winner(5);
                    }
                }
            }, false);

        }
    </script>

</body>

</html>
