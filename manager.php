
<?php /*
include('./includes/auth_check.php');

if(isset($_SESSION['role']) && $_SESSION['role'] != 'Manager'){
  if($_SESSION['role'] == "Mitarbeiter"){
    header('location: mitarbeiter.php');
    exit;
  } else {
    header('location: ingenieur.php');
    exit;
  }
}

*/
?>






<html>
    
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/pages.css">
    <link rel="stylesheet" href="assets/css/timer.css">
    <script type="text/javascript" src="assets/js/script.js"></script>
 
    </head>
    <body>
       
      <div class="navbar">
        
        <div class="menu">
            <input type="hidden" data-time="300" class="time-set" />
            <a class="tablinks" id="timer_left" style="float: left;">00:00</a>
            <a class="end_time"></a>
            <a class="tablinks" onclick="opentab(event, 'Einstellung')">Einstellung </a>
            <a class="tablinks" onclick="window.location.href='./includes/abmelden.php';"> Logout</a>
        </div>
    </div>
    



    <div class="tab">
      <img src="./assets/images/lms_logo_retina.png" style="max-width:220; min-width:auto; padding-bottom: 5px;">
      <iframe style="max-width: 220px; border: none; max-height: 65px; min-width:auto; background-color: transparent;" 
      src="https://www.wetter.de/widget/mini/u1j9qt/L2RldXRzY2hsYW5kL3dldHRlci1rb2Vsbi0xODIyMDY3OS5odG1s/">
      </iframe>
      <button class="tablinks active" onclick="opentab(event, 'Benachrichtigungen')" id="defaultOpen">Benachrichtigungen</button>
      <button class="tablinks" onclick="opentab(event, 'Reifensorganisation')">Reifensorganisation</button>
      <button class="tablinks" onclick="opentab(event, 'Rennwochenende')">Rennwochenende</button>
      <button class="tablinks" onclick="opentab(event, 'Statistik')">Statistik</button>
      <button class="tablinks" onclick="opentab(event, 'Protokoll')">Protokoll</button>
      
    </div>
    




     <!----------------- Benachrichtigungen-------------------------------->

    <div id="Benachrichtigungen" class="tabcontent" style="display: block;">


    <h4 class="txt-title">Session</h4>     
        
        <form  action="./includes/sessionwahl.php" method="post">
             <table class="table">
             <tr> <td>  
               <?php 
               include './includes/sessionwahl.php';
               echo $opt;
               ?>
               </td>
               <td><button name="Add" id="addRow" type="submit" class="btn-block" >Show</td>

             </tr>
          
           </table>
        </form>

      <h4 class="txt-title">Neue Benachrichtigungen</h4>     

         
      <table>
        <tbody>
            <tr> 
              <td> Bestellung-NR <a onclick="opentab(event, 'Offene Bestellung')">BestellungsNR</a>
                wartet auf Ihre Zustimmung </td> 
              <td></td> 
              <td></td>
            </tr>
          <!-- BestellungsNR auto incremented in DB -->
            <tr> 
              <td>Bestellung-NR  <a onclick="opentab(event, 'Bestellung-NR')"> BestellungsNR</a>  ist in Bearbeitung </td>
              <td></td>
              <td></td>
            </tr>
      
            <tr>
              <td>Bestellung-NR  <a onclick="opentab(event, 'Bestellung-NR')">BestellungsNR</a> ist schon bestellt.
                (Wollen Sie Timer aktivieren?) </td>
              <td>
              <label for="ja">ja</label><input id="timer_activated" type="radio" name="timer_activated" value="ja">
              </td>
              <td>
                <label for="nein">nein</label><input id="timer_not_activated" type="radio" name="timer_not_activated" value="nein">  
              </td>
             </tr>
      
            <tr>
              <td>Abholung der Bestellung-NR   <a onclick="opentab(event, 'Bestellung-NR')">BestellungsNR</a>
                würde verschoben.
                (Wollen Sie den Timer reaktivieren? )</td>
              <td>
                <label for="ja">ja</label><input id="timer_reset_yes" type="radio" name="timer_reset" value="ja">
              </td>
              <td>
                <label for="nein">nein</label><input id="timer_reset_no" type="radio" name="timer_reset" value="nein"> 
              </td>
            </tr>
        </tbody>
      </table>
        
      
      
      </div>


  
 


        <!--------------------------------Reifensorganisation-------------------------------->
    <div id="Reifensorganisation" class="tabcontent" style="display: none;">
      <div w3-include-html="includes/reifenorg.php">
      </div>

     
    </div>
        <!--------------------------------Statistik-------------------------------->
        <div id="Statistik" class="tabcontent" style="display: none;">
    <div style="width:100%; min-width:700px; height:auto; float:left">  <title>LuftTemp & StreckenTemp</title> <?php include('includes/statistik.php');?></div>
     
   </div>
        <!--------------------------------Diagramm-------------------------------->

     <div id="Diagramm" class="tabcontent" style="display: none;">
    
     <div style="width:100%; min-width:700px; height:auto; float:left">  <title>Kontingenten der Reifensätze</title> <?php include('includes/chart.php');?></div>
    
     </div>
        <!--------------------------------Protokoll -------------------------------->

     <div id="Protokoll" class="tabcontent" style="display: none;">
      <div w3-include-html="includes/protokoll.php"></div> 

    </div>

    <!--------------------------------Einstellung -------------------------------->

    <div id="Einstellung" class="tabcontent" style="display: none;">
      <p>Ändern Sie ihr Passwort für Sicherheit!</p> 
        <br>
        <div class="body">
          <p><label for="pass1">Passwort    :</label>
            <input type="text" id="pass1" name="pass1" minlength="8" required></p>
            
            <p><label for="pass2">Wiederholen:</label>
            <input type="text" id="pass2" name="pass2"></p>
            
        </div>
        
        <input type="submit" value="Sign in">
   </div>
     
       <!--------------------------------Bestellung-NR-------------------------------->

       <div id="Bestellung-NR" class="tabcontent" style="display: none;">
        <div w3-include-html="includes/bestellungNR.php"></div> 
      </div>
        
        
        
        
        
        
                <!--------------------------------Offene Bestellungen-------------------------------->

<div id="Offene Bestellung" class="tabcontent" style="display: none;">
            <div style="padding: 20px;">
<h4 class="txt-title">Offene Bestellungen</h4>
    <table class="table">
        <tr>
            <td>Bestell-Nr.</td>
            <td>Reifensatz-ID</td>
            <td>Datum</td>
            <td>Uhrzeit</td>
      </tr>
<?php 
require 'includes/connection.php';


$sql = "SELECT * FROM bestellung WHERE Status=1";
$result = $con->query($sql);


if ($result->num_rows > 0){
    
    while ($row = $result->fetch_assoc()){
    ?>    
        <tr>
            <td id="Bestell-Nr."><?php echo $row['BestellNr'];?></td>
            <td id="Reifensatz-ID"><?php echo $row['Reifensatz'];?></td>
            <td id="Datum"><?php echo date("d.m.Y", strtotime($row['Datum']));?></td>
            <td id="Uhrzeit"><?php echo $row['Zeit'];?></td>
        </tr>
    <?php
    }
}
?> 
        
 </table>
              
</div> 
    </div> 
        
        
        
  
     <!----------------- Rennwochenende -------------------------------->

     <div id="Rennwochenende" class="tabcontent" style="display: none;">
      <div w3-include-html="includes/rennWE.php"></div>       
    </div>
    
    <script>
      includeHTML();
    </script>
    <script type="text/javascript" src="assets/js/timer.js"></script>

    </body>
    
    </html>