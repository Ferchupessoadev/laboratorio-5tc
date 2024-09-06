Para crear un enrutador básico en Apache2 utilizando mod_rewrite, que te permitirá redirigir todas las peticiones hacia un único archivo (como index.php), sigue estos pasos:

1. Habilitar el módulo mod_rewrite:
   Apache necesita tener activado el módulo mod_rewrite para poder realizar la reescritura de URLs.

Ejecuta los siguientes comandos para habilitarlo:

```bash
sudo a2enmod rewrite

```

2. Configurar el archivo .htaccess:

3. Configurar el archivo .htaccess:
   Apache necesita que las directivas de reescritura estén definidas en un archivo .htaccess. Si aún no tienes uno, créalo en el directorio /var/www/html.

```bash
nano /var/www/html/.htaccess
```

En ese archivo, añade las siguientes reglas para redirigir todas las peticiones a un solo archivo (generalmente index.php):

```bash
# Activar RewriteEngine
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

Lo que hacen estas reglas:

- RewriteEngine On: Activa el motor de reescritura.
- RewriteCond %{REQUEST_FILENAME} !-f: Si el archivo solicitado no existe...
- RewriteCond %{REQUEST_FILENAME} !-d: ... y no es un directorio.
- RewriteRule ^(.\*)$ index.php [QSA,L]: Redirige la solicitud a index.php, pasando cualquier parámetro de la URL.

3. Permitir el uso de .htaccess en la configuración de Apache:
   Asegúrate de que el archivo de configuración de Apache permita el uso de .htaccess. Edita el archivo de configuración de Apache correspondiente a tu sitio web (por ejemplo, /etc/apache2/sites-available/000-default.conf o uno personalizado).

Busca o añade el siguiente bloque <Directory>:

```bash
<Directory /var/www/html/>
    AllowOverride All
</Directory>
```

Luego, reinicia Apache para que los cambios surtan efecto:

```bash
sudo systemctl restart apache2
```
