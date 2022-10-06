<?php


class WebContainerCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    public function checkContainerIsRunning(UnitTester $I){
        $I->wantTo("verify ubuntu container up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} prod_web");
        $I->seeInShellOutput("true");
    }

    //No need of Supervisor
   /* public function checkSupervisorInstallation(UnitTester $I){
        $I->wantTo("verify supervisor is installed in the container");
        $I->runShellCommand("docker exec prod_web apt list --installed | grep supervisor");
        $I->seeInShellOutput('supervisor-3');

    }
   */
    public function checkApacheInstallation(UnitTester $I){
        $I->wantTo("verify apache is installed in the container and version");
        $I->runShellCommand("docker exec prod_web apache2 -v ");
        $I->seeInShellOutput('Server version: Apache/2.4');
    }

    public function checkImageMagick(UnitTester $I){
        $I->wantTo("verify imagemagick is installed in the container");
        $I->runShellCommand("docker exec prod_web convert -version");
        $I->seeInShellOutput('ImageMagick 6.9');
    }
    
    public function checkApacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify apache is up and running in the container");
        $I->runShellCommand("docker exec prod_web service apache2 status");
        $I->seeInShellOutput('apache2 is running');
    }

    public function checkCronInstallation(UnitTester $I){
        $I->wantTo("verify cron is installed in the container");
        $I->runShellCommand("docker exec prod_web apt list --installed | grep cron");
        $I->seeInShellOutput('cron/focal,now 3.0'); //Nothing shows as cronie

    }

    public function checkCronServiceIsRunning(UnitTester $I){
        $I->wantTo("verify cron is up and running in the container");
        $I->runShellCommand("docker exec prod_web service cron status");
        $I->seeInShellOutput('active (running)');
    }

    public function checkMemcachedInstallation(UnitTester $I){
        $I->wantTo("verify memcache is installed in the container");
        $I->runShellCommand("docker exec prod_web apt list --installed | grep memcached");
        $I->seeInShellOutput('memcached');

    }

    /*public function checkMemcacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify memcache is up and running in the container");
        $I->runShellCommand("docker exec prod_web service memcached status");
        $I->seeInShellOutput('active (running)');
    }
    */
    public function checkMySQLClientInstallation(UnitTester $I){
        $I->wantTo("verify mysql-client is installed in the container");
        $I->runShellCommand("docker exec prod_web apt list --installed | grep mariadb-client");
        $I->seeInShellOutput('mariadb-client');

    }

    /* public function checkOracleClientInstallation(UnitTester $I){
            $I->wantTo("verify oralce client is installed in the container");
            $I->runShellCommand("docker exec prod_web sqlplus -v");
            $I->seeInShellOutput('SQL*Plus: Release 11.2.0.2.0 Production');
     }
     */
    public function checkLibreOfficeInstallation(UnitTester $I){
        $I->wantTo("verify LibreOffice is installed in the container");
        $I->runShellCommand("docker exec prod_web libreoffice --version");
        $I->seeInShellOutput('LibreOffice 6.4');
    }


  public function checkPopplerUtilInstallation(UnitTester $I){
        $I->wantTo("verify poppler-util is installed in the container");
        $I->runShellCommand("docker exec prod_web apt list --installed | grep poppler-util");
        $I->seeInShellOutput('poppler-util');
  }

  public function checkLibSSLInstallation(UnitTester $I){
          $I->wantTo("verify openssl is installed in the container");
          $I->runShellCommand("docker exec prod_web apt list --installed | grep openssl");
          $I->seeInShellOutput('openssl');
  }

    public function checkLibSSHInstallation(UnitTester $I){
            $I->wantTo("verify libssh2 is installed in the container");
            $I->runShellCommand("docker exec prod_web apt list --installed | grep libssh2");
            $I->seeInShellOutput('libssh2-1');
    }

    public function checkZipInstallation(UnitTester $I){
        $I->wantTo("verify zip library is installed in the container");
        $I->runShellCommand("docker exec prod_web zip -v");
        $I->seeInShellOutput('Zip 3');
    }

    public function checkUnzipIsInstallation(UnitTester $I){
        $I->wantTo("verify UnZip library is installed in the container");
        $I->runShellCommand("docker exec prod_web unzip -v");
        $I->seeInShellOutput('UnZip 6');
    }


    public function checkCurlInstallation(UnitTester $I){
        $I->wantTo("verify curl is installed in the container");
        $I->runShellCommand("docker exec prod_web curl --version");
        $I->seeInShellOutput('curl 7');
    }

    public function checkP7zipInstallation(UnitTester $I){
        $I->wantTo("verify p7zip is installed in the container");
        $I->runShellCommand("docker exec prod_web apt list --installed | grep p7zip");
        $I->seeInShellOutput('p7zip/focal,now 16.02');

    }

    public function checkPHPVersion(UnitTester $I){
        $I->wantTo("verify php 7.4 is installed in the container");
        $I->runShellCommand("docker exec prod_web php --version");
        $I->seeInShellOutput('PHP 7.4');

    }


    public function checkPHPModules(UnitTester $I){
            $I->wantTo("verify required php modules are available");
            $I->runShellCommand("docker exec prod_web php -m");
            $I->seeInShellOutput('apcu');
            $I->seeInShellOutput('bcmath');
            $I->seeInShellOutput('bz2');
            $I->seeInShellOutput('calendar');
            $I->seeInShellOutput('Core');
            $I->seeInShellOutput('ctype');
            $I->seeInShellOutput('curl');
            $I->seeInShellOutput('date');
            $I->seeInShellOutput('dom');
            $I->seeInShellOutput('exif');
            $I->seeInShellOutput('fileinfo');
            $I->seeInShellOutput('filter');
            $I->seeInShellOutput('ftp');
            $I->seeInShellOutput('gd');
            $I->seeInShellOutput('gettext');
            $I->seeInShellOutput('gmp');
            $I->seeInShellOutput('hash');
            $I->seeInShellOutput('iconv');
            $I->seeInShellOutput('igbinary');
            $I->seeInShellOutput('imap');
            $I->seeInShellOutput('ionCube Loader');
            $I->seeInShellOutput('json');
            $I->seeInShellOutput('ldap');
            $I->seeInShellOutput('libxml');
            $I->seeInShellOutput('mbstring');
            $I->seeInShellOutput('mcrypt');
            $I->seeInShellOutput('memcached');
            $I->seeInShellOutput('mysqli');
            $I->seeInShellOutput('mysqlnd');
            $I->seeInShellOutput('openssl');
            $I->seeInShellOutput('pcntl');
            $I->seeInShellOutput('pcre');
            $I->seeInShellOutput('PDO');
            $I->seeInShellOutput('pdo_mysql');
            $I->seeInShellOutput('pdo_sqlite');
            $I->seeInShellOutput('Phar');
            $I->seeInShellOutput('posix');
            $I->seeInShellOutput('readline');
            $I->seeInShellOutput('Reflection');
            $I->seeInShellOutput('session');
            $I->seeInShellOutput('shmop');
            $I->seeInShellOutput('SimpleXML');
            $I->seeInShellOutput('soap');
            $I->seeInShellOutput('sockets');
            $I->seeInShellOutput('SPL');
            $I->seeInShellOutput('sqlite3');
            $I->seeInShellOutput('ssh2');
            $I->seeInShellOutput('standard');
            $I->seeInShellOutput('sysvmsg');
            $I->seeInShellOutput('sysvsem');
            $I->seeInShellOutput('tokenizer');
            $I->seeInShellOutput('xml');
            $I->seeInShellOutput('xmlreader');
            $I->seeInShellOutput('xmlwriter');
            $I->seeInShellOutput('xsl');
            $I->seeInShellOutput('zip');
            $I->seeInShellOutput('zlib');
    }

}
