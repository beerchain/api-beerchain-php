<?php

require_once 'vendor/autoload.php';
include_once 'web3_beercoin_abi.php';

use Web3\Web3;
use Web3\Contract;

function queryBeercoinBalance($contract, $address)
{  
    // Query provider for token balance
    $contract->call('balanceOf', $address, function ($e, $balanceBigInteger) use(&$balance) {
        $balance = $balanceBigInteger[0];
    });

    // Query provider for token decimals
    $contract->call('decimals', function ($e, $decimalsBigInteger) use(&$decimals) {
        $decimals = $decimalsBigInteger[0];
    });

    // Insert the decimal point at the correct location and parse the new string as a float
    return floatval(substr_replace($balance->toString(), '.', -intval($decimals->toString()), 0));
}

// Replace URL with yours provided by us
$web3 = new Web3('https://mainnet.infura.io/v3/e71bd195b7af48dbbcfcdfb3d822d712');
//                http://mainnet.beerchain.technology/v1/SUBSCRIPTIONKEY

// The address points to the deployed Beercoin smart contract and is constant
$contract = (new Contract($web3->provider, $beercoinAbi))->at('0x7367A68039d4704f30BfBF6d948020C3B07DFC59');

// Replace address by the user's one
$beercoinBalance = queryBeercoinBalance($contract, '0x5199Ca9cac93BCE0F6C4C9135F7165921A0E7973');  

echo 'Beercoin balance: '.$beercoinBalance.PHP_EOL;

?>
