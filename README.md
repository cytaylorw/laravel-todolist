## About 

A Laravel Todo list API for practice.

## Demo 

#### Base URL

https://demo.taylorw.tw:60002/api

#### Header

- Accept: application/json
- Authorization: Bearer <api_token>

#### User
- email: admin@test.com
- password: admin
- api_token: 8Rw8CarpCOnlnWshGUS1TgowsqbxcEIjsNHeGVNEhNnDHeZcMWQ1YflFUkFUv02msJgZJf7G68qt1wwI

#### Routes

##### Auth
- POST: /register
- POST: /login

##### Users
- GET: /users
- GET: /users/{id}
- GET: /users/{id}/todos

##### Todos
- GET: /todos
- POST: /todos
- GET: /todos/{id}
- PUT: /todos/{id}
- DELETE: /todos/{id}
- GET: /todos/{id}/user

##### Current User
- GET: /user
- GET: /user/todos