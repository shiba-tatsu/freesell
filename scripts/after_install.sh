#!/bin/bash

set -eux

cd ~/freesell
php artisan migrate --force
php artisan config:cache