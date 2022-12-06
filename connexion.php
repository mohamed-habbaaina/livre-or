<?php
session_start();
$login = $_SESSION['login'];
echo 'bonjour ' . $login;