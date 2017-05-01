# Run the application

## Initialization

To be able to run the application, you'll first need to install the dependencies with `composer install`.

Then you'll need to run the migration files with `php artisan migrate` and to populate the database with `php artisan db:seed`.

## Docker

The application needs a running RabbitMQ server to be able to manage the queue.

We offer that out of the box using Docker, by providing a `docker-compose.yml` file.

You'll need to run the command `docker-compose up -d`, which will create a container for an Nginx server, another for PHP-FPM and a last one for RabbitMQ.

You'll also need to add to your hosts file the following line `192.168.99.100 doctena-test.docker`.
The IP may be different according to your docker configuration.

## Run the queue listener

To run the queue listener, you'll have to go on your PHP container using the command `docker exec -it #id bash` (replace #id by the PHP-FPM id that you retrieve using `docker ps | grep php`).
When you're inside your container, you can use the artisan listener command `php /app/artisan queue:listen` and let it run.

You're now ready to use the application.

# End points

There are 2 main end points:

- `/appointments` which will allow you to test the CRUD part of the application.
- `/logs` which shows a list of all logs recorded.

# Execute tests

You can run the tests using the command `vendor\bin\phpunit`.
