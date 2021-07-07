<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width,initial-scale=1.0" >
<title>AHR TicTac</title>
<style type="text/css">
*{
margin:0;
padding:0;
}
.main { 
background:black;
border:5px solid rgba(80,180,80,0.9);
display:grid;
width:300px;
height:300px;
margin:5px auto;
grid-template-columns:100px 100px 100px;
grid-template-rows:100px 100px 100px ;
}
.sub{
background:#fff;
border:1px solid #ccc;
box-shadow:inset 0 0 20px #000;
}
.aw{
background:url("http://ahrgame.herokuapp.com/AW.jpeg");
background-size:140%;
background-position:center;
background-attachment:cover;
background-repeat:no-repeat;
}
.mr{
background:url("http://ahrgame.herokuapp.com/MR.jpeg");
background-size:140%;
background-position:center;
background-attachment:cover;
background-repeat:no-repeat;
}
#colorlist{
width:200px;
height:30px;
padding:0;
margin:6px auto;
display:block;
border:1px solid rgba(80,180,80,0.9);
background:white;
}
h1{
text-align:center;
font-family:Arial,sans-serif;
display:block;
padding:8px;
background:rgba(80,180,80,0.9);
color:white;
margin-bottom:6px;
}
button:hover{
box-shadow:inset 0 0 20px yellow;
}
#win{
position:fixed;
top:50%;
left:50%;
transform:translate(-50%,-50%) scale(0.5);
font-size:25px;
width:100%;
text-align:center;
background:rgba(80,180,80,0.9);
height:50px;
padding:20px;
vertical-align:center;
color:#fff;
font-weight:700;
transform-origin:center;
transition:0.4s;
display:none;
}
.player {
display:inline-block;
float:left;
padding:5px;
background:#ddd;
color:black;
width:80px;
border:1px solid #ccc;
border-radius:0 6px 6px 0;
}
.player2{
display:inline-block;
float:right;
padding:5px;
background:#ddd;
color:black;
width:80px;
border:1px solid #ccc;
border-radius:6px 0 0 6px;
}
.player img{
width:35px;
border-radius:50px;
height:30px;
}
.player2 img{
width:35px;
border-radius:50px;
height:30px;
}
#playerAw {
padding:5px;
font-size:20px;
width:25px;
background:none;
border:none;
outline:none;
}
#playerMr {
padding:5px;
font-size:20px;
width:25px;
background:none;
border:none;
outline:none;
}
.computer {
text-align:center;
padding:8px;
margin:10px;
background:rgba(80,180,80,0.9);
color:white;
border-top:1px solid #ccc;
border-radius:0 0 6px 6px;
display:none;
}
</style>
</head>
<body>
<h1>AHR Game</h1>

<p class="player" > <img src="http://ahrgame.herokuapp.com/AW.jpeg" ><input id="playerAw" value="0" disabled="disabled"  ></p>
<label class="computer"  for="computer"> Computer <input id="computer" onclick="cp();"  type="checkbox" checked></label>
<p class="player2" ><img src="http://ahrgame.herokuapp.com/MR.jpeg" ><input id="playerMr"  value="0" disabled="disabled"  ></p>
<div style="clear:both;" ></div>
<button id="Colorr" class="aw" onclick="recall()" style="width:90px;height:60px;margin:5px;display:inline-block;" ></button>
<button onclick="clearDiv()" id="currentTime" style="background:white;width:90px;height:60px;margin:5px;display:inline-block;float:right;" >Clear</button>
<div class="main">

<div class="sub" ></div>
<div class="sub" ></div>
<div class="sub" ></div>
<div class="sub" ></div>
<div class="sub" ></div>
<div class="sub" ></div>
<div class="sub" ></div>
<div class="sub" ></div>
<div class="sub"></div>
</div>

<div id="win" onclick="clearDiv();" ></div>

<audio id="winmusic"  src="win.wav"></audio>
<audio autoplay="false"  class="sound" id="sound" src="soundClick.wav"  ></audio>
<script type="text/javascript">
var winmusic=document.getElementById("winmusic");
var win=document.getElementById("win");
var sub=document.getElementsByClassName("sub");
var colord=document.getElementById("Colorr");
var sound=document.getElementById("sound");
var computer=document.getElementById("computer");
var playerAw=document.getElementById("playerAw");
var playerMr=document.getElementById("playerMr");
var plyc1=document.getElementsByClassName("player")[0];
var plyc2=document.getElementsByClassName("player2")[0];
var tim=0;
var who=0;

function clearDiv(){
win.style.display="none";
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
tim=0;

if((computer.checked) && (who==1)){
recall();
}

}

p1= "You";
p2="Computer";

