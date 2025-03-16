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

$langues = array(
	'langue' => 'Български',
	'locale' => 'български',
	'addVirtual' => 'Добавяне на виртуален хост',
	'backHome' => 'Kъм началната страница',
	'VirtualSubMenuOn' => '<code>Подменюто VirtualHost</code> в контекстното меню <code>Настройки на Wamp</code> трябва да бъде включено. След това презареди тази страница.',
	'UncommentInclude' => 'Разкоментирай <small>(изтрий знака #)</small> от следния ред: <code>#Include conf/extra/httpd-vhosts.conf</code><br>във файла %s.',
	'FileNotExists' => 'Файлът <code>%s</code> не съществува.',
	'txtTLDdev' => 'Името на сървъра %s използва TLD %s, който е монополизиран от браузърите. Използвай друг TLD (например .test).',
	'FileNotWritable' => 'Във файла <code>%s</code> не може да се пише.',
	'DirNotExists' => '<code>%s</code> не съществува или не е директория.',
	'NotwwwDir' => 'Папката <code>%s</code> е запазена за localhost. Използвай различна папка.',
	'NotCleaned' => 'Файлът <code>%s</code> не е изчистен.<br>В него са останали виртуални хостове от рода на: dummy-host.example.com.',
	'NoVirtualHost' => 'В <code>%s</code> не е дефиниран виртуален хост.<br>Необходим е поне един виртуален хост за localhost.',
	'NoFirst' => 'Първият виртуален хост във файла <code>%s</code> трябва да бъде <code>localhost</code>.',
	'ServerNameInvalid' => 'Името на сървъра <code>%s</code> е невалидно.',
	'LocalIpInvalid' => 'Локалното IP <code>%s</code> е невалидно.',
	'VirtualHostName' => 'Име на <code>виртуалния хост</code>. Не са позволени диакритични знаци (напр. ѝ), интервали и долни черти (_). ',
	'VirtualHostFolder' => 'Пълният абсолютен <code>път</code> до <code>папката</code> на виртуалния хост. <i>Примери: C:/wamp64/www/projet/ или E:/www/site1/</i> ',
	'VirtualHostIP' => '<code class="option">Ако</code> искаш да използваш вируален хост с IP: <code class="option">локално IP</code> 127.x.y.z ',
	'VirtualHostPhpFCGI' => '<code class="option">Ако</code> искаш да използваш PHP в режим FCGI <code class="option">Допустимите версии</code> са по-долу ',
	'VirtualHostPort' => '<code class="option">Ако</code> искаш да използваш различен порт за слушане от <code class="option">приеманите</code> по подразбиране портове по-долу ',
	'VirtualHostPortNone' => 'Ако искаш да използваш различен от стандартния порт за слушане, трябва да добавиш порт за слушане на Apache от "Инструменти", като кликнеш с десен бутон върху иконката. ',
	'VirtualAlreadyExist' => 'Името на сървъра <code>%s</code> вече съществува',
	'VirtualIpAlreadyUsed' => 'Локалното IP <code>%s</code> вече съществува.',
	'VirtualPortNotExist' => 'Портът <code>%s</code> не е порт за слушане на Apache.',
	'VirtualPortExist' => 'Портът <code>%s</code> е порт за слушане по подразбиране за Apache и не може да се споменава.',
	'VirtualHostExists' => 'Съществуващи виртуални хостове:',
	'Start' => 'Започни създаване/промяна на виртуалния хост (ще отнеме известно време...)',
	'StartAlias' => 'Започни промяната на псвевдонима',
	'GreenErrors' => 'Оцветените в зелено грешки могат да бъдат поправени автоматично.',
	'Correct' => 'Започни автоматичното поправяне на оцветените в зелено грешки',
	'NoModify' => 'Файлът <code>httpd-vhosts.conf</code> или <code>hosts</code> не може да бъде променен.',
	'NoModifyAlias' => 'Псевдонимът не е променен.',
	'VirtualCreated' => 'Файловете са променени. Виртуалният хост <code>%s</code> е създаден/променен.',
	'ModifiedAlias' => 'Псевдонимът <code>%s</code> е променен.',
	'CommandMessage' => 'Съобщения от конзолата за обновяване на DNS:',
	'However' => 'Можеш да добавиш/промениш друг виртуален хост, като кликнеш върху "Добавяне на виртуален хост".<br>За да бъдат запомнени тези нови виртуални хостове от WampManager (Apache), трябва да кликнеш върху<br><code>Рестартирай DNS</code><br>, след като кликнеш с десния бутон на мишката върху иконата на WampManager.</i>',
	'HoweverAlias' => 'Можеш да промениш друг псевдоним, като кликнеш върху "Добавяне на виртуален хост".<br>За да бъдат запомнени тези променени псевдоними от WampManager (Apache), трябва да кликнеш върху<br><code>Рестартирай DNS</code><br>, след като кликнеш с десния бутон на мишката върху иконата на WampManager.</i>',
	'HoweverWamp' => 'Създаденият/промененият виртуален хост е запомнен от Apache.<br>Можеш да добавиш/промениш друг виртуален хост, като кликнеш върху "Добавяне на виртуален хост".<br>Можеш да започнеш да работиш с този нов виртуален хост.<br>Но за да бъдат запомнени тези нови виртуални хостове от менютата на WampManager, трябва да кликнеш върху<br><code>Презареди</code><br>, след като кликнеш с десния бутон на мишката върху иконата на WampManager.</i>',
	'suppForm' => 'Формуляр за изтриване на виртуален хост',
	'suppVhost' => 'Изтрий виртуалния хост',
	'modifyForm' => 'Формуляр за промяна на виртуален хост',
	'modifyVhost' => 'Промени виртуалния хост',
	'modAliasForm' => 'Формуляр за промяна на псевдоним',
	'modifyAlias' => 'Промени псевдонима',
	'Required' => 'Задължително',
	'Optional' => 'По желание',
	'phpNotExists' => 'Версията на PHP не съществува',
	);

