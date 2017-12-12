Evaluation project "Recycle batteries" based on Symfony
========================

Small evaluation project to build an app to track recycled batteries based on Symfony 3.3

Steps to deploy the project locally:
--------------

1. Prepare empty database (also for test environment)

2. Run installation process through composer (db details will be asked in the end):
    ```
    $ composer install
    ```

3. Create database structure:
    ```
    $  bin/console doctrine:schema:create
    ```

4. Start dev web-server (optional):
    ```
    $ bin/console server:start
    ```

5. Run tests
    ```
    $ bin/console PREPARE_DB=1 phpunit --group functional
    ```

The dashboard page is accessible from the root URL (http://localhost:8001/app.php in case of utilizing built-in web-server)
