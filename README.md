# ReCrypt
Hi guys, thank you for taking the time to check this.
I have kept things pretty simple.
Applied a different structure for the project. Not a big fan of what comes out of the box.
Controllers are single method.

## Details
PHP 8
Laravel 8.5

## Setup
composer install
php artisan migrate
php artisan serve

## What would you add to your solution if you had more time?
- Docker
- Tests
- Larastan
- OpenApi
- aes-256-gcm encryption

## How did you encrypt the data and why?

Using laravel Encrypted with a client key
cipher is aes-256-cbc
Also im against plain text keys.
Ideally I would have used an asymmetric encryption on the key 
from client side with a x509 public key.
The encryption would look something like this : 

    "encryption_key" : {
        "key" => 'the public crt encryted key',
        "algorithm" : {
            "name": 'algorith name'
            ... etc etc   
        } 
    }

From this structure we can automatically decrypt the key on our side using the private crt.

##Please describe yourself using JSON
Not sure if I need to describe the bullet points or myself, bit confused

 
