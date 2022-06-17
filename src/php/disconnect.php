<?php
    session_start();
    session_unset(); //or unset($_SESSION);
    session_destroy();
    session_commit(); // or session_write_close();
    header("location: $_SERVER[HTTP_REFERER]");
?>