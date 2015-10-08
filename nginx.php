<?php include('includes/session_check.php');?>

<form method="POST" action="save.php" />
	<label> Dominio: </label>
        <div>
	       <input type="text" id="domain" name="domain" />
	</div>
	<label> Vhost: </label>
	<input type="submit" value="Aceptar" name="aceptar" />
	<div>

		<textarea id="vhost" name="vhost" rows="60" cols="100">server {

        #Escuchamos en el puerto
        listen 80;

        # Si lleva SSL activar estas directivas
        # SSL Configuration
        # listen 443;

        # ssl on;
        # ssl_certificate /var/ssl/$DOMAIN_REPLACE/server.crt;
        # ssl_certificate_key /var/ssl/$DOMAIN_REPLACE/server.key;
        # ssl_protocols SSLv3 TLSv1 TLSv1.1 TLSv1.2;
        # ssl_ciphers "HIGH:!aNULL:!MD5 or HIGH:!aNULL:!MD5:!3DES";
        # ssl_prefer_server_ciphers on;

        # Configuramos la carpeta del sitio
        root /var/www/$DOMAIN_REPLACE;

        # Seteamos el nombre del index
        index index.html index.htm index.php;

        # Seteamos los dominios
        server_name $DOMAIN_REPLACE www.$DOMAIN_REPLACE;

        location / {
                try_files $uri $uri/ /index.php?/$request_uri;
        }

        # Configuramos los errores segun response, activar si no se hace en CI
        #

        # error_page 404 /404.html;
        # error_page 500 502 503 504 /50x.html;
        # location = /50x.html {
        #       root /usr/share/nginx/html;
        # }

        location ~* \.php$ {
	        fastcgi_pass unix:/var/run/php5-fpm.sock;
	        fastcgi_intercept_errors on;
	        fastcgi_index index.php;
	        fastcgi_split_path_info ^(.+\.php)(.*)$;
	        include fastcgi_params;
	        fastcgi_param SCRIPT_FILENAME /var/www/$DOMAIN_REPLACE/$fastcgi_script_name;
	        fastcgi_buffers 8 16k;
	        fastcgi_buffer_size 32k;
        }

        # deny access to .htaccess files, if Apache's document root
        # concurs with nginx's one
        #

        location ~ /\.ht {
                deny all;
        }
}</textarea>

	</div>
</form>