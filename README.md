## Activité 2 MyBooks

### setup:

Things i had to do to get this to work:
    - add "127.0.0.1 mybooks" in /etc/hosts
    - add "mybooks.conf" in /etc/apache2/sites-available
        - with this text:
        <VirtualHost *:80>
            ServerName MyBooks
        	DocumentRoot /var/www/html/MyBooks/web
        	<Directory "/var/www/html/MyBooks/web">
                AllowOverride all
                Require all granted
            </Directory>
        </VirtualHost>
    - do "sudo a2ensite MyBooks.conf"
    - do "sudo service apache2 restart"
    => to open "mybooks" in web browser.
    
  - go in /var/www/html/MyBooks then do a "composer install"

### files/folders in the .gitgnore:
  - vendor
  - app/config/prod 
  {contains: 
  <?php
  
  // Doctrine (db)
  $app['db.options'] = array(
      'driver'   => 'pdo_mysql',
      'charset'  => 'utf8',
      'host'     => 'localhost',
      'port'     => '3306',
      'dbname'   => 'mybooks',
      'user'     => 'sql_login',
      'password' => 'sql_pass',
  );
  }
  NB: for the OC check, i change the login and password to put all files in the archive i'll send.
  if you want to clone it from GitHub, you need to create manually this file.
  