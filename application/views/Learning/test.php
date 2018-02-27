<?php

$str = "Hello World";
      $var = explode(" ", $str);

      $sql = "SELECT * From projects";

      $where = "WHERE";

      foreach($var as $condition) {

        $where .= $condition."lname LIKE '%$condition%' OR" ;


      }


      echo $sql." ".$where;



























?>
