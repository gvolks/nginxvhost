#!/bin/bash
exit if [ ! -f tmp/$1 ]; then
	echo "El sitio no existe"
	exit
fi

mv tmp/$1 /etc/nginx/sites-available/$1
echo  $1 "ha sido creado correctamente"
