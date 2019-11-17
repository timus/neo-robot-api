

The following  HTTP verbs has been used to demonstrate  CRUD  for the Robot resources


GET : List all Robot(s)

POST : Create Robot

PUT : Update Robot

DELETE : Delete Robot

To demonstrate Authentication 2 additional End points are also covered here . 
They just demonstrate how to generate successful bearer token to authenticate over the apis for CRUD operation.

The project demonstration has been done using Laravel 5.7 on the docker container on the top of Ubuntu 19.04

Please follow the instruction below to run the project

1. Clone the project

2. Enter to project folder

3. Spin up the container using ‘docker-compose up’

4. Run docker-compose exec php bash

5. Run php artisan migrate from vm

The http server should be available on the port 8081 and you should be able to access the end point mentioned below


Feature test for  Login and CRUD has been included please  run the command below from docker vm . 

Steps

1. Run docker-compose exec php bash

2. composer test (from the root of vm container)


API DOCS

Check the API docs on api/public/docs/index.html 

Additionally you should be able to  generate  Api using artisan command ‘php artisan apidoc:generate’

https://laravel-apidoc-generator.readthedocs.io/en/latest/


Question and answers



Q. Neo will need to choose either a REST or an RPC API? List down the pros of REST and RPC APIs in the table below to help Neo make his decision 


Pros of REST

More verbs (GET,POST,PUT,PATCH,DELETE) suitable for CRUD

Its stateless and provide status code

Pros of RPC

Simple with limited verbs (GET,POST)suitable for limited operations .Eg: Listing forex data from external website

For simple operation you dont need to bother with status code , you an simply  check the response and analyse it 

Q. What is an API gateway. List at least three problems it solves for Neo.

API gateway are the point of entry for the microservices , monlithic apps or even for the legacy systems which help to transfer the data from client to server or vice versa. The following are the problems it solves for Neo

1. Neo can prefer microservice architecture to design different Apis from the single entry point which will make their app less monolithic and loosely coupled

2. Neo can easily seperate out back end and front end logics with the help of API based architecture.

3. Neo can use wide variety of  clients to perform his operations .

Q: What tools can Neo use to enforce a standard for his web API? 

Neo can use third party tool like Swagger to enforce a standard for his web API. For laravel we can use https://github.com/appointer/swaggervel . 

Q. What tools can Neo use to test and monitor his API?

For API testing Neo can use postman or even CLI based CURL too. 
There are many api monitor tools in the market .  

They can use uptime robot which is compatible to almost all ecosytem(aws, azure, gcp). 

They can also run some command line test  as a cron job to test the api , this is help minimise unnecessary HTTP traffic created by api testing  Bot.

Q. How can Neo version his API?

There are no hard and fast rules for api versioning . Personally I prefer Neo should use something like below

http://myapi.com/v1


Part 2  – Security (no coding required)
Neo’s Robot API is a huge success. But Neo found himself doing menial tasks like repairing his robots. Neo hired a chief mechanic to repair his robots. This mechanic can issue only ‘PATCH’ command to repair robots. All other commands issued from the mechanic will be denied by the API. 
Q. How would you go about implementing authentication and authorization in Neo’s API? Demonstrate an HTTP response for a successful request and an unsuccessful unauthorized request. Note: You do not have to code anything. Just provide HTTP responses.


Authentication is defined  defined below  for  admin . Admin should be able to do all  http operation using api key authentication . The approach will be same for mechanics as well only thing we need to do are below

1. auth:api middleware should check for role admin and should return 401 If it is  any other HTTP verb but not PATCH for role mechanics

2. Create new middleware auth:api_mechanics and check the role mechanics . Use that just for patch api .
Like below

Admin Routes

```
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('api/robots', 'RobotController@index');
    Route::get('api/robots/{robot}', 'RobotController@show');
    Route::post('api/robots', 'RobotController@store');
    Route::put('api/robots/{robot}', 'RobotController@update');
    Route::delete('api/robots/{robot}', 'RobotController@delete');

});
```

Mechanics routes

```
Route::group(['middleware' => 'auth:api_mechanics'], function() {
    Route::patch('api/robots/{robot}', 'RobotController@update');
});
```

