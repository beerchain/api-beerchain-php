<?php

require_once 'vendor/autoload.php';

use kornrunner\Ethereum\Address;
use Web3\Utils;

function generateEthereumPrivateKey()
{
    return (new Address())->getPrivateKey();
}

function getAddressFromPrivateKey($privateKey)
{
    return '0x'.(new Address($privateKey))->get();
}

function toChecksumAddress($address)
{
    return Utils::toChecksumAddress($address);
}

// Store this in database
$privateKey = generateEthereumPrivateKey();

// Store this in database for convenience (optional)
$address = getAddressFromPrivateKey($privateKey);

// Display this to end users if desired
$checksumAddress = toChecksumAddress($address);

echo 'Private key: '.$privateKey.PHP_EOL;
echo 'Standard address: '.$address.PHP_EOL;
echo 'Checksum address: '.$checksumAddress;

?>