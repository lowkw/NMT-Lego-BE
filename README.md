## Just One Brick
We were tasked with building a website that would essentially categorise LEGO sets by theme.
It also needed to allow users to register and create collections which they can add LEGO sets to.
We are using Laravel with a MySQL database to develop these features along with a third-party API provided from rebrickable.com to source all the LEGO set data.


## Deploy to AWS
This guide assumes you already have a domain pointing to your server and Nginx/Apache installed and pointing to your www folder. You will also need a mysql server running on your instance and php installed:
```bach
sudo apt-get install nginx mariadb-server php libapache2-mod-php php-curl php-common php-xml php-gd php-opcache php-mysql php-mbstring php-tokenizer php-json php-bcmath php-zip unzip curl git -y
```
this command will install nginx, a mariadb server, php will all the required extensions, curl and git, feel free to remove what you already have.
- SSH into your EC2 instance
- cd to public www folder
- Clone Laravel repo into public www folder:
```bach
sudo git clone https://github.com/20095325/NMT-Lego-BE.git .
```
- we use a "." at the end to pervent git from making another folder 
- copy example.env file:
```bach
sudo cp example.env .env
```
- create mysql database, noting the password user and database name:
```bach
sudo mysql
```
```bach
CREATE USER 'user'@'hostname';
CREATE DATABASE dbTest;
GRANT ALL PRIVILEGES ON dbTest.* To 'user'@'hostname' IDENTIFIED BY 'password';
exit;
```
- change the following variables in the .env file:
```bach
sudo nano .env
```
```bach
APP_NAME=Just One Brick
APP_ENV=production
APP_DEBUG=false
APP_URL=https://justonebrick.com.au # what ever the current domain is

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbTest
DB_USERNAME=user
DB_PASSWORD=password
```
- install all composer packages: this assumes you have composer installed
```bach
sudo composer install
```
- generate a new application key:
```bach
sudo php artisan key:generate
```
- build project for production, this assumes you have node installed:
```bach
sudo npm build
```
you should now be able to go to the domain and view the site in a browser (https://justonebrick.com.au)
