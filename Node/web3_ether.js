import Web3 from 'web3';

async function queryEtherBalance(web3, address) {
    // Query provider for balance
    let balance = await web3.eth.getBalance(address);

    // Convert the retrieved Wei balance to Ether
    let balanceInEther = web3.utils.fromWei(balance);

    // Convert the Ether balance to a float value
    return parseFloat(balanceInEther);
}

// Replace URL with yours provided by us
const web3 = new Web3("https://mainnet.infura.io/v3/e71bd195b7af48dbbcfcdfb3d822d712");
//                     http://mainnet.beerchain.technology/v1/SUBSCRIPTIONKEY

// Replace address by the user's one
const etherBalance = await queryEtherBalance(web3, '0x5199Ca9cac93BCE0F6C4C9135F7165921A0E7973');

console.log('Ether balance: ' + etherBalance);
