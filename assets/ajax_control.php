<?php
  session_start();

  $_SESSION['manager'] = $_POST['postres'];
  $_SESSION['counter'] = $_POST['postcout'];

  echo $_POST['postres'];
 ?>
