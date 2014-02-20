<?php

/**
 *  All methods of this class are derived from the bitcoin API
 * https://en.bitcoin.it/wiki/Original_Bitcoin_client/API_Calls_list
 * 
 * Author: Michael Schuett
 * Date: 12/29/2013
 * Updated: 2/18/2014
 */

namespace Bitcoin;

class Bitcoin
{

    //Set variables as found in bitcoin.conf
    private $bitcoin;

    function __construct(JsonRPCClient $rpc)
    {
        //Create connection once to reduce calls to server.
        $this->bitcoin = $rpc;
    }
    
    /**
     *  function getinfo()
     * Returns an object containing various state info.
     */
    public function getinfo()
    {
            return $this->bitcoin->getinfo();
    }

    /**
     *  function gethashespersec
     * Returns a recent hashes per second performance measurement while generating.
     */
    public function gethashespersec()
    {
            return $this->bitcoin->gethashespersec();
    }

    /**
     *  function getgenerate
     * Returns true or false whether bitcoind is currently generating hashes.
     */
    public function getgenerate()
    {
            return $this->bitcoin->getgenerate();
    }

    /**
     *  function getdifficulty
     * Returns the proof-of-work difficulty as a multiple of the minimum difficulty.
     */
    public function getdifficulty()
    {
        return $this->bitcoin->getdifficulty();
    }

    /**
     *  function getconnectioncount
     * Returns the number of connections to other nodes.
     */
    public function getconnectioncount()
    {
        return $this->bitcoin->getconnectioncount();
    }

    /**
     *  function getblocktemplate
     * Returns data needed to construct a block to work on. See BIP_0022 for more info on params.
     * 
     * Valid Params:
     *  $params = (array) (opt) key, value pairs as defined below.
     * 
     * Valid Pairs:
     *  See the following link for more info and all valid pairs.
     *  https://github.com/bitcoin/bips/blob/master/bip-0022.mediawiki#Reference_Implementation
     */
    public function getblocktemplate($params = null)
    {
        return isset($params) ? $this->bitcoin->getblocktemplate($params) : $this->bitcoin->getblocktemplate();
    }

    /**
     *  function getnewaddress
     * Returns a new bitcoin address for receiving payments. If [account] is specified 
     * (recommended), it is added to the address book so payments received with the 
     * address will be credited to [account].
     * 
     * https://en.bitcoin.it/wiki/Accounts_explained
     * By default all accounts are set to an empty string if you would like to
     * create a group of accounts seperate from the rest create them all using
     * the same string. Read the link above for limitations.
     */
    public function getnewaddress($account = '')
    {
        return $this->bitcoin->getnewaddress($account);
    }

    /**
     *  function getaccount
     * Returns the account associated with the given address.
     * 
     * Valid Params:
     *  $address = (String) Valid bitcoin address.
     */
    public function getaccount($address)
    {
        return $this->bitcoin->getaccount($address);
    }

    /**
     *  function getblockhash
     * Returns hash of block in best-block-chain at <index>; index 0 is the genesis block
     * 
     * Valid Params:
     *  $num = (int) must be less than current chain length.
     */
    public function getblockhash($num = 0)
    {
        return $this->bitcoin->getblockhash($num);
    }

    /**
     *  function getblockcount
     * Returns the number of blocks in the longest block chain.
     */
    public function getblockcount()
    {
        return $this->bitcoin->getblockcount();
    }

    /**
     *  function getblock
     * Returns information about the block with the given hash.
     * 
     * Valid Params:
     *  $hash = (String) Valid block hash.
     */
    public function getblock($hash)
    {
        return $this->bitcoin->getblock($hash);
    }

    /**
     *  function getbestblockhash
     * Recent git checkouts only Returns the hash of the best (tip) block in the longest block chain.
     */
    public function getbestblockhash()
    {
        return $this->bitcoin->getbestblockhash();
    }

    /**
     *  function getbalance
     * If [account] is not specified, returns the server's total available balance.
     * If [account] is specified, returns the balance in the account.
     * 
     * Valid Params:
     *  $account = (String) Valid account name.
     *  $confs = (int) number of confs required.
     */
    public function getbalance($account = '', $confs = 0)
    {
        return $this->bitcoin->getbalance($account, $confs);
    }

    /**
     *  function getaddressesbyaccount
     * Returns the list of addresses for the given account.
     */
    public function getaddressesbyaccount($account = '')
    {
        return $this->bitcoin->getaddressesbyaccount($account);
    }

