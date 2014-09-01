#!/bin/bash

wget https://github.com/otservme/gesior-tfs10/archive/master.zip
rm -r /home/otserv/www;
unzip master.zip -d /home/otserv/www/;
cd /home/otserv/www;
mv gesior-tfs10-master/* ../;
rm gesior-tfs10-master -r;
chown -R www-data.www-data /home/otserv;
echo "Pronto, instalado com sucesso!"
