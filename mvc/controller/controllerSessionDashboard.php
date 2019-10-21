<?php
session_start();
if(!isset($_SESSION[$SessionCheckUserInfo]))
{
  header('location: '.$loginUrl);
}
else
{
  $sArray = $_SESSION[$SessionCheckUserInfo];
}

?>