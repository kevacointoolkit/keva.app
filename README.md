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


# bcmath
sudo apt-get install php-bcmath7.4
service apache2 reload
