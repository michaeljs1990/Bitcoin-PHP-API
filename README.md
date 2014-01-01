Bitcoin-PHP-API
===============

Implementation in PHP for the bicoin rpc api.

1. add these files to your php project and include bitcoin.php wherever you want to use.

$username = "user";
$password = "pass";
$ip = "$ip";

$bitcoin = Bitcoin\BitcoinFactory::create($username, $password, $ip); // To start using lib