    /**
     *  function getaddednodeinfo
     * version 0.8 Returns information about the given added node, or all added nodes
     * (note that onetry addnodes are not listed here) If dns is false, only a list of added 
     * nodes will be provided, otherwise connected information will also be available.
     * 
     * Valid Params:
     *  $bool = (boolean) display connected info?
     *  $params = (String) Name of added node, bool must be set to true.
     * 
     * Example:
     *  getaddednodeinfo(true, 'bitcoin.es');
     */
    public function getaddednodeinfo($bool, $params)
    {
        return $this->bitcoin->getaddednodeinfo($bool, $params);
    }

    /**
     *  function addnode
     * version 0.8 Attempts add or remove <node> from the addnode list or try a connection to <node> once.
     * 
     * Valid Params:
     *  $node = (String) ip or url.
     *  $opts = (String) accepts add, remove, or onetry.
     */
    public function addnode($node, $opts = 'add')
    {
        return $this->bitcoin->addnode($node, $opts);
    }

    /**
     *  function getaccountaddress
     * Returns the current bitcoin address for receiving payments to this account.
     * 
     * Valid Params:
     *  $account = (String) Account name.
     */
    public function getaccountaddress($account = '')
    {
        return $this->bitcoin->getaccountaddress($account);
    }

    /**
     *  function encryptwallet
     * Encrypts the wallet with <passphrase>.
     * 
     * Valid Params:
     *  $passphrase = (String) valid password or sentence.
     */
    public function encryptwallet($passphrase)
    {
        return $this->bitcoin->encryptwallet($passphrase);
    }

    /**
     * function dumpprivkey
     * Reveals the private key corresponding to <bitcoinaddress>.
     * 
     * Valid Paramas:
     *  $address = (String) valid bitcoin address.
     */
    public function dumpprivkey($address)
    {
        return $this->bitcoin->dumpprivkey($address);
    }

    /**
     * function decoderawtransaction
     * version 0.7 Produces a human-readable JSON object for a raw transaction.
     * 
     * Valid Params:
     *  $hex = (String) hex string
     * 
     * See https://bitcointalk.org/index.php?topic=218447.msg2303731#msg2303731
     */
    public function decoderawtransaction($hex)
    {
        return $this->bitcoin->decoderawtransaction($hex);
    }

    /**
     * function createrawtransaction
     * version 0.7 Creates a raw transaction spending given inputs.
     * 
     * Valid Params:
     *  $transactions = (array) input transactions
     *  $amount = (array) contains address to pay and amount
     * 
     * See https://bitcointalk.org/index.php?topic=218447.msg2303731#msg2303731
     * 
     * TODO: Improve documentation
     */
    public function createrawtransaction($transactions, $amount)
    {
        return $this->bitcoin->createrawtransaction($transactions, $amount);
    }

    /**
     * function createmultisig
     * Creates a multi-signature address and returns a json object.
     * 
     * Valid Params:
     *  $num = (int) number of keys in sig.
     *  $keys = (array) array containg all the keys.
     *  
     * See https://bitcointalk.org/index.php?topic=270204.0
     */
    public function createmultisig($num, $keys)
    {
        return $this->bitcoin->createmultisig($num, $keys);
    }

    /**
     * function backupwallet
     * Safely copies wallet.dat to destination, which can be a directory or a path with filename.
     * 
     * Valid Params:
     *  $path = (String) directory or file to back up to.
     */
    public function backupwallet($path)
    {
        return $this->bitcoin->backupwallet($path);
    }

    /**
     * function addmultisigaddress
     * Add a nrequired-to-sign multisignature address to the wallet. Each key is
     * a bitcoin address or hex-encoded public key. If [account] is specified, 
     * assign address to [account].
     * 
     * Valid Params:
     *  $num = (int) number of bitcoin keys.
     *  $keys = (array) valid bitcoin keys.
     *  $account = (String) (opt) assign to account.
     */
    public function addmultisigaddress($num, $keys, $account = null)
    {
        return isset($account) ? $this->bitcoin->addmultisigaddress($num, $keys, $account) : $this->bitcoin->addmultisigaddress($num, $keys);
    }

