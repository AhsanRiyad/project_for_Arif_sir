<?php
session_start();
$loginStatus = false;

if(isset($pageName)){
  if($pageName == $SessionCheckloginPage)
  {
    unset($_SESSION[$SessionCheckUserInfo]);
  }
}
if(isset($_SESSION[$SessionCheckUserInfo]))
{
  $loginStatus = true;
}
?>