# Single Manning Calculation

Installation
------------
Clone the repository.
Then run, from the directory where you cloned it :

    composer install


Set your DB parameters in the .env file and next run migrations and seeds:

    php artisan migrate
    php artisan db:seed
  
Serve it :

    php artisan serve

Visit the Home and click on login to register your superadmin.

Test
------------

To test if the class works just run phpunit:

    ./vendor/bin/phpunit

Or go to the rotas page, see the only rota seeded and click on the Single manning button.