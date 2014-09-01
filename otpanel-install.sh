#!/bin/bash

wget https://github.com/otservme/gesior-tfs10/archive/master.zip
rm -rf /home/otserv/www/*;
unzip master.zip -d /home/otserv/;
cp -rf /home/otserv/gesior-tfs10-master/* /home/otserv/www;
chown -R www-data.www-data /home/otserv;
echo "Pronto, instalado com sucesso!"