    /**
     * function getmininginfo
     * Returns an object containing mining-related information: blocks,
     * currentblocksize, currentblocktx, difficulty, errors, generate,
     * genproclimit, hashespersec, pooledtx, testnet
     */
    public function getmininginfo()
    {
        return $this->bitcoin->getmininginfo();
    }

    /**
     * function getpeerinfo
     * version 0.7 Returns data about each connected node.
     */
    public function getpeerinfo()
    {
        return $this->bitcoin->getpeerinfo();
    }

    /**
     * function getrawchangeaddress
     * recent git checkouts only Returns a new Bitcoin address, for receiving
     * change. This is for use with raw transactions, NOT normal use.
     * 
     * Valid Params:
     *  $account = (String) (otp) account that change address is set for. 
     */
    public function getrawchangeaddress($account = null)
    {
        return isset($account) ? $this->bitcoin->getrawchangeaddress($account) : $this->bitcoin->getrawchangeaddress();
    }

    /**
     * function getrawmempool
     * version 0.7 Returns all transaction ids in memory pool
     */
    public function getrawmempool()
    {
        return $this->bitcoin->getrawmempool();
    }

    /**
     * function getrawtransaction
     * version 0.7 Returns raw transaction representation for given transaction id.
     * 
     * Valid Params:
     *  $transaction = (String) transactionid.
     *  $verbos = (int) level of reporting.
     */
    public function getrawtransaction($transaction, $verbos = 0)
    {
        return $this->bitcoin->getrawtransaction($transaction, $verbos);
    }

    /**
     * function getreceivedbyaccount
     * Returns the total amount received by addresses with [account] in transactions 
     * with at least [minconf] confirmations. If [account] not provided return 
     * will include all transactions to all accounts. (version 0.3.24)
     * 
     * Valid Params:
     *  $account = (String) Account name.
     *  $confs = (int) number of confimations.
     */
    public function getreceivedbyaccount($account = '' , $confs = 1)
    {
        return $this->bitcoin->getreceivedbyaccount($account, $confs);
    }

    /**
     * function getreceivedbyaddress
     * Returns the amount received by <bitcoinaddress> in transactions with at least 
     * [minconf] confirmations. It correctly handles the case where someone has sent to 
     * the address in multiple transactions. Keep in mind that addresses are only ever 
     * used for receiving transactions. Works only for addresses in the local wallet, 
     * external addresses will always show 0.
     * 
     * Valid Params:
     *  $address = (String) valid bitcoin address.
     *  $confs = (int) number of confimations.
     */
    public function getreceivedbyaddress($address , $confs = 1)
    {
        return $this->bitcoin->getreceivedbyaddress($address, $confs);
    }

    /**
     * function gettransaction
     * Returns an object about the given transaction containing:
     * "amount" : total amount of the transaction
     * "confirmations" : number of confirmations of the transaction
     * "txid" : the transaction ID
     * "time" : time associated with the transaction[1].
     * "details" - An array of objects containing:
     * "account", "address", "category", "amount", "fee"
     * 
     * Valid Params:
     *  $transaction = (String) valid transaction.
     * 
     * To get transactions outside of your wallet you will need to follow this.
     * http://bitcoin.stackexchange.com/questions/11759/get-non-wallet-transactions-using-bitcoin-rpc-gettransaction
     */
    public function gettransaction($transaction)
    {
        return $this->bitcoin->gettransaction($transaction);
    }

    /**
     * function gettxout
     * Returns details about an unspent transaction output (UTXO)
     * 
     * Valid Params:
     *  $transaction = (String) Transaction ID.
     *  $num = (int) vout value (see post below for more info).
     *  $mempool = (boolean) include mempool or not.
     * 
     * http://bitcoin.stackexchange.com/questions/19651/understanding-vout
     */
    public function gettxout($transaction, $num, $mempool = true)
    {
        return $this->bitcoin->gettxout($transaction, $num, $mempool);
    }

    /**
     * function gettxoutsetinfo
     * Returns statistics about the unspent transaction output (UTXO) set.
     * 
     * Seems to cause a 3-4 second hangup when run.
     * TODO: testing needed to find reason for hangup.
     */
    public function gettxoutsetinfo()
    {
        return $this->bitcoin->gettxoutsetinfo();
    }

