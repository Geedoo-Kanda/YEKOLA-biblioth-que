<?php
session_start();
unset($_SESSION['online']);

header('Location: login.php');
  