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
GET /users?userId=1

response:
{
    "roleId":"0",
    "email":"some@email.com",
    "firstName":"Ivan",
    "lastName":"Ivanov",
    "karma":"0",
    "avatarFile":null,
    "registeredOn":"2013-07-30 19:36:20"
}

# Update user info
PUT /users
{
    "id": 1,
    "email": "new@email.com"
    ...
}
