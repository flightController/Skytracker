# SkyTracker
## How To Install (In VM)
### VM and Vagrant
- Install virtualbox/paralles
- install vagrant (https://www.vagrantup.com/)
- install vagrant-plugin for parallels (https://github.com/Parallels/vagrant-parallels)
  (Vagrant comes with support out of the box for VirtualBox,)

### Homestead
1. Go to Terminal / CMD and insert:
2. cd ~
3. git clone https://github.com/laravel/homestead.git Homestead
4. cd ~/homestead
5. bash init.sh / Windows: init.bat
6. sudo nano ~/.homestead/Homestead.yaml
7. Change these parameters
  - provider: parallels or vmware or hyperv or virtualbox
  - folders: - map: ~/Sites (folder where you store the Site)
  - to: /home/vagrant/Code
  - sites:- map: yourdomain.app
  - to: /home/vagrant/Code/Laravel/public
  - databses: -skytracker
  - if you already installed homestead before and you want to change some settings run in Terminal: vagrant reload --provision

### hosts
1. sudo nano etc/hosts
2. insert: 192.168.10.10 skytracker.app

### Vagrant
1. cd ~/Homestead
2. start vm with: (sudo) vagrant up
3. If id_rsa Error you have to create a ssh-key: ssh-keygen -t rsa -C "you@homestead" (Windows: use git-bash) 

#### other vagrant commands:
2. stop vm: vagrant halt
3. destroy vm: vagrant destroy --force
4. connect to vm with ssh: vagrant ssh
5. update to the new vagrant box: vagrant box update

### mySql
1. open .env file in the project folder
2. host: localhost
3. port: 33060
4. user / pw: homestead/secret
5. do the same settings in config/database.php

### Laravel
1. still with ssh: cd /home/vagrant/Code/Skytracker
2. composer install
3. php artisan key:generate

### voyager admin panel
1. cd /home/vagrant/Code/Skytracker/
2. composer require tcg/voyager
3. php artisan voyager:install
4. php artisan voyager:admin name@mail.com --create

## How To Install (local)
### Install
1. Install composer (https://getcomposer.org/download/)
2. Install php (http://php.net/manual/de/install.php)
3. Install and configure apache (http://httpd.apache.org/docs/2.4/de/install.html)
4. Install and configure mysql (https://dev.mysql.com/downloads/installer/)

### composer
1. navigate with cmd/terminal to the project folder
2. type: composer install

### mysql
1. open .env file in the project folder
2. enter host
3. enter port
4. enter database
5. enter user and pw
6. do the same settings in config/database.php

### voyager admin panel
1. navigate with cmd/terminal to the project folder
2. composer require tcg/voyager
3. php artisan voyager:install
4. php artisan voyager:admin name@mail.com --create

## Export / Import
### Export Vagrant Box
1. navigate with cmd/terminal to the project folder
2. type: vagrant package --output mynew.box

### Import Vagrant Box
1. vagrant box add my-box file:///d:/path/to/file.box
