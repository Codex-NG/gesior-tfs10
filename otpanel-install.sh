#!/bin/bash

wget https://github.com/otservme/gesior-tfs10/archive/master.zip
rm -r /home/otserv/www;
unzip master.zip -d /home/otserv/;
mv /home/otserv/gesior-tfs10-master /home/otserv/www;
chown -R www-data.www-data /home/otserv;
echo "Pronto, instalado com sucesso!"