function winner(winner){
winmusic.play();
if(winner==0){
win.innerHTML=p1+" Win!";
paw=parseInt(playerAw.value)+1;
playerAw.value=paw;
who=1;
if(playerAw.value > playerMr.value){
plyc1.style.boxShadow="inset 0 0 15px 2px green";
plyc2.style.boxShadow="none";
}
}
else if(winner==1){
win.innerHTML=p2+" Win!";
pmr=parseInt(playerMr.value)+1;
playerMr.value=pmr;
who=0;
if(playerMr.value > playerAw.value){
plyc2.style.boxShadow="inset 0 0 15px 2px green";
plyc1.style.boxShadow="none";
}
}
else if(winner==5){
win.innerHTML="Match Draw";
if(colord.classList.contains("mr")){
who=1;
}else{
who=0;
}

}
else{

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
win.style.display="block";
win.style.transform="translate(-50%,-50%) scale(1)";
}

var color="mr";
for (var i = 0; i < sub.length; i++) {
sub[i].addEventListener('click', function(){

if(this.classList.contains("clicked") ){

}else{
if(color=="mr"){
colord.classList.add("mr");
color="aw";
}else{
colord.classList.remove("mr");
colord.classList.add("aw");
color="mr";
}
this.classList.add(color);
this.classList.add("clicked");
sound.play();
if((computer.checked) && (color=="aw")){
setTimeout(function(){
if(computer.checked){
recall();
}else{

}
},500);
}else{

}

if( (sub[0].classList.contains("aw")) && (sub[1].classList.contains("aw")) && (sub[2].classList.contains("aw")) ){
winner(0);
}else if( (sub[3].classList.contains("aw")) && (sub[4].classList.contains("aw")) && (sub[5].classList.contains("aw"))){
winner(0);
}else if( (sub[6].classList.contains("aw")) && (sub[7].classList.contains("aw")) && (sub[8].classList.contains("aw"))){
winner(0);
}else if( (sub[0].classList.contains("aw")) && (sub[3].classList.contains("aw")) && (sub[6].classList.contains("aw"))){
winner(0);
}else if( (sub[1].classList.contains("aw")) && (sub[4].classList.contains("aw")) && (sub[7].classList.contains("aw"))){
winner(0);
}else if( (sub[2].classList.contains("aw")) && (sub[5].classList.contains("aw")) && (sub[8].classList.contains("aw"))){
winner(0);
}else if( (sub[0].classList.contains("aw")) && (sub[4].classList.contains("aw")) && (sub[8].classList.contains("aw"))){
winner(0);
}else if( (sub[2].classList.contains("aw")) && (sub[4].classList.contains("aw")) && (sub[6].classList.contains("aw"))){
winner(0);
}


else if( (sub[0].classList.contains("mr")) && (sub[1].classList.contains("mr")) && (sub[2].classList.contains("mr")) ){
winner(1);
}else if( (sub[3].classList.contains("mr")) && (sub[4].classList.contains("mr")) && (sub[5].classList.contains("mr"))){
winner(1);
}else if( (sub[6].classList.contains("mr")) && (sub[7].classList.contains("mr")) && (sub[8].classList.contains("mr"))){
winner(1);
}else if( (sub[0].classList.contains("mr")) && (sub[3].classList.contains("mr")) && (sub[6].classList.contains("mr"))){
winner(1);
}else if( (sub[1].classList.contains("mr")) && (sub[4].classList.contains("mr")) && (sub[7].classList.contains("mr"))){
winner(1);
}else if( (sub[2].classList.contains("mr")) && (sub[5].classList.contains("mr")) && (sub[8].classList.contains("mr"))){
winner(1);
}else if( (sub[0].classList.contains("mr")) && (sub[4].classList.contains("mr")) && (sub[8].classList.contains("mr"))){
winner(1);
}else if( (sub[2].classList.contains("mr")) && (sub[4].classList.contains("mr")) && (sub[6].classList.contains("mr"))){
winner(1);
}

else if( (sub[0].classList.contains("clicked")) && (sub[1].classList.contains("clicked")) && (sub[2].classList.contains("clicked")) && (sub[3].classList.contains("clicked")) && (sub[4].classList.contains("clicked")) && (sub[5].classList.contains("clicked")) && (sub[6].classList.contains("clicked")) && (sub[7].classList.contains("clicked")) && (sub[8].classList.contains("clicked"))){
winner(5);
}
}
}, false);

}

setInterval(function(){
tim++;
var currentTim=document.getElementById("currentTime");
currentTim.innerHTML=tim;
},1000);

function computeryy(){
var rndm=Math.floor(Math.random()*9);
if(sub[rndm].classList.contains("clicked")){
var rndm=Math.floor(Math.random()*9);
recall();
}else{
sub[rndm].click();
}
}

function recall(){
computeryy();
}

function cp(){
clearDiv();
playerAw.value=0;
playerMr.value=0;
}



// computer




</script>

</body>	
</html>
