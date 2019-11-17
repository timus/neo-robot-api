---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_5c847512d0476c998494f67271b8b5a0 -->
## api/robots
> Example request:

```bash
curl -X GET -G "http://localhost/api/robots" 
```

```javascript
const url = new URL("http://localhost/api/robots");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated"
}
```

### HTTP Request
`GET api/robots`


<!-- END_5c847512d0476c998494f67271b8b5a0 -->

<!-- START_adb892a9764d0652ca85ae2628b5bffd -->
## api/robots/{robot}
> Example request:

```bash
curl -X GET -G "http://localhost/api/robots/1" 
```

```javascript
const url = new URL("http://localhost/api/robots/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "error": "Unauthenticated"
}
```

### HTTP Request
`GET api/robots/{robot}`


<!-- END_adb892a9764d0652ca85ae2628b5bffd -->

<!-- START_9b3f780c2aea38627933b9dcb84b5b77 -->
## api/robots
> Example request:

```bash
curl -X POST "http://localhost/api/robots" 
```

```javascript
const url = new URL("http://localhost/api/robots");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/robots`


<!-- END_9b3f780c2aea38627933b9dcb84b5b77 -->

<!-- START_8e62ce7f7b9b9fa5c489e0d5fcd3374b -->
## api/robots/{robot}
> Example request:

```bash
curl -X PUT "http://localhost/api/robots/1" 
```

```javascript
const url = new URL("http://localhost/api/robots/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/robots/{robot}`


<!-- END_8e62ce7f7b9b9fa5c489e0d5fcd3374b -->

<!-- START_3d4a75fde1de707d0184bab4a8560e95 -->
## api/robots/{robot}
> Example request:

```bash
curl -X DELETE "http://localhost/api/robots/1" 
```

```javascript
const url = new URL("http://localhost/api/robots/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/robots/{robot}`


<!-- END_3d4a75fde1de707d0184bab4a8560e95 -->

<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## api/register
> Example request:

```bash
curl -X POST "http://localhost/api/register" 
```

```javascript
const url = new URL("http://localhost/api/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/register`


<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## api/login
> Example request:

```bash
curl -X POST "http://localhost/api/login" 
```

```javascript
const url = new URL("http://localhost/api/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/login`


<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->