    /**
     * function getwork
     * If [data] is not specified, returns formatted hash data to work on:
     * "midstate" : precomputed hash state after hashing the first half of the data
     * "data" : block data
     * "hash1" : formatted hash buffer for second hash
     * "target" : little endian hash target
     * If [data] is specified, tries to solve the block and returns true if it was successful.
     * 
     * Valid Params:
     *  $data = (array) key value pairs.
     * 
     * https://en.bitcoin.it/wiki/Getwork
     */
    public function getwork($data = null)
    {
        return isset($data) ? $this->bitcoin->getwork($data) : $this->bitcoin->getwork();
    }

    /**
     * function help
     * List commands, or get help for a command.
     * 
     * Valid Params:
     *  $help = (String) valid bitcoind command.
     */
    public function help($cmd)
    {
        return $this->bitcoin->help($cmd);
    }

    /**
     * function importprivkey
     * Adds a private key (as returned by dumpprivkey) to your wallet. This may 
     * take a while, as a rescan is done, looking for existing transactions. 
     * Optional [rescan] parameter added in 0.8.0.
     * 
     * Valid Params:
     *  $privkey = (String) private key to import.
     *  $label = (String) label for imported key.
     *  $rescan = (boolean) rescan wallet, if not the key will not be added until
     *            the wallet has been rescan.
     * 
     * Note: rescan can take some time to complete.
     */
    public function importprivkey($privkey, $label = null, $rescan = true)
    {
        return isset($label) ? $this->bitcoin->importprivkey($privkey, $label, $rescan) : $this->bitcoin->importprivkey($privkey);
    }

    /**
     * function keypoolrefill
     * Fills the keypool, requires wallet passphrase to be set.
     */
    public function keypoolrefill()
    {
        return $this->bitcoin->keypoolrefill();
    }

    /**
     * function listaccounts
     * Returns Object that has account names as keys, account balances as values.
     * 
     * Valid Paramas:
     *  $confs = (int) number confs required to be shown.
     */
    public function listaccounts($confs = 1)
    {
        return $this->bitcoin->listaccounts($confs);
    }

    /**
     * function listaddressgroupings
     * version 0.7 Returns all addresses in the wallet and info used for coincontrol.
     */
    public function listaddressgroupings()
    {
        return $this->bitcoin->listaddressgroupings();
    }

    /**
     * function listreceivedbyaccount
     * Returns an array of objects containing:
     * "account" : the account of the receiving addresses
     * "amount" : total amount received by addresses with this account
     * "confirmations" : number of confirmations of the most recent transaction included
     * 
     * Valid Params:
     *  $confs = (int) number of confirmations required.
     *  $empty = (boolean) include empty in list.
     * 
     */
    public function listreceivedbyaccount($confs = 1, $empty = false)
    {
        return $this->bitcoin->listreceivedbyaccount($confs, $empty);
    }

    /**
     * function listreceivedbyaddress
     * Returns an array of objects containing:
     * "address" : receiving address
     * "account" : the account of the receiving address
     * "amount" : total amount received by the address
     * "confirmations" : number of confirmations of the most recent transaction included
     * To get a list of accounts on the system, execute bitcoind listreceivedbyaddress 0 true
     * 
     * Valid Params: 
     *  $confs = (int) number of confirmations required.
     *  $empty = (boolean) include empty in list.
     */
    public function listreceivedbyaddress($confs = 1, $empty = false)
    {
        return $this->bitcoin->listreceivedbyaddress($confs, $empty);
    }

    /**
     * function listsinceblock
     * Get all transactions in blocks since block [blockhash], or all transactions if omitted.
     * 
     * Valid Params:
     *  $blockhash = (String) block hash.
     *  $confs = (int) taget number of confimations.
     * 
     * Note: return your transactions not all.
     */
    public function listsinceblock($blockhash = null, $confs = 1)
    {
        return isset($blockhash) ? $this->bitcoin->listsinceblock($blockhash, $confs) : $this->bitcoin->listsinceblock();
    }

    /**
     * function listtransactions
     * Returns up to [count] most recent transactions skipping the first [from] 
     * transactions for account [account]. If [account] not provided will return 
     * recent transaction from all accounts.
     * 
     * Valid Params:
     *  $account = (String) account to pull data form.
     *  $count = (int) number to return.
     *  $from = (int) transaction num to start at.
     */
    public function listtransactions($account = null, $count = 10, $from = 0)
    {
        return isset($account) ? $this->bitcoin->listtransactions($account, $count, $from) : $this->bitcoin->listtransactions();
    }

