#!/bin/bash
composer install
npm install --legacy-peer-deps
php artisan migrate:fresh --seed --force
