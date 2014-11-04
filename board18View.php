<?php
require_once('php/auth.php');
?>
<!doctype html>
<!--
The board18View.php page displays a list of all active games. 
The player can select any of the listed games to view the game 
session for that game.

Copyright (c) 2014 Richard E. Price under the The MIT License.
A copy of this license can be found in the LICENSE.text file.
-->
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>BOARD18 - Remote Play Tool For 18xx Style Games</title>
    <link rel="shortcut icon" href="images/favicon.ico" >
    <link rel="stylesheet" href="style/jquery.contextMenu.css" />
    <link rel="stylesheet" href="style/board18com.css" />
    <link rel="stylesheet" href="style/board18View.css" />
    <script type="text/javascript" src="scripts/jquery.js">
    </script> 
    <script type="text/javascript" src="scripts/jqueryMigrate.js">
    </script> 
    <script type="text/javascript" src="scripts/jquery.ui.position.js">
    </script>
    <script type="text/javascript" src="scripts/jquery.contextMenu.js">
    </script>
    <script type="text/javascript" src="scripts/board18com.js">
    </script>
    <script type="text/javascript" src="scripts/board18View.js">
    </script>
    <script type="text/javascript" >
      $(function() {
        $.post('php/allGameList.php', listReturn);
        registerMainMenu();
      }); // end ready
    </script>
  </head>
  <body>
    <div id="topofpage">
      <div id="logo">
        <img src="images/logo.png" alt="Logo"/> 
      </div>
      <div id="heading">
        <h1>BOARD18 - Remote Play Tool For 18xx Style Games</h1>
      </div>
      <div>
        <span id="newmainmenu"> MENU </span>
        <p id="lognote"><?php echo "$welcomename: $headermessage"; ?>
          <span style="font-size: 70%">
            Click <a href="index.html">here</a> 
            if you are not <?php echo "$welcomename"; ?>.
          </span>
        </p>
      </div>
    </div>
    <div id="leftofpage">
      
    </div>
    <div id="rightofpage"> 
      <div id="content">  
        <div>
        <p>Select the game that you wish to view. 
        </div>
        </p>   
        <div id="games">
          <table id='gamelist'> 
            <tr>
              <th>Game Name</th> <th>Box Name</th> 
              <th>Version</th> <th>Start Date</th> 
            </tr>
          </table>
        </div>
      </div> 
    </div>  
  </body>
</html>