    /**
     * function listunspent
     * version 0.7 Returns array of unspent transaction inputs in the wallet.
     * 
     * Valid Params:
     *  $minconf = (int) only show transaction with over x confs.
     *  $maxconf = (int) only show transactions with under x confs.
     */
    public function listunspent($minconf = 1, $maxconf = 999999)
    {
        return $this->bitcoin->listunspent($minconf, $maxconf);
    }

    /**
     * function listlockunspent
     * version 0.8 Returns list of temporarily unspendable outputs
     */
    public function listlockunspent()
    {
        return $this->bitcoin->listlockunspent();
    }

    /**
     * function lockunspent
     * version 0.8 Updates list of temporarily unspendable outputs
     * 
     * Valid Params:
     *  $lock = (boolean) chose to lock or unlock included objects.
     *  $objects = (array) key value pairs more below.
     * 
     * Note: Read rpcwallet.cpp line 1725 for more info.
     * TODO: Provide more documentation.
     */
    public function lockunspent($lock, $objects = NULL)
    {
        return isset($objects) ? $this->bitcoin->lockunspent($lock, $objects) : $this->bitcoin->lockunspent($lock);
    }

    /**
     * function move
     * Move from one account in your wallet to another
     * 
     * Valid Params:
     *  $from = (String) account bitcoin is in.
     *  $to = (String) account to send bitcon to.
     *  $amount = (float) amount to send.
     *  $minconf = (int) min number of confs required to move.
     *  $comments = (String) memo for yourself.
     */
    public function move($from, $to, $amount, $minconf = 1, $comment = '')
    {
        return $this->bitcoin->move($from, $to, $amount, $minconf, $comment);
    }

    /**
     * function sendfrom
     * <amount> is a real and is rounded to 8 decimal places. Will send the given 
     * amount to the given address, ensuring the account has a valid balance 
     * using [minconf] confirmations. Returns the transaction ID if 
     * successful (not in JSON object).
     * 
     * Valid Params:   
     *  $from = (String) Account to send from.
     *  $address = (String) address to send to.
     *  $amount = (float) amount to send.
     *  $minconf = (int) ensure number of confs before sending.
     *  $comment = (String) comment for your records.
     *  $to_comment = (String) comment for recipient.
     */
    public function sendfrom($from, $address, $amount, $minconf = 1, $comment = '', $to_comment = '')
    {
        return $this->bitcoin->sendfrom($from, $address, $amount, $minconf, $comment, $to_comment);
    }

    /**
     * function sendmany
     * amounts are double-precision floating point numbers
     * 
     * Valid Params:
     *  $from = (String) account to send from.
     *  $to = (array) key value pair of account => amount.
     *  $minconf = (int) ensure number of confs before sending.
     *  $comment = (String) Comment for self.
     */
    public function sendmany($from, $to, $minconf = 1, $comment = '')
    {
        return $this->bitcoin->sendmany($from, $to, $minconf, $comment);
    }

    /**
     * function sendrawtransaction
     * version 0.7 Submits raw transaction (serialized, hex-encoded) to local node and network.
     * 
     * Valid Params:
     *  $hex = (String) Hex encoded transactions.
     * 
     * Note: more here https://en.bitcoin.it/wiki/Raw_Transactions
     */
    public function sendrawtransaction($hex)
    {
        return $this->bitcoin->sendrawtransaction($hex);
    }

    /**
     * function sendtoaddress
     * <amount> is a real and is rounded to 8 decimal places. Returns the 
     * transaction ID <txid> if successful.
     * 
     * Valid Params:
     *  $address = (String) address to send from.
     *  $amount = (float) amount to send.
     *  $comment = (String) comment for records.
     *  $comment_to = (String) comments for recipient.
     */
    public function sendtoaddress($address, $amount, $comment = '', $comment_to = '')
    {
        return $this->bitcoin->sendtoaddress($address, $amount, $comment, $comment_to);
    }

    /**
     * function setaccount
     * Sets the account associated with the given address. Assigning address 
     * that is already assigned to the same account will create a new address 
     * associated with that account.
     * 
     * Valid Params:
     *  $address = (String) bitcoin address.
     *  $account = (String) account to associate address with.
     */
    public function setaccount($address, $account)
    {
        return $this->setaccount($address, $account);
    }

