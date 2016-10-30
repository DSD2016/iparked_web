# iParked web application
---

iParked uses Bluetooth LE beacons to help you find your car in GPS denied parking lot such as an underground garage.

## Contents
---
* [Environment setup](#installation)
  * [Windows](#windows)
  * [Linux](#linux)
* [Project setup](#project-setup) 

## Installation
---
### Windows

__A)__ Install Docker from [docker.com](https://www.docker.com/)

### Linux

__A)__ Install docker from repository
_for Ubuntu/Debian/Mint use_
```
apt-get update
apt-get install docker
```

_for Fedora/RHEL/Centos use_
```
dnf install docker
```

### Project setup

```
```

Install missing php libraries
```
composer update --no-scripts
```

Fix missing cache
```
mkdir bootstrap/cache
php artisan cache:clear 
composer dump-autoload
```
