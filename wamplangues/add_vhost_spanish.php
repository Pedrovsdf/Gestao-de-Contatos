<?php
//3.1.1 - NotwwwDir
//3.1.3 - VirtualHostPortNone
//3.1.4 - txtTLDdev
//3.1.9 - VirtualHostName modified - Accept diacritical characters (IDN)
//3.2.6 - HoweverWamp
//3.2.8 - phpNotExists - VirtualHostPhpFCGI - modifyForm - modifyVhost - modAliasForm
//      - modifyAlias - StartAlias - ModifiedAlias - NoModifyAlias - HoweverAlias
//  modified: VirtualHostPort (%s replaced by below ) - Start - VirtualCreated - However - HoweverWamp
//  array $langues_help added.
//3.3.0 - Modification of lines FcgidInitialEnv
//3.3.2 - Suppress $langues[''VirtualSubMenuOn']

$langues = array(
	'langue' => 'Español',
	'locale' => 'español',
	'addVirtual' => 'Agregar un servidor virtual',
	'backHome' => 'Volver a la página de inicio',
	'VirtualSubMenuOn' => 'El elemento del submenú <code>Servidor virtual</code> debe establecerse en (Activo) en la <code>Configuración de Wamp</code> haciendo clic derecho en el menú, luego vuelva a cargar esta página',
	'UncommentInclude' => 'Descomente <small>(Suprimir #)</small> la línea <code>#Include conf/extra/httpd-vhosts.conf</code><br>en el archivo %s',
	'FileNotExists' => 'El archivo <code>%s</code> no existe',
	'txtTLDdev' => 'El nombre del servidor %s usa el TLD %s que está monopolizado por los navegadores web. Use otro TLD (por ejemplo, podrá utilizar .test)',
	'FileNotWritable' => 'El archivo <code>%s</code> no se pudo escribir',
	'DirNotExists' => '<code>%s</code> no existe o no es un directorio',
	'NotwwwDir' => 'La carpeta <code>%s</code> está reservada para "localhost". Utilice otra carpeta',
	'NotCleaned' => 'El archivo <code>%s</code> no se ha limpiado<br>Quedan ejemplos de servidor virtual como: dummy-host.example.com',
	'NoVirtualHost' => 'No se ha definido un servidor virtual en <code>%s</code><br>Debe tener al menos el servidor virtual para localhost',
	'NoFirst' => 'El primer servidor virtual debe ser <code>localhost</code> en el archivo <code>%s</code>',
	'ServerNameInvalid' => 'El nombre del servidor <code>%s</code> no es válido',
	'LocalIpInvalid' => 'La IP local <code>%s</code> no es válida',
	'VirtualHostName' => 'Nombre del <code>hospedador virtual</code> sin espacio - y sin guión bajo(_) ',
	'VirtualHostFolder' => 'Complete la <code>ruta</code> a la <code>carpeta</code> del proyecto del servidor virtual <i>Ejemplos: C:/wamp/www/projeto/ o E:/www/sitio1/</i> ',
	'VirtualHostIP' => '<code class="option">Si</code> desea utilizar un servidor virtual por IP: <code class="option">IP local</code> 127.x.y.z ',
	'VirtualHostPhpFCGI' => '<code class="option">Si</code> desea utilizar PHP en modo FCGI <code class="option">Versiones aceptadas</code> abajo ',
	'VirtualHostPort' => '<code class="option">Si</code> desea utilizar un "Puerto de atención" que no sea el predeterminado <code class="option">Puertos aceptados</code> abajo ',
	'VirtualHostPortNone' => 'Si desea utilizar un "Puerto de atención" que no sea el predeterminado, debe agregar un puerto de atención a Apache haciendo clic derecho el el botón en Herramientas ',
	'VirtualAlreadyExist' => 'El nombre del servidor <code>%s</code> ya existe',
	'VirtualIpAlreadyUsed' => 'La IP local <code>%s</code> ya existe',
	'VirtualPortNotExist' => 'El puerto <code>%s</code> no es un "Puerto de atención" de Apache',
	'VirtualPortExist' => 'El puerto <code>%s</code> es el "Puerto de atención" predeterminado de Apache y no debe ser mencionado',
	'VirtualHostExists' => 'El servidor virtual ya ha sido definido:',
	'Start' => 'Iniciar la creación o modificación del servidor virtual (Esto puede demorar un tiempo...)',
	'StartAlias' => 'Iniciar la modificación del alias',
	'GreenErrors' => 'Los errores enmarcados en verde se pueden corregir automáticamente',
	'Correct' => 'Iniciar la corrección automática de errores sobre le margen del panel verde',
	'NoModify' => 'El archivo <code>httpd-vhosts.conf</code> o <code>hosts</code> no han podido ser modificados',
	'NoModifyAlias' => 'El alias no podo ser modificado.',
	'VirtualCreated' => 'Los archivos han sido modificados. El servidor virtual <code>%s</code> ha sido creado o modificado',
	'ModifiedAlias' => 'El alias <code>%s</code> ha sido modificado',
	'CommandMessage' => 'Mensajes de la consola para actualizar DNS:',
	'However' => 'Porás agregar o modificar otro servidor virtual validando "Agregar un servidor virtual".<br>Sin embargo, para que wampmanager (Apache) tenga en cuenta este servidor locale, debe ejecutar el elemento <br><code>Reiniciar DNS</code><br>desde el menú de herramientas, haciendo clic derecho en el icono de wampmanager</i>',
	'HoweverAlias' => 'Porás modificar otro alias validando "Agregar un servidor virtual".<br>Sin embargo, para que Wampmanager (Apache) tenga en cuenta estos alias modificados, debe ejecutar el elemento <br><code>Reiniciar DNS</code><br>desde el menú de herramientas, haciendo clic derecho en el icono de wampmanager</i>',
	'HoweverWamp' => 'Se ha tenido en cuenta el servidor virtual creado o modificado por Apache<br>Porás agregar o modificar otro servidor virtual validando "Agregar un servidor virtual"<br>Podrá comenzar a trabajar en este nuevo servidor virtual si lo desea<br>Pero para que los menús de Wampmanager tengan en cuenta estos nuevos servidores virtuales, debe iniciar el elemento <br><code>Actualizar</code><br>desde el menú contextual del icono de Wampmanager</i>',
	'suppForm' => 'Eliminar formulario del servidor virtual',
	'suppVhost' => 'Eliminar servidor virtual',
	'modifyForm' => 'Modificar formulario del servidor virtual',
	'modifyVhost' => 'Modificar servidor virtual',
	'modAliasForm' => 'Modificar formulario alias',
	'modifyAlias' => 'Modificar alias',
	'Required' => 'Requerido',
	'Optional' => 'Opcional',
	'phpNotExists' => 'La versión de PHP no existe',
	);