    /**
     * function setgenerate
     * <generate> is true or false to turn generation on or off. Generation is 
     * limited to [genproclimit] processors, -1 is unlimited.
     * 
     * Valid Params:
     *  $gen = (boolean) turn generation on or of.
     *  $limit = (int) limit process, -1 is unlimited.
     */
    public function setgenerate($gen, $limit = -1)
    {
        return $this->bitcoin->setgenerate($gen, $limit);
    }

    /**
     * function settxfee
     * <amount> is a real and is rounded to the nearest 0.00000001
     * 
     * Valid Params:
     *  $amount = (float) amount to pay when sending transaction.
     */
    public function settxfee($amount)
    {
        return $this->bitcoin->settxfee($amount);
    }

    /**
     * function signmessage
     * Sign a message with the private key of an address.
     * 
     * Valid Params:
     *  $address = (String) valid bitcoin address.
     *  $message = (String) message to sign.
     * 
     * Note: for usage see http://bitcoin.stackexchange.com/questions/3337/what-are-the-safety-guidelines-for-using-the-sign-message-feature/3339#3339
     */
    public function signmessage($address, $message)
    {
        return $this->bitcoin->signmessage($address, $message);
    }

    /**
     * function signrawtransaction
     * version 0.7 Adds signatures to a raw transaction and returns the resulting raw transaction.
     * 
     * Valid Params:
     *  $hex = (String) Raw transaction hex.
     *  $transactions = (array) Transaction containging key value pair.
     *  $privkey = (array) Private key to sign transaction with
     * 
     * Note: For key value pairs to set for $transactions see signrawtransaction on
     * https://en.bitcoin.it/wiki/Original_Bitcoin_client/API_calls_list
     * 
     * TODO: improve documentations. Provide example.
     */
    public function signrawtransaction($hex, $transactions = null, $privkey = null)
    {
        return isset($transactions) ? $this->bitcoin->signrawtransaction($hex, $transactions, $privkey) : $this->bitcoin->signrawtransaction($hex);
    }

    /**
     * function stop
     * Stop bitcoin server
     */
    public function stop()
    {
        return $this->bitcoin->stop();
    }

    /**
     * function submitblock
     * Attempts to submit new block to network.
     * 
     * Valid Params:
     *  $hex = (String) hex of block you want to submit.
     *  $params = (array) Ignored currently.
     * 
     * Note: See http://bitcoin.stackexchange.com/questions/8084/i-built-a-miner-got-a-hash-block-now-what-where-do-i-send-it
     * for more info on this subject. $params currently ignored.
     */
    public function submitblock($hex, $params = null)
    {
        return isset($params) ? $this->bitcoin->submitblock($hex, $params) : $this->bitcoin->submitblock($hex);
    }

    /**
     * function validateaddress
     * Return information about <bitcoinaddress>.
     * 
     * Valid Params:
     *  $address = (String) valid bitcoin address.
     */
    public function validateaddress($address)
    {
        return $this->bitcoin->validateaddress($address);
    }

    /**
     * function verifymessage
     * Verify a signed message.
     * 
     * Valid Params:
     *  $address = (String) address of original message.
     *  $sig = (String) Signiture of original message.
     *  $message = (String) message sent with address.
     * 
     * Note: See https://bitcointalk.org/index.php?topic=70911.0
     */
    public function verifymessage($address, $sig, $message)
    {
        return $this->bitcoin->verifymessage($address, $sig, $message);
    }

    /**
     * function walletlock
     * Removes the wallet encryption key from memory, locking the wallet. After 
     * calling this method, you will need to call walletpassphrase again before 
     * being able to call any methods which require the wallet to be unlocked.
     */
    public function walletlock()
    {
        return $this->bitcoin->walletlock();
    }

    /**
     * function walletpassphrase
     * Stores the wallet decryption key in memory for <timeout> seconds.
     * 
     * Valid Params:
     *  $passphrase = (String) phrase used to lock wallet.
     *  $timeout = (int) time in seconds to hold open for.
     */
    public function walletpassphrase($passphrase, $timeout)
    {
        return $this->bitcoin->walletpassphrase($passphrase, $timeout);
    }

    /**
     * function walletpassphrasechange
     * Changes the wallet passphrase from <oldpassphrase> to <newpassphrase>.
     * 
     * Valid Params:
     *  $old = (String) current passphrase.
     *  $new = (String) passphrase to change to.
     */
    public function walletpassphrasechange($old, $new)
    {
        return $this->bitcoin->walletpassphrasechange($old, $new);
    }

}
