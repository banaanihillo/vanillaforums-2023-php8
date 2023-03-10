#!/bin/bash
set -e

sudo cp -r --backup * /var/www/forum/

sudo rm -rf /var/www/forum/plugins/DiscussionPolls/locale/it-IT/
sudo rm -rf /var/www/forum/plugins/DiscussionPolls/locale/de-DE/
sudo rm -rf /var/www/forum/plugins/DiscussionPolls/locale/fi-FI/
sudo rm -rf /var/www/forum/plugins/DiscussionPolls/locale/fi/

sudo chown -R www-data:www-data /var/www/forum
sudo rm -rf /var/www/forum/cache/*
sudo service nginx reload