$langues_help['fcgi_mode_link'] = 'Помощ за режим FCGI';
$langues_help['fcgi_mode_help'] = <<< 'FCGIEOT'
- *** How to use PHP in Fast CGI mode with Wampserver ***
The CGI (Common Gateway Interface) defines a way for a web server to interact with external content-generating programs, which are often referred to as CGI programs or CGI scripts. It is a simple way to put dynamic content on your web site, using whatever programming language you're most familiar with.

- ** Only one PHP version as Apache module **
Since the beginning, Wampserver loads PHP as an Apache module:
LoadModule php_module "${INSTALL_DIR}/bin/php/php8.1.1/php8apache2_4.dll"
which makes all VirtualHost, Alias and Projects use the same PHP version.
If you change the PHP version via the PHP menu of Wampmanager, this new version will be used everywhere.

- ** Several PHP versions with FCGI mode **
Since Wampserver 3.2.8, it is possible to use PHP in CGI mode, i.e. you can define a different PHP version, whose addons have been previously installed, for each VirtualHost. This means that the VirtualHost are not obliged to use the same PHP version anymore.

The Apache fcgid_module (mod_fcgid.so) simplifies the implementation of CGI
The documentation is here: https://httpd.apache.org/mod_fcgid/mod/mod_fcgid.html

--- 1 *** Prerequisites ***
- 1.1 Presence of the mod_fcgid.so file in the Apache modules folder.
- 1.2 Presence of the module loading line in the httpd.conf file
LoadModule fcgid_module modules/mod_fcgid.so
- 1.3 Presence of the common configuration directives of the module fcgid_module in the file httpd.conf
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

These three points 1.1, 1.2 and 1.3 are done automatically with the Wampserver 3.2.8 update

--- 2 *** Creating a FCGI VirtualHost ***
- After the Wampserver 3.2.8 update, the http://localhost/add_vhost.php page allows the addition of a FCGI VirtualHost in all simplicity.
The choice of the version of PHP to use is limited to the versions of the PHP addons installed in your Wampserver what avoids an error of version PHP.
Indeed, to declare, in a VirtualHost, a non-existent PHP version in Wampserver will generate an Apache error and a "crash" of this one.

- If you want to modify an existing VirtualHost to add the FCGI mode with an existing PHP version already in the Wampserver PHP addons, you just have to go on the page http://localhost/add_vhost.php and launch the VirtualHost modification form to be able, in three clicks, to add the FCGI mode to the VirtualHost, to change the PHP version or to remove the FCGI mode.
It will be necessary to refresh Wampserver for that to be taken into account.
This same page http://localhost/add_vhost.php also allows, via the Alias modification form, to add the FCGI mode to an Alias, to change the PHP version or to remove the FCGI mode, always in three clicks.

+--------------+
| Some details |
+--------------+
To add FCGI mode to an existing VirtualHost, simply add the following directives just before the </VirtualHost> end of that VirtualHost:
  <IfModule fcgid_module>
    Define FCGIPHPVERSION "7.4.27"
    FcgidInitialEnv PHPRC "${PHPROOT}${FCGIPHPVERSION}/php.ini"
    <Files ~ "\.php$">
      Options +Indexes +Includes +FollowSymLinks +MultiViews +ExecCGI
      AddHandler fcgid-script .php
      FcgidWrapper "${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe" .php
    </Files>
  </IfModule>

The PHP version must exist as a PHP addon in your Wampserver and can be modified.
Conversely removing these lines causes the VirtualHost to revert to the PHP version used as an Apache module.

For Alias, it's a little less simple, you need to add the previous lines in two parts, the first part:
<IfModule fcgid_module>
  Define FCGIPHPVERSION "7.4.27"
  FcgidCmdOptions ${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe \
  InitialEnv PHPRC=${PHPROOT}${FCGIPHPVERSION}/php.ini
</IfModule>
just before the <Directory... directive.
The second part:
<IfModule fcgid_module>
  <Files ~ "\.php$">
    Options +Indexes +Includes +FollowSymLinks +MultiViews +ExecCGI
    AddHandler fcgid-script .php
    FcgidWrapper "${PHPROOT}${FCGIPHPVERSION}/php-cgi.exe" .php
  </Files>
</IfModule>
inside the <Directory...></Directory> context so as to obtain, for example for any Alias, the following structure:

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