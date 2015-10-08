#!/bin/bash
if [ ! -f /etc/nginx/sites-enabled/$1 ]; then
	echo "El sitio no existe"
	exit
fi

rm -r /etc/nginx/sites-avaiable/$1
rm -r /etc/nginx/sites-enabled/$1

echo "Sitio " $1 "eliminado"
nginx -s reload
echo  "La configuración del nginx fue reiniciada"
