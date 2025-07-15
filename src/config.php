<?php
$dotenv = parse_ini_file(__DIR__.'/../.env');
define('PAYSTACK_SECRET_KEY', $dotenv['PAYSTACK_SECRET_KEY']);
?>
