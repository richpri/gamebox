<?php
/*
 * emailPlayerAdd.php is the server side code for the 
 * AJAX emailPlayerAdd call.
 * 
 * Copyright (c) 2013 Richard E. Price under the The MIT License.
 * A copy of this license can be found in the LICENSE.text file.
 */
require_once('config.php');
require_once('sendEmail.php');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$link) {
  error_log('Failed to connect to server: ' . mysqli_connect_error());
  echo 'fail';
  exit; 
}

//Function to sanitize values received from the form. 
//Prevents SQL injection
function clean($conn, $str) {
  $str = @trim($str);
  return mysqli_real_escape_string($conn, $str);
}

//Sanitize the POST value
$login = clean($link, $_REQUEST['login']);
$game = clean($link, $_REQUEST['game']);

// Look up player via login and send email
// to that player ID [login].
$qry1 = "SELECT * FROM players WHERE login='$login'";
$result1 = mysqli_query($link, $qry1);
if ($result1) {
  if (mysqli_num_rows($result1) === 0) { // No player!
    echo 'fail';
    error_log("Look up player: Player login not found!");
    exit;
  } else { // Found login in database!
    $playerrow = mysqli_fetch_assoc($result1);
    $subject = 'BOARD18 New Game';
    $body = 'You have been added to the BOARD18 game titled ' . $game;
    sendEmail($playerrow['email'], $subject, $body);
    exit;
  }
} else {
  echo 'fail';
  error_log("Look up player: Query failed");
  exit;
}
?>