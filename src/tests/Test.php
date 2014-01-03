<?php

include '../bitcoin/BitcoinFactory.php';

//Lets see thouse errors
error_reporting(E_ALL);
ini_set("display_errors", 1);

$connection = Bitcoin\BitcoinFactory::create('bitcoinrpc', 'bitcoinrpcpassword'); ?>

<h1>Test Data</h1>

<? var_dump($connection->getinfo()); ?>