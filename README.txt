Editar con permisos de Administrador el siguiente archivo:
C:\Windows\System32\drivers\etc\hosts

Agregando al final del todo sin comillas y sustituyendo "midominio"
por el propio:
"127.0.0.1 www.midominio.com"
____________________________________________________________________
Verificar el archivo:
C:\xampp\apache\conf\httpd.conf

Que las siguientes lineas esten activadas(sin el simbolo #):
LoadModule rewrite_module modules/mod_rewrite.so
# Virtual hosts
Include conf/extra/httpd-vhosts.conf
____________________________________________________________________
Editar el siguiente archivo:
C:\xampp\apache\conf\extra\httpd-vhosts.conf

Colocar al final del todo sustituyendo "midominio"
por el propio:
<VirtualHost *:80>
    ##ServerAdmin webmaster@dummy-host2.example.com
    DocumentRoot "C:/xampp/htdocs/"
    ServerName localhost
    ##ErrorLog "logs/dummy-host2.example.com-error.log"
    ##CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/midominio/public"
    ServerName local.midominio.com
    ServerAlias 192.168.15.2
</VirtualHost>
_____________________________________________________________________
Donde ServerAlias equivale al ip del equipo servidor.
Para poder acceder desde cualquier equipo dentro de la
red local.
