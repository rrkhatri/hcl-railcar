##Execute below commands one by one to setup project.
- clone this repo
- composer install
- yarn && yarn run dev
- php artisan key:generate

###create .env file form .env.example file and set appropriate database name in .env file.
- php artisan migrate
- php artisan db:seed

After that, you are ready to go for testing.
