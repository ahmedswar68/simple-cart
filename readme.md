how to run the project
$ composer update
$ php artisan key:generate

you can find database file with the files (shopping_cart) or follow the below steps

$ php artisan migrate
	
$ php artisan db:seed --class=ItemsSeeder
$ php artisan db:seed --class=CustomersSeeder

$ php artisan serve

