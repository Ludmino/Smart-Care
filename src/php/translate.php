<?php
if(isset($_COOKIE['lang'])){
    include "../Vue/lang_".$_COOKIE['lang'].".php";
   }else{
    include "../Vue/lang_fr.php";
   }
?>