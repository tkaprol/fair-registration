## An Example Online Fair Stand Registration Application with Laravel PHP Framework

### Introduction

This project allows to manage your online fair registrations. Visitors can register and select their own Stand over Google Maps. 

In the example, I already defined some pla

> **Note:** Application developed for end user perspective only. There is no admin features to define Expos & halls


### Instructions to Install Project

1. Create an .env file
2. Setup database & e-mail services at the .env file
          APP_ENV=local
          APP_DEBUG=true
          APP_KEY=ICWLrKAc0p0aNjhDnbdVJPF53aHLXZBY

          DB_HOST=localhost
          DB_DATABASE=<<DB>>
          DB_USERNAME=<<USER>>
          DB_PASSWORD=<<PASSWORD>>

          CACHE_DRIVER=file
          SESSION_DRIVER=file
          QUEUE_DRIVER=sync

          MAIL_DRIVER=smtp
          MAIL_HOST=smtp.gmail.com
          MAIL_PORT=587
          MAIL_USERNAME=<<MAIL>>@gmail.com
          MAIL_PASSWORD=<<PASSWORD>>

3. Import Database from SQL file located at Database folder to your mySQL server

4. Point Code/Public folder to your apache servers root

5. (optional) Change Google Maps API key from Code/resources/views/app.blade.php if necessary

### License

This project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
