What is this repository for?

building a user management system using PHP. The system
should allow users to register, login, and perform CRUD (Create, Read, Update, Delete)
operations on their user profile. Additionally, implement user roles and access control to restrict
certain actions to specific user roles.




# Getting started
## Installation

Clone the repository

    git clone https://github.com/ShahendaHossam/user-management-system.git

Switch to the repo folder

    cd user-management-system

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Command To Generate Laravel Permissions

    php artisan permission:create-permission-routes

Add User Admin Seeder

    php artisan make:seeder CreateAdminUserSeeder

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


The credential for this system is:

email: admin

password: admin123