$langues_help['fcgi_mode_link'] = 'Ayuda para el modo FCGI';
$langues_help['fcgi_mode_help'] = <<< 'FCGIEOT'
- *** Cómo usar PHP en modo CGI rápido con Wampserver ***
El CGI (Interfaz de puerta de enlace común) define una forma en que un servidor web interactúa con programas externos de generación de contenido, que a menudo se denominan programas CGI o scripts CGI. Es una forma sencilla de poner contenido dinámico en su sitio web, utilizando cualquier lenguaje de programación con el que esté más familiarizado

- ** Solo una versión de PHP como módulo de Apache **
Desde el principio, Wampserver carga PHP como un módulo de Apache:
LoadModule php_module "${INSTALL_DIR}/bin/php/php8.1.1/php8apache2_4.dll"
lo que hace que todos los servidores virtuales, alias y proyectos usen la misma versión de PHP
Si cambia la versión de PHP a través del menú PHP de Wampmanager, esta nueva versión se utilizará en todas partes

- ** Varias versiones de PHP con modo FCGI **
Desde Wampserver 3.2.8, es posible utilizar PHP en modo CGI, es decir, puede definir una versión de PHP diferente, cuyos complementos se hayan instalado previamente, para cada servidor virtual. Esto significa que el servidor virtual ya no está obligado a usar la misma versión de PHP

Apache fcgid_module (mod_fcgid.so) simplifica la implementación de CGI
La documentación la podrá encontrar aquí: https://httpd.apache.org/mod_fcgid/mod/mod_fcgid.html

