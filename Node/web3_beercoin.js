import { beercoinAbi } from './web3_beercoin_abi.js';

import Web3 from 'web3';

async function queryBeercoinBalance(contract, address) {
    // Query provider for token balance
    let balance = await contract.methods.balanceOf(address).call();

    // Query provider for token decimals
    let decimals = await contract.methods.decimals().call();

    // Insert the decimal point at the correct location and parse the new string as a float
    return parseFloat(balance.substr(0, balance.length - decimals) + "." + balance.substr(balance.length - decimals, decimals));
}

// Replace URL with yours provided by us
const web3 = new Web3('https://mainnet.infura.io/v3/e71bd195b7af48dbbcfcdfb3d822d712');
//                     http://mainnet.beerchain.technology/v1/SUBSCRIPTIONKEY

// The address points to the deployed Beercoin smart contract and is constant
const contract = new web3.eth.Contract(beercoinAbi, '0x7367A68039d4704f30BfBF6d948020C3B07DFC59');

// Replace address with the user's one
const beercoinBalance = await queryBeercoinBalance(contract, '0x5199Ca9cac93BCE0F6C4C9135F7165921A0E7973');  

console.log('Beercoin balance: ' + beercoinBalance);
