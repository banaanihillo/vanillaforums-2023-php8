#!/bin/bash
set -e

sudo cp -r --backup * /var/www/forum/

sudo chown -R www-data:www-data /var/www/forum
sudo rm -rf /var/www/forum/cache/*
