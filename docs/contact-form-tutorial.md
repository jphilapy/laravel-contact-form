
composer create-project laravel/laravel contact-form
cd contact-form
git init
git add .
git commit -m "ic"

create project at github then run these commands in shell
git remote add origin https://github.com/username/project-name.git
git push -u origin main
git branch -M main

at terminal: php artisan key:generate

if hosting in subdirectory, then create .htaccess file and add the following in
subfolder:

<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews
    </IfModule>

    RewriteEngine On

    RewriteCond %{REQUEST_FILENAME} -d [OR]
    RewriteCond %{REQUEST_FILENAME} -f
    RewriteRule ^ ^$1 [N]

    RewriteCond %{REQUEST_URI} (\.\w+$) [NC]
    RewriteRule ^(.*)$ public/$1

    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ server.php

</IfModule>

Make a model, controller, and migration:

php artisan make:controller ContactController

In the resources/views/ create a folder named contact. Then inside the new contact folder, create a file named form.blade.php

Edit web.php and add the form route:
Route::get('/contact', function () {
    return view('contact.form');
});

Add form html to page:

```
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>

<body>

</body>

</html>
```


Add bootstrap css to page:
```
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"
```

Add form:
```
 <div class="container">
        <form action="contact" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your Name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Subject</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your Subject">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Send Message</button>
        </form>

    </div>
```


Now that the form is done, we need to send it somewhere:
Create route for handling posts
modify form with new action that links to new route

try submitting form. You will notice that it will fail. You need to add:
@csrf


add validation
send contents somewhere
save contents to database







## Database Stuff
php artisan make:model Contact -m

edit .env and set database to sqlite:

Change :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

to:

DB_CONNECTION=sqlite
