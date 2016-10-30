# iParked web application
iParked uses Bluetooth LE beacons to help you find your car in GPS denied parking lot such as an underground garage.

# If you run into problem that bootsrap is not found do
```
composer update --no-scripts
```

# If cache cannot be opened do
```
php artisan cache:clear 
composer dump-autoload
```
