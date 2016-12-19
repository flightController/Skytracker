# SkyTracker

## How To Install (In VM)

### VM and Vagrant

- Install virtualbox/paralles
- install vagrant
- install vagrant-plugin

### Homestead

1. Go to Terminal / CMD and insert:
2. cd ~
3. git clone https://github.com/laravel/homestead.git Homestead
4. cd ~/homestead
5. bash init.sh / Windows: init.bat
6. sudo nano ~/.homestead/Homestead.yaml
7. Change these parameters
-     1. provider: parallels or vmware or hyperv or virtualbox
-     2. folders: - map: ~/Sites (folder where you store the Site)
-     3. to: /home/vagrant/Code
-     4. sites:- map: yourdomain.app
-     5. to: /home/vagrant/Code/Laravel/public
-     6. if you already installed homestead before run in Terminal: vagrant reload --provision

### hosts
1. sudo nano etc/hosts
2. insert: 192.168.10.10 yourdomain.app

### Vagrant
1. cd ~/Homestead
2. start vm with: vagrant up
3. If id_rsa Error you have to create a ssh-key: ssh-keygen -t rsa -C "you@homestead" (Windows: use git-bash) 

#### other vagrant commands:
2. stop vm: vagrant halt
3. destroy vm: vagrant destroy --force
4. connect to vm with ssh: vagrant ssh
5. update to the new vagrant box: vagrant box update

### mySql
1. vagrant ssh
2. mysql
3. create database skytracker;
4. open .env file in the project folder
5. host: localhost
6. port: 33060
7. user / pw: homestead/secret
8. do the same settings in config/database.php

### Laravel
1. still with ssh: cd /home/vagrant/Code/Skytracker
2. composer install
3. php artisan migrate
4. php artisan key:generate

### voyager admin panel
1. cd /home/vagrant/Code/Skytracker/
2. composer require tcg/voyager
3. php artisan voyager:install
4. php artisan voyager:admin name@mail.com --create
5. Im folder sql run this sql-script to insert settings: user_settings.sql

## How To Install (local)

### Install
1. Install composer
2. Install php
3. Install apache
4. Install mysql

### composer
1. navigate with cmd/terminal to the project folder
2. type: composer install

### mysql
1. create database skytracker;
2. open .env file in the project folder
3. enter host
4. enter port
5. enter user and pw
6. do the same settings in config/database.php

### voyager admin panel
1. navigate with cmd/terminal to the project folder
2. composer require tcg/voyager
3. php artisan voyager:install
4. php artisan voyager:admin name@mail.com --create
5. In folder sql run this sql-script to insert settings: user_settings.sql