--- 1 *** Requerimientos previos ***
- 1.1 Presencia del archivo mod_fcgid.so en la carpeta de módulos de Apache
- 1.2 Presencia de la línea de carga del módulo en el archivo httpd.conf
LoadModule fcgid_module modules/mod_fcgid.so
- 1.3 Presencia de las directivas de configuración comunes del módulo fcgid_module en el archivo httpd.conf
<IfModule fcgid_module>
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
</IfModule>

Estos tres puntos 1.1, 1.2 y 1.3 se realizan automáticamente con la actualización de Wampserver 3.2.8

--- 2 *** Creando un servidor virtual FCGI ***
- Después de la actualización de Wampserver 3.2.8, la página http://localhost/add_vhost.php permite agregar un servidor virtual FCGI con toda sencillez
La elección de la versión de PHP a utilizar está limitada a las versiones de los complementos de PHP instalados en su Wampserver lo que evitará un error de versión de PHP
En efecto, declarar, en un servidor virtual, una versión de PHP inexistente en Wampserver generará un error de Apache y un "quiebre" de éste

- Si desea modificar un servidor local existente para agregar el modo FCGI con una versión de PHP existente que ya está en los complementos PHP de Wampserver, solo tiene que ir a la página http://localhost/add_vhost.php y ejecutar el formulario de modificación del servidor local para que sea capaz, en tres clics, de agregar el modo FCGI al servidor virtual, cambiar la versión de PHP o eliminar el modo FCGI
Será necesario actualizar Wampserver para que eso tenga efecto
Esta misma página http://localhost/add_vhost.php también le permite, a través del formulario de modificación de alias, agregar el modo FCGI a un alias existente, cambiar la versión de PHP o remover el modo FCGI, esto es siempre en tres clics

+------------------+
| Algunos detalles |
+------------------+
Para agregar el modo FCGI a un servidor virtual existente, simplemente agregue las siguientes directivas antes del final de </VirtualHost> de ese servidor virtual:
  <IfModule fcgid_module>
    Define FCGIPHPVERSION "7.4.27"
    FcgidInitialEnv PHPRC "${PHPROOT}${FCGIPHPVERSION}/php.ini"
    <Files ~ "\.php$">
      Options +Indexes +Includes +FollowSymLinks +MultiViews +ExecCGI
      AddHandler fcgid-script .php
      FcgidWrapper "${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe" .php
    </Files>
  </IfModule>

La versión de PHP debe existir como un complemento de PHP en su servidor Wamp y podrá ser modificada
Por el contrario, removiendo estas líneas hace que el servidor virtual vuelva a la versión de PHP utilizada como módulo de Apache

Para alias, es un poco menos simple, debe agregar las líneas anteriores en dos partes, la primera parte:
<IfModule fcgid_module>
  Define FCGIPHPVERSION "7.4.27"
  FcgidCmdOptions ${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe \
  InitialEnv PHPRC=${PHPROOT}${FCGIPHPVERSION}/php.ini
</IfModule>
antes de la directiva <Directory...
La segunda parte:
<IfModule fcgid_module>
  <Files ~ "\.php$">
    Options +Indexes +Includes +FollowSymLinks +MultiViews +ExecCGI
    AddHandler fcgid-script .php
    FcgidWrapper "${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe" .php
  </Files>
</IfModule>
dentro del contexto <Directory...></Directory> para obtener, por ejemplo para cualquier alias, la siguiente estructura:

Alias /myalias "g:/www/mydir/"
<IfModule fcgid_module>
  Define FCGIPHPVERSION "7.4.27"
  FcgidCmdOptions ${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe \
  InitialEnv PHPRC=${PHPROOT}${FCGIPHPVERSION}/php.ini
</IfModule>
<Directory "g:/www/mydir/">
  Options Indexes FollowSymLinks
  AllowOverride all
  Require local
  <IfModule fcgid_module>
    <Files ~ "\.php$">
      Options +Indexes +Includes +FollowSymLinks +MultiViews +ExecCGI
      AddHandler fcgid-script .php
      FcgidWrapper "${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe" .php
    </Files>
  </IfModule>
</Directory>

FCGIEOT;

?>