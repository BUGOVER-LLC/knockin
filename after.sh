#!/bin/bash

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
#
# If you have user-specific configurations you would like
# to apply, you may also create user-customizations.sh,
# which will be run after this script.

# Install phpmyadmin
if [[ ! -d "./.etc/phpmyadmin/" ]]; then
  sudo apt-get install unzip
  wget https://files.phpmyadmin.net/phpMyAdmin/5.2.1/phpMyAdmin-5.2.1-all-languages.zip
  unzip phpMyAdmin-5.2.1-all-languages.zip -d ~/noix/.etc/
  sudo mv ~/noix/.etc/phpMyAdmin-5.2.1-all-languages ~/noix/.etc/phpmyadmin
  sudo rm -rf phpMyAdmin-5.2.1-all-languages.zip ~/noix/.etc/phpMyAdmin-5.2.1-all-languages
fi

# Copy SSL Certificates
sudo cp -r /etc/ssl/certs/ca.homestead.noix.crt /home/vagrant/noix/.etc/ssl
sudo cp -r /etc/ssl/certs/ca.homestead.noix.key /home/vagrant/noix/.etc/ssl

sudo cp -r /etc/ssl/certs/noix.loc.crt /home/vagrant/noix/.etc/ssl
sudo cp -r /etc/ssl/certs/noix.loc.key /home/vagrant/noix/.etc/ssl

# Copy NGINX config
sudo cp -r /home/vagrant/noix/.etc/nginx/noix.loc /etc/nginx/sites-available/

# Copy Supervisor configs
#sudo cp -r /home/vagrant/noix/.etc/supervisor/memmon.conf /etc/supervisor/conf.d/
sudo cp -r /home/vagrant/noix/.etc/supervisor/queue-base.conf /etc/supervisor/conf.d/
sudo cp -r /home/vagrant/noix/.etc/supervisor/swoole-http.conf /etc/supervisor/conf.d/

sudo supervisorctl reread
sudo supervisorctl restart all
sudo supervisorctl reload

# Set PHP version
update-alternatives: using /usr/bin/php8.2
update-alternatives: using /usr/bin/php-config8.2
update-alternatives: using /usr/bin/phpize8.2
sudo phpenmod xdebug

# Add PPA repository
sudo add-apt-repository ppa:ondrej/nginx -y
sudo add-apt-repository ppa:redislabs/redis -y

sudo apt update
sudo apt upgrade -y

sudo apt install cron -y
sudo apt install nginx-extras -y
sudo apt install php-gmp
sudo apt install php-bcmath
sudo apt install php-igbinary
sudo apt install libc-ares-dev libcurl4-openssl-dev

pip install --upgrade supervisor
pip install superlance

# Install new version beanstalkd, for queue on prod test
wget https://launchpad.net/ubuntu/+archive/primary/+files/beanstalkd_1.12-2_amd64.deb
sudo dpkg -i beanstalkd_1.12-2_amd64.deb
sudo rm -rf beanstalkd_1.12-2_amd64.deb

#cd ~/noix
#composer config github-oauth.github.com awk -F= '$1 == "APP_URL" {print $2}' .env
#
composer install
yarn install

cd public || exit
unlink storage
ln -s ../storage/public storage