Guest routes

```
Route::post('api/register', 'Auth\RegisterController@register');
Route::post('api/login', 'Auth\LoginController@login')->name('login');
```















1.	Register End point

```
curl -X POST http://localhost:8081/api/register \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"name": "sumit", "email": "timus2001@gmail.com", "password": "123456", "password_confirmation": "123456"}'
 
 ```

Outcome
```
{"data":{"name":"sumit","email":"timus2001@gmail.com","updated_at":"2019-11-17 10:46:24","created_at":"2019-11-17 10:46:24","id":91,"api_token":"XwYDPKleqaULuSiTRU81mzocnIiDTtR4MN8TSHYsKTQbq3ydAC5Ol979SUAI"}}
```

On successful registration user will automatically get logged in and issue the api_token which will be used for authentication for CRUD of robot


2. Login End point

If users are already registered , they can access the login end point api 

```
curl -X POST http://localhost:8081/api/login \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"email": "timus2001@gmail.com", "password": "123456"}'

```

On successful login the api will issue the api_key  like the Register end point 
```
{"data"{"id":91,"name":"sumit","email":"timus2001@gmail.com","email_verified_at":null,"role":"admin","created_at":"2019-11-17 10:46:24","updated_at":"2019-11-17 10:55:54","api_token":"uyI84JY42mjcEkZxXPzzHcBINnCRqGzLS7sr4hifJ3BAntWiz4JiEnEjkFnd"}}
```





3.  Create Robot 

Pass the Api Key as the bearer token

```

curl -X POST http://localhost:8081/api/robots \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -H "Authorization: Bearer Dg345BOxcEr86muvCpjaqIRBR4eXvQi4LayvXGC2yPDoe6BqZp6DXTmLHKl8" \
 -d '{"name": "myrobot", "description": "myrobot desc", "sensing": 1, "movement": 1, "intelligence": 1}'
 
 ```

4. Update Robot 
```
curl -X PUT http://localhost:8081/api/robots/1 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -H "Authorization: Bearer Dg345BOxcEr86muvCpjaqIRBR4eXvQi4LayvXGC2yPDoe6BqZp6DXTmLHKl8" \
 -d '{"name": "updated robot ", "description": " updated desc", "sensing": 1, "movement": 1, "intelligence": 1}'

```

5. Delete Robot
```
curl -X DELETE  http://localhost:8081/api/robots/1 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -H "Authorization: Bearer Dg345BOxcEr86muvCpjaqIRBR4eXvQi4LayvXGC2yPDoe6BqZp6DXTmLHKl8" 
 ```

6. List Robot

```
curl -X GET  http://localhost:8081/api/robots/1 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -H "Authorization: Bearer Dg345BOxcEr86muvCpjaqIRBR4eXvQi4LayvXGC2yPDoe6BqZp6DXTmLHKl8" 
 ```

7. Patch Robot ( Different middleware needed)

```
curl -X PUT http://localhost:8081/api/robots/1 \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -H "Authorization: Bearer Dg345BOxcEr86muvCpjaqIRBR4eXvQi4LayvXGC2yPDoe6BqZp6DXTmLHKl8" \
 -d '{"name": "updated robot "}'
 
 ```







What is 2 (two) factor authentication and describe how you would implement a 2 factor authentication login process?
Two factor authentication is adding second layer of authentication  after  successfully validating user and password . For example sending verification code over sms after successfully entering username and password.

The simplest way to implement 2  factor authentication is below

1. generate random 4 digit pin code after username/password validation is passed by the application
2. Save that code  to the database  and send that over email or sms
3. Display the input box immediately after 1st level login with the clear instruction about login code
4. Check on the database for that code  along with username /password and /or access token .
5. Restrict the number of attempts for token

We can also use the third party tools like Autho /Authy for 2 factor authentication using their API
https://www.twilio.com/docs/authy/tutorials/two-factor-authentication-php-laravel





What do you consider to be a strong password?
We can use the set of rules to make password strong
1. At least 8 character long
2. At least 1 upper case and 1 lower case mandatory
3.  At least one special character compulsory
4. At least one number compulsory
Using regular expression we can find out the number of matched rules  and show the strength of the password as percentage .





