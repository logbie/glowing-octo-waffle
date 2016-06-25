#!/usr/bin/env bash

export DEBIAN_FRONTEND=noninteractive

#update ubuntu
echo -e "Updating Ubuntu..."
apt-get update > /dev/null 2>&1
apt-get -y upgrade > /dev/null 2>&1
apt-get -y dist-upgrade > /dev/null 2>&1
apt-get -y autoremove > /dev/null 2>&1
echo -e "done\n"

#install Build Tools
echo -e "Installing Build Tools..."
apt-get install -y build-essential cmake FLEX bison bison-doc > /dev/null 2>&1
echo -e "Done\n"

#install LAMP server
echo -e "Instaling Apache2..."
apt-get install -y apache2 > /dev/null 2>&1
echo -e "done\n"

#set apache root
echo -e "setting up apache"
sed -i "s#DocumentRoot /var/www/html#DocumentRoot /mediawiki#g" /etc/apache2/sites-available/000-default.conf

cat >> /etc/apache2/apache2.conf <<EOF 
#Mediawiki config
<Directory /mediawiki>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>
EOF

echo -e "done\n"

#reload apache
echo -e "reloading apache..."
service apache2 reload > /dev/null 2>&1
echo -e "done\n"

#install php
echo -e "installing PHP..."
apt-get install -y php5 libapache2-mod-php5 php5-mcrypt > /dev/null 2>&1
echo -e "Done\n"


#install Mysql
echo -e "Setting up MYSQL..."
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password rootpass'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password rootpass'
sudo apt-get -y install mysql-server libapache2-mod-auth-mysql php5-mysql > /dev/null 2>&1
echo -e "Done\n"

#setup host name
echo "Setting up hostname in apache"
echo "ServerName localhost" | sudo tee /etc/apache2/conf-available/fqdn.conf 
sudo a2enconf fqdn > /dev/null 2>&1
echo -e "done\n"

#reload apache
echo -e "reloading apache..."
service apache2 reload > /dev/null 2>&1
echo -e "done\n"

#install git
echo -e "Installing Git"
sudo apt-get install -y git > /dev/null 2>&1
echo -e "done\n"

#installing ImageMagick
echo -e "Installing ImageMagick"
sudo apt-get install -y ImageMagick > /dev/null 2>&1
echo -e "done\n"

#install doxygen
echo -e "installing doxygen (this could take awhile)"
cd /
git clone https://github.com/doxygen/doxygen.git > /dev/null 2>&1
cd doxygen
mkdir build 
cd build
cmake -G "Unix Makefiles" .. > /dev/null 2>&1
make > /dev/null 2>&1
make install > /dev/null 2>&1

#install composer
echo -e "Installing Composer (this could take awhile)"
sudo apt-get install -y php5-cli curl > /dev/null 2>&1
curl -Ss https://getcomposer.org/installer | php > /dev/null 2>&1
mv composer.phar /usr/bin/composer > /dev/null 2>&1

#remove files from HTML Directory
#rm /var/www/html/*

#run composer
cd /mediawiki
composer update > /dev/null 2>&1
echo -e "Done\n"