# iParked web application

iParked uses Bluetooth LE beacons to help you find your car in GPS denied parking lot such as an underground garage.

## Contents
* [Environment setup](#installation)
  * [Windows](#windows)
  * [Linux](#linux)
* [Project setup](#project-setup) 

## Installation

### Windows

__A)__ Install Docker from [docker.com](https://www.docker.com/)

### Linux

#### Install docker
_for Ubuntu/Debian/Mint use_
```
apt-get update
apt-get install docker git
```

_for Fedora/RHEL/Centos use_
```
dnf install docker git
```

#### Install docker-compose
```
sudo su
curl -L "https://github.com/docker/compose/releases/download/1.8.1/docker-compose-$(uname -s)-$(uname -m)" > /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
```

### Project setup

Open terminal and navigate to folder where project will be configured.

#### Clone and configure Laradock and project
```
git clone https://github.com/LaraDock/laradock
git clone https://github.com/DSD2016/iparked_web
```
#### Edit Laradock configuration

Change 'applications' section in docker-compose.yml to look like this
```
applications:
        image: tianon/true
        volumes:
            - ../iparked_web:/var/www
#            - ../:/var/www/sample
```

Change INSTALL_AEROSPIKE_EXTENSION variable to false in workspace/Dockerfile
```
# ARG INSTALL_AEROSPIKE_EXTENSION=true
# ARG INSTALL_AEROSPIKE_EXTENSION=false
```

#### Start docker
```
sudo gpasswd -a ${USER} docker
sudo systemctl start docker
docker-compose up -d nginx mysql
```

#### Install missing php libraries
```
composer update --no-scripts
```

#### Fix missing cache
```
mkdir bootstrap/cache
php artisan cache:clear 
composer dump-autoload
```
