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

    <label class="computer cp" for="computer"> Computer <input id="computer" onclick="cp();" type="checkbox"></label>
    <label class="multiplayer ml" for="multiplayer"><input id="multiplayer" onclick="multi();" type="checkbox"> Multiplayer
        <ul>
            <li><button>Create</button></li>
            <li><button>join</button></li>
        </ul>
    </label>

    <div class="clear"></div>
    <p class="player"> <img src="AW.jpeg"><input id="playerAw" value="0" disabled="disabled"></p>
    <p class="player2"><img src="MR.jpeg"><input id="playerMr" value="0" disabled="disabled"></p>
    <div style="clear:both;"></div>
    <button id="Colorr" class="aw" onclick="recall()" style="width:90px;height:60px;margin:5px;display:inline-block;"></button>
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





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        var winmusic = document.getElementById("winmusic");
        var win = document.getElementById("win");
        var sub = document.getElementsByClassName("sub");
        var colord = document.getElementById("Colorr");
        var sound = document.getElementById("sound");
        var computer = document.getElementById("computer");
        var playerAw = document.getElementById("playerAw");
        var playerMr = document.getElementById("playerMr");
        var plyc1 = document.getElementsByClassName("player")[0];
        var plyc2 = document.getElementsByClassName("player2")[0];
        var tim = 0;
        var who = 0;

        function clearDiv() {
            win.style.display = "none";
            sub[0].classList.remove("aw");
            sub[1].classList.remove("aw");
            sub[2].classList.remove("aw");
            sub[3].classList.remove("aw");
            sub[4].classList.remove("aw");
            sub[5].classList.remove("aw");
            sub[6].classList.remove("aw");
            sub[7].classList.remove("aw");
            sub[8].classList.remove("aw");

            sub[0].classList.remove("mr");
            sub[1].classList.remove("mr");
            sub[2].classList.remove("mr");
            sub[3].classList.remove("mr");
            sub[4].classList.remove("mr");
            sub[5].classList.remove("mr");
            sub[6].classList.remove("mr");
            sub[7].classList.remove("mr");
            sub[8].classList.remove("mr");

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

            if ((computer.checked) && (who == 1)) {
                recall();
            }
            elseif((multiplayer.checked) && (who == 1)) {

            }
            elseif() {

            }

        }

        p1 = prompt("Player 1 Name");
        p2 = prompt("Player 2 Name");
        if (p1 == null) {
            p1 = "Player 1";
        }
        if (p2 == null) {
            p2 = "Player 2";
        }

        function winner(winner) {
            winmusic.play();
            if (winner == 0) {
                win.innerHTML = p1 + " Win!";
                paw = parseInt(playerAw.value) + 1;
                playerAw.value = paw;
                who = 1;
                if (playerAw.value > playerMr.value) {
                    plyc1.style.boxShadow = "inset 0 0 15px 2px green";
                    plyc2.style.boxShadow = "none";
                }
            } else if (winner == 1) {
                win.innerHTML = p2 + " Win!";
                pmr = parseInt(playerMr.value) + 1;
                playerMr.value = pmr;
                who = 0;
                if (playerMr.value > playerAw.value) {
                    plyc2.style.boxShadow = "inset 0 0 15px 2px green";
                    plyc1.style.boxShadow = "none";
                }
            } else if (winner == 5) {
                win.innerHTML = "Match Draw";
                if (colord.classList.contains("mr")) {
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

        var color = "mr";
        for (var i = 0; i < sub.length; i++) {
            sub[i].addEventListener('click', function() {

                if (this.classList.contains("clicked")) {

                } else {
                    if (color == "mr") {
                        colord.classList.add("mr");
                        color = "aw";
                    } else {
                        colord.classList.remove("mr");
                        colord.classList.add("aw");
                        color = "mr";
                    }
                    this.classList.add(color);
                    this.classList.add("clicked");
                    sound.play();
                    if ((computer.checked) && (color == "aw")) {
                        setTimeout(function() {
                            if (computer.checked) {
                                recall();
                            } else {

                            }
                        }, 500);
                    } else {

                    }

                    if ((sub[0].classList.contains("aw")) && (sub[1].classList.contains("aw")) && (sub[2].classList.contains("aw"))) {
                        winner(0);
                    } else if ((sub[3].classList.contains("aw")) && (sub[4].classList.contains("aw")) && (sub[5].classList.contains("aw"))) {
                        winner(0);
                    } else if ((sub[6].classList.contains("aw")) && (sub[7].classList.contains("aw")) && (sub[8].classList.contains("aw"))) {
                        winner(0);
                    } else if ((sub[0].classList.contains("aw")) && (sub[3].classList.contains("aw")) && (sub[6].classList.contains("aw"))) {
                        winner(0);
                    } else if ((sub[1].classList.contains("aw")) && (sub[4].classList.contains("aw")) && (sub[7].classList.contains("aw"))) {
                        winner(0);
                    } else if ((sub[2].classList.contains("aw")) && (sub[5].classList.contains("aw")) && (sub[8].classList.contains("aw"))) {
                        winner(0);
                    } else if ((sub[0].classList.contains("aw")) && (sub[4].classList.contains("aw")) && (sub[8].classList.contains("aw"))) {
                        winner(0);
                    } else if ((sub[2].classList.contains("aw")) && (sub[4].classList.contains("aw")) && (sub[6].classList.contains("aw"))) {
                        winner(0);
                    } else if ((sub[0].classList.contains("mr")) && (sub[1].classList.contains("mr")) && (sub[2].classList.contains("mr"))) {
                        winner(1);
                    } else if ((sub[3].classList.contains("mr")) && (sub[4].classList.contains("mr")) && (sub[5].classList.contains("mr"))) {
                        winner(1);
                    } else if ((sub[6].classList.contains("mr")) && (sub[7].classList.contains("mr")) && (sub[8].classList.contains("mr"))) {
                        winner(1);
                    } else if ((sub[0].classList.contains("mr")) && (sub[3].classList.contains("mr")) && (sub[6].classList.contains("mr"))) {
                        winner(1);
                    } else if ((sub[1].classList.contains("mr")) && (sub[4].classList.contains("mr")) && (sub[7].classList.contains("mr"))) {
                        winner(1);
                    } else if ((sub[2].classList.contains("mr")) && (sub[5].classList.contains("mr")) && (sub[8].classList.contains("mr"))) {
                        winner(1);
                    } else if ((sub[0].classList.contains("mr")) && (sub[4].classList.contains("mr")) && (sub[8].classList.contains("mr"))) {
                        winner(1);
                    } else if ((sub[2].classList.contains("mr")) && (sub[4].classList.contains("mr")) && (sub[6].classList.contains("mr"))) {
                        winner(1);
                    } else if ((sub[0].classList.contains("clicked")) && (sub[1].classList.contains("clicked")) && (sub[2].classList.contains("clicked")) && (sub[3].classList.contains("clicked")) && (sub[4].classList.contains("clicked")) && (sub[5].classList.contains("clicked")) && (sub[6].classList.contains("clicked")) && (sub[7].classList.contains("clicked")) && (sub[8].classList.contains("clicked"))) {
                        winner(5);
                    }
                }
            }, false);

        }

        setInterval(function() {
            tim++;
            var currentTim = document.getElementById("currentTime");
            currentTim.innerHTML = tim;
        }, 1000);

        function computeryy() {
            var rndm = Math.floor(Math.random() * 9);
            if (sub[rndm].classList.contains("clicked")) {
                var rndm = Math.floor(Math.random() * 9);
                recall();
            } else {
                sub[rndm].click();
            }
        }

        function recall() {
            computeryy();
        }

        function cp() {
            clearDiv();
            playerAw.value = 0;
            playerMr.value = 0;
        }



        // computer

        // **************** multiplayer ************************

        function multi() {
            var nameml = prompt("Enter Your Name");

            $.post('send.php', {
                name: nameml
            }, function(data) {
                alert(data);
            });
        };
    </script>

</body>

</html>