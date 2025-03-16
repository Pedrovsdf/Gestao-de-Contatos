<?php
//3.2.8 - New file
//3.3.0 - Modification of lines FcgidInitialEnv

$langues['fcgi_mode_link'] = 'Ayuda del modo FCGI';
$langues['fcgi_not_loaded'] = 'PHP no se puede usar en modo FCGI porque el módulo Apache fcgid_module no está cargado';
$langues['fcgi_mode_help'] = <<< 'FCGIEOT'
<h4>Cómo usar PHP en modo Fast CGI con Wampserver</h4>
El CGI (Interfaz de puerta de enlace común) define una forma en que un servidor web interactúa con programas externos de generación de contenido, que a menudo se denominan programas CGI o scripts CGI. Es una forma sencilla de poner contenido dinámico en su sitio web, utilizando cualquier lenguaje de programación con el que esté más familiarizado

<h5>- Solo una versión de PHP como módulo de Apache</h5>
Desde el principio, Wampserver carga PHP como un módulo de Apache:
  <code>LoadModule php_module "${INSTALL_DIR}/bin/php/php8.1.1/php8apache2_4.dll"</code>
lo que hace que todos los servidores virtuales, alias y proyectos usen la misma versión de PHP
Si cambia la versión de PHP a través del menú PHP de Wampmanager, esta nueva versión será utilizada en todas partes

<h5>- Varias versiones de PHP con modo FCGI</h5>
Desde Wampserver 3.2.8, es posible utilizar PHP en modo CGI, es decir, puede definir una versión de PHP diferente, cuyos complementos se hayan instalado previamente, para cada servidor virtual. Esto significa que el servidor virtual ya no está obligado a usar la misma versión de PHP

Apache fcgid_module (mod_fcgid.so) simplifica la implementación de CGI
La documentación la podrá encontrar aquí: <a href='https://httpd.apache.org/mod_fcgid/mod/mod_fcgid.html'>mod_fcgid</a>

<h5>- Requerimientos previos</h5>
- 1 Presencia del archivo mod_fcgid.so en la carpeta de módulos de Apache.
- 2 Presencia de la línea de carga del módulo en el archivo httpd.conf
  <code>LoadModule fcgid_module modules/mod_fcgid.so</code> (Not commented - No # at the beginning))
- 3 Presencia de las directivas de configuración comunes del módulo fcgid_module en el archivo httpd.conf
<code>
&lt;IfModule fcgid_module>
  FcgidMaxProcessesPerClass 300
  FcgidConnectTimeout 10
  FcgidProcessLifeTime 1800
  FcgidMaxRequestsPerProcess 0
  FcgidMinProcessesPerClass 0
  FcgidFixPathinfo 0
  FcgidZombieScanInterval 20
  FcgidMaxRequestLen 536870912
  FcgidBusyTimeout 120
  FcgidIOTimeout 120
  FcgidTimeScore 3
  FcgidPassHeader Authorization
  Define PHPROOT ${INSTALL_DIR}/bin/php/php
&lt;/IfModule>
</code>
Estos tres puntos 1, 2 y 3 se realizan automáticamente con la actualización de Wampserver 3.2.8

<h5>- Creando un servidor virtual FCGI</h5>
- Después de la actualización de Wampserver 3.2.8, la página http://localhost/add_vhost.php permite agregar un servidor virtual FCGI con toda sencillez
La elección de la versión de PHP a utilizar está limitada a las versiones de los complementos de PHP instalados en su Wampserver lo que evitará un error de versión de PHP
En efecto, declarar, en un servidor virtual, una versión de PHP inexistente en Wampserver generará un error de Apache y un "quiebre" de éste

- Si desea modificar un servidor local existente para agregar el modo FCGI con una versión de PHP existente que ya está en los complementos PHP de Wampserver, solo tiene que ir a la página http://localhost/add_vhost.php y ejecutar el formulario de modificación del servidor local para que sea capaz, en tres clics, de agregar el modo FCGI al servidor virtual, cambiar la versión de PHP o eliminar el modo FCGI
Será necesario actualizar Wampserver para que eso tenga efecto
Esta misma página http://localhost/add_vhost.php también le permite, a través del formulario de modificación de alias, agregar el modo FCGI a un alias existente, cambiar la versión de PHP o remover el modo FCGI, esto es siempre en tres clics

<h5>- Algunos detalles</h5>
Para agregar el modo FCGI a un servidor virtual existente, simplemente agregue las siguientes directivas antes del final de </VirtualHost> de ese servidor virtual:
<code>
  &lt;IfModule fcgid_module>
    Define FCGIPHPVERSION "7.4.27"
    FcgidInitialEnv PHPRC "${PHPROOT}${FCGIPHPVERSION}/php.ini"
    &lt;Files ~ "\.php$">
      Options +Indexes +Includes +FollowSymLinks +MultiViews +ExecCGI
      AddHandler fcgid-script .php
      FcgidWrapper "${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe" .php
    &lt;/Files>
  &lt;/IfModule>
</code>
La versión de PHP debe existir como un complemento de PHP en su servidor Wamp y podrá ser modificada
Por el contrario, removiendo estas líneas hace que el servidor virtual vuelva a la versión de PHP utilizada como módulo de Apache

Para alias, es un poco menos simple, debe agregar las líneas anteriores en dos partes, la primera parte:
<code>
&lt;IfModule fcgid_module>
  Define FCGIPHPVERSION "7.4.27"
  FcgidCmdOptions ${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe \
  InitialEnv PHPRC=${PHPROOT}${FCGIPHPVERSION}/php.ini
&lt;/IfModule>
</code>
antes de la directiva &lt;Directory...
La segunda parte:
<code>
&lt;IfModule fcgid_module>
  &lt;Files ~ "\.php$">
    Options +Indexes +Includes +FollowSymLinks +MultiViews +ExecCGI
    AddHandler fcgid-script .php
    FcgidWrapper "${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe" .php
  &lt;/Files>
&lt;/IfModule>
</code>
dentro del contexto <Directory...></Directory> para obtener, por ejemplo para cualquier alias, la siguiente estructura:
<code>
Alias /myalias "g:/www/mydir/"
&lt;IfModule fcgid_module>
  Define FCGIPHPVERSION "7.4.27"
  FcgidCmdOptions ${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe \
  InitialEnv PHPRC=${PHPROOT}${FCGIPHPVERSION}/php.ini
&lt;/IfModule>
&lt;Directory "g:/www/mydir/">
  Options Indexes FollowSymLinks
  AllowOverride all
  Require local
  &lt;IfModule fcgid_module>
    &lt;Files ~ "\.php$">
      Options +Indexes +Includes +FollowSymLinks +MultiViews +ExecCGI
      AddHandler fcgid-script .php
      FcgidWrapper "${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe" .php
    &lt;/Files>
  &lt;/IfModule>
&lt;/Directory>
</code>

FCGIEOT;

?>