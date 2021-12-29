# keva.app


For running keva.app, you need a php server, kevacoin wallet and setup few files. You can change your own datas like user/password/port.


# kevacoin.conf 


rpcuser=galaxy

rpcpassword=frontier

rpcport=9992

server=1

addressindex=1

txindex=1

rpcallowip=127.0.0.1

whitelist=127.0.0.1


# rpc.php


$grpcuser='galaxy';

$grpcpass='frontier';

$grpcportk='9992';


# bludit\bl-content\databases\site.php


"url": "https:\/\/keva.app\/bludit\/",


# keyword

PLAYER, IPv4 Address, Legend of Satoshi Player IP Restriction
RAVENCOIN, Ravencoin Address, Your Ravencoin address
CHIA, CHIA Address, Your Chia address
BITCOIN, Bitcoin Address, Your Bitcoin address
DOGECOIN, Dogecoin Address, Your Dogecoin address
MONERO, Monero Address, Your Monero address
ETHEREUM, ETH Address, Your ETH Address
OPENSEA, int, List n of your OpeanSea NFT's, req: ETHEREUM
RPGNFT, on/off, Legend of Satoshi NFTs
RPGKEY(1-9), string, Your RPG command/asset name/shortcode
ASSET, ravencoin asset list.
THEME, selection, your default https://keva.app/ theme
SORT, on/off, Sort your keys; ON=asc A-Z OFF=time
COUNTDOWN, datetime, Create countdown timer for https://keva.app/
ASSISTANT, string, Your assistant's name
TIA, kevacoin shortcode, the assistant will talk about that space contents.
BITDOGE, kevacoin shortcode, the assistant will talk about that space contents.
ANN, string, Announcement for your Bitdoge
TALK, shortcode, Shortcode for Bitdoge to read new content from
LIFE, time, How long Bitdge will be with you
IPFS, IPFS Gateway, IPFS Gateway for https://keva.app/ to use in loading your content
RANDOM, int, Display random number of keys when viewed through https://keva.app/
MP3, HTML, Enable click and play in https://keva.app/
MYSPACE, list of shortcodes, Your favorite shortcodes for https://keva.app/ to load
PIN, content, Pinned key content for https://keva.app/
MODEL, 1-66, Style for Tia on your namespace
