# blog
The intention of this project was to highlight Oriented Object Programming concepts and S.O.L.I.D principles (by Uncle Bob).
Here we have many design patterns as:

- Singleton;
- Front Controller;
- Model, View and Controller - MVC;
- Factory Method;
- Fluent Interface;
- Dependency Injection;
- Strategy;
- Delegation;

On this project you also could realise how to deal with:
- Sql Injection;
- XSS attack;
- Cross Site Request Forgery (CSRF) Attack


### Installation

```sh
$ git clone https://github.com/shinichi2510/php-oop-solid.git
```

Database script: [https://github.com/shinichi2510/php-oop-solid/tree/master/config/script/blog.sql](https://github.com/shinichi2510/php-oop-solid/tree/master/config/script/blog.sql)

Restore the database using

mysql -p -u[user] blog < blog.sql


### Run
http://localhost/blog/


### Test

Acceptance Tests, Functional Tests and Unit Tests

```sh
$ ./vendor/bin/codecept run --steps
```

### Author
Chi Pham - <chipv.bka@gmail.com> 
