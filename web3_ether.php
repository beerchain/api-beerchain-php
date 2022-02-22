<?php

require_once 'vendor/autoload.php';

use Web3\Web3;
use Web3\Utils;

function queryEtherBalance($web3, $address)
{
    // Query provider for balance
    $web3->eth->getBalance($address, function ($e, $b) use(&$balance) {
        $balance = $b;
    });

    // Convert the retrieved wei balance to gwei so it is small enough to be parsed by floatval
    list($bnq, $bnr) = Utils::toEther($balance, 'gwei');

    // Convert the gwei balance to ether with decimal places
    return floatval($bnq->toString()) / 1000000000;
}

// Replace URL with yours provided by us
$web3 = new Web3('https://mainnet.infura.io/v3/e71bd195b7af48dbbcfcdfb3d822d712');

// Replace address by the user's one
$etherBalance = queryEtherBalance($web3, '0x5199Ca9cac93BCE0F6C4C9135F7165921A0E7973');

echo 'Ether balance: '.$etherBalance.PHP_EOL;

?>