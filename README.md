yams - yet another management system
====

### Assets builder

Install node modules
```
$ npm install
```

Deploy assets
```
$ grunt
```

### API

# Register new user
POST /users
{
   "email": "some@email.com",
   "firstName": "Ivan",
   "lastName": "Ivanov",
   "password": "123456"
}

# Get user info
GET /users?id=1

response:
{
    "id": 1,
    "email": "some@email.com",
    "firstName": "Ivan",
    "lastName": "Ivanov",
    ...
}

# Update user info
PUT /users
{
    "id": 1,
    "email": "new@email.com"
    ...
}
