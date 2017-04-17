# Run application

To be able to run the applicxation, you'll first need to install the dependencies with `composer install`.

Then you'll need to run the migration files with `php artisan migrate` and to populate the database with `php artisan db:seed`.

Finally, you'll need to launch a webserver, you can do so by using the command `php artisan serve`.

The application should be available if you go to:
http://localhost:8000/appointments 

# Execute tests

You can run the tests using the command `vendor\bin\phpunit`.
