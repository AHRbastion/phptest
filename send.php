<?php
require_once("config.php");
$roomno = $_REQUEST['roomno'];


if ( isset($_REQUEST['roomno']) && isset($_REQUEST['box'])) {
    $who = $_REQUEST['who'];
    $box = $_REQUEST['box'];
    $boxno = "box" . $box;

        if ($who === 'o') {
            $who = 'x';
        }else{
            $who = 'o';
        }


    $update = "UPDATE game SET $boxno='$who', who='$who' WHERE roomno='$roomno'";
    $query2 = mysqli_query($conn, $update);
}


// *********** reset ***************
if (isset($_REQUEST["reset"])) {
    $clear = "UPDATE game SET box1='', box2='', box3='', box4='', box5='', box6='', box7='', box8='', box9='' WHERE roomno='$roomno'";
    $query3 = mysqli_query($conn, $clear);
}
// *********** reset end **********

$selects = "SELECT * FROM game WHERE roomno='$roomno'";
$querys = mysqli_query($conn, $selects);

if ($querys == true) {
    while ($mydata = mysqli_fetch_array($querys)) {

?>
<input type="hidden" id="who" value="<?php echo $mydata["who"] ;?>">
<input type="hidden" id="player1" value="<?php echo $mydata['player1']; ?>">
<input type="hidden" id="player2" value="<?php echo $mydata['player2']; ?>">

        <div class="sub"><input id="inp1" class="inp <?php if(empty($mydata['box1'])){echo '';}else{ echo 'clicked '.$mydata['box1'];} ?>" onclick="clickedinp(1)" value="<?php echo $mydata['box1']; ?>" <?php if(empty($mydata["box1"])){echo "";}else{ echo "disabled";} ?> readonly></div>
        <div class="sub"><input id="inp2" class="inp <?php if(empty($mydata['box2'])){echo '';}else{ echo 'clicked '.$mydata['box2'];} ?>" onclick="clickedinp(2)" value="<?php echo $mydata['box2']; ?>" <?php if(empty($mydata["box2"])){echo "";}else{ echo "disabled";} ?> readonly></div>
        <div class="sub"><input id="inp3" class="inp <?php if(empty($mydata['box3'])){echo '';}else{ echo 'clicked '.$mydata['box3'];} ?>" onclick="clickedinp(3)" value="<?php echo $mydata['box3']; ?>" <?php if(empty($mydata["box3"])){echo "";}else{ echo "disabled";} ?> readonly></div>
        <div class="sub"><input id="inp4" class="inp <?php if(empty($mydata['box4'])){echo '';}else{ echo 'clicked '.$mydata['box4'];} ?>" onclick="clickedinp(4)" value="<?php echo $mydata['box4']; ?>" <?php if(empty($mydata["box4"])){echo "";}else{ echo "disabled";} ?> readonly></div>
        <div class="sub"><input id="inp5" class="inp <?php if(empty($mydata['box5'])){echo '';}else{ echo 'clicked '.$mydata['box5'];} ?>" onclick="clickedinp(5)" value="<?php echo $mydata['box5']; ?>" <?php if(empty($mydata["box5"])){echo "";}else{ echo "disabled";} ?> readonly></div>
        <div class="sub"><input id="inp6" class="inp <?php if(empty($mydata['box6'])){echo '';}else{ echo 'clicked '.$mydata['box6'];} ?>" onclick="clickedinp(6)" value="<?php echo $mydata['box6']; ?>" <?php if(empty($mydata["box6"])){echo "";}else{ echo "disabled";} ?> readonly></div>
        <div class="sub"><input id="inp7" class="inp <?php if(empty($mydata['box7'])){echo '';}else{ echo 'clicked '.$mydata['box7'];} ?>" onclick="clickedinp(7)" value="<?php echo $mydata['box7']; ?>" <?php if(empty($mydata["box7"])){echo "";}else{ echo "disabled";} ?> readonly></div>
        <div class="sub"><input id="inp8" class="inp <?php if(empty($mydata['box8'])){echo '';}else{ echo 'clicked '.$mydata['box8'];} ?>" onclick="clickedinp(8)" value="<?php echo $mydata['box8']; ?>" <?php if(empty($mydata["box8"])){echo "";}else{ echo "disabled";} ?> readonly></div>
        <div class="sub"><input id="inp9" class="inp <?php if(empty($mydata['box9'])){echo '';}else{ echo 'clicked '.$mydata['box9'];} ?>" onclick="clickedinp(9)" value="<?php echo $mydata['box9']; ?>" <?php if(empty($mydata["box9"])){echo "";}else{ echo "disabled";} ?> readonly></div>

<?php  }
}
?>