<?php
if (isset($_GET["result"])) {
    if ($_GET["result"] == 0) {
        echo(''._AccountRes0);
    }
    if ($_GET["result"] == 1) {
        echo(''._AccountRes1);
    }
    if ($_GET["result"] == 2) {
      echo(''._AccountRes2);
    }
    if ($_GET["result"] == 3) {
      echo(''._AccountRes3);
    }
  }
?>