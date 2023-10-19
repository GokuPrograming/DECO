<?php
class Alert{
    function alert($message) {

      echo '<script>alert("' . $message . '");</script>';
    }
  }
?>