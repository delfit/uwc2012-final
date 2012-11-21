#!/bin/sh

sudo apt-get install apache2 libapache2-mod-php5 curl
sudo a2enmod rewrite
echo "$(curl -fsSL https://raw.github.com/gist/4125094/472e9ca97413ecf9aaffdcc083965c2465d02c43/uwc2012-final_virtualhost)" | sed -e "s,PATH,`pwd`,g" | sudo tee -a /etc/apache2/sites-available/default > /dev/null
echo "$(curl -fsSL https://raw.github.com/gist/4125089/51c2c562e6c7c2d188f870f9f97bc1086b76b487/uwc2012-final_hosts)" | sudo tee -a /etc/hosts > /dev/null
sudo service apache2 restart
