0. **Create a .env file**
```
cp .env.docker .env
```
1. **Build the project**
```
docker-compose up --build -d
```
2. **Install the Laravel APP (inside the sandbox_app container)**
```
install-app
```
3. **Populate the users table with random data using the DB seeder**
```
php artisan migrate
php artisan db:seed --class=DatabaseSeeder
```
4. **Create the ProfilePicture model with migration and seeder; also created a one-to-one relationship with the user model**
```
php artisan make:model ProfilePicture -ms
```

   - create some random profile_pictures records in the seeder
	- php artisan db:seed --class=ProfilePictureSeeder (populate the profile_pictures table)

5. **Create the profile_pictures table in the DB**
```
php artisan migrate
```
6. **Create the ProfileController**
```
php artisan make:controller ProfileController
```

   - create an API route for this controller
   - retrieve user including profile picture url with a left join SQL (left join so that it doesn't exclude users with no profile picture)
   - return the user in a JSON format taking care of whether or not the user id corresponds to an existing user or not
7. **Test with Postman - created a Postman collection with 2 GET requests: (1) existing user (2) non existing user**