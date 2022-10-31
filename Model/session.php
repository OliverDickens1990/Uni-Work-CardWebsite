<?php
// REF: https://www.thoughtco.com/using-cookies-with-php-2693786
date_default_timezone_set("Europe/London");

if(session_status() == PHP_SESSION_NONE)
{
  session_start();

  $Day = time() - 86400; //this destroys the session after exatly 1 day

  setcookie('UserVisit',$Day);
}
else
{
  session_start();
}
?>
<?php
// attempt to add cookie
if (isset($_COOKIE['count'])) {
    $count = $_COOKIE['count'] + 1;
} else {
    $count = 1;
}
setcookie('count', $count, time()+3600);
?>
