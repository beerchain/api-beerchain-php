import Accounts from 'web3-eth-accounts';
import Utils from 'web3-utils';

function generateEthereumPrivateKey(accounts) {
    return accounts.create().privateKey;
}

function getAddressFromPrivateKey(accounts, privateKey) {
    return accounts.privateKeyToAccount(privateKey).address.toLowerCase();
}

function toChecksumAddress(address) {
    return Utils.toChecksumAddress(address);
}

const accounts = new Accounts();

// Store this in database
const privateKey = generateEthereumPrivateKey(accounts);

// Store this in database for convenience (optional)
const address = getAddressFromPrivateKey(accounts, privateKey);

// Display this to end users if desired
const checksumAddress = toChecksumAddress(address);

console.log('Private key: ' + privateKey);
console.log('Standard address: ' + address);
console.log('Checksum address: ' + checksumAddress);
