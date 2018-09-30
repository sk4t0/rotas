FORMAT: 1A

# Intra Vel Extra - API Documentation

# Users [/users]
User resource representation.

## Display a listing of the Users. [GET /users]
Get a JSON representation of all the registered users.

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "email": "email",
                "type": "type"
            }

## Display the specified user. [GET /users/{id}]
Get a JSON representation of the single user.

+ Parameters
    + id: (integer, required) - The id for the user

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "email": "email",
                "type": "type"
            }

# Departments [/departments]
Departments resource representation.

## Display a listing of the Departments. [GET /departments]
Get a JSON representation of all the Departments.

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name"
            }

## Display the specified department. [GET /departments/{id}]
Get a JSON representation of the single department.

+ Parameters
    + id: (integer, required) - The id for the department

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name"
            }

## Store a new department [POST /departments]
Register a new department with a `name` .

+ Request (application/x-www-form-urlencoded)
    + Body

            name=name

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name"
            }

## Update an department [PUT /departments/{id}]
Update a department with a `name` .

+ Parameters
    + id: (integer, required) - The id for the department

+ Request (application/x-www-form-urlencoded)
    + Body

            name=name

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name"
            }

## Destroy an department [DELETE /departments/{id}]
Destroy a single department. No content returned

+ Parameters
    + id: (integer, required) - The id for the department

+ Response 204 (application/json)

# Employees [/employees]
Employees resource representation.

## Display a listing of the Employees. [GET /employees]
Get a JSON representation of all the Employees.

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "designation": "designation",
                "mobile": "mobile",
                "email": "email",
                "dept": "dept"
            }

## Display the specified employee. [GET /employees/{id}]
Get a JSON representation of the single employee.

+ Parameters
    + id: (integer, required) - The id for the employee

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "designation": "designation",
                "mobile": "mobile",
                "email": "email",
                "dept": "dept"
            }

## Store a new employee [POST /employees]
Register a new employee with a `name` .

+ Request (application/json)
    + Body

            {
                "name": "name",
                "designation": "designation",
                "mobile": "mobile",
                "email": "email",
                "dept": "dept"
            }

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "designation": "designation",
                "mobile": "mobile",
                "email": "email",
                "dept": "dept"
            }

## Update an employee [PUT /employees/{id}]
Update a employee with a `name` .

+ Parameters
    + id: (integer, required) - The id for the employee

+ Request (application/json)
    + Body

            {
                "name": "name",
                "designation": "designation",
                "mobile": "mobile",
                "email": "email",
                "dept": "dept"
            }

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "designation": "designation",
                "mobile": "mobile",
                "email": "email",
                "dept": "dept"
            }

## Destroy an employee [DELETE /employees/{id}]
Destroy a single employee. No content returned

+ Parameters
    + id: (integer, required) - The id for the employee

+ Response 204 (application/json)

# Organizations [/organizations]
Organizations resource representation.

## Display a listing of the Organizations. [GET /organizations]
Get a JSON representation of all the Organizations.

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "profile_image": "profile_image",
                "phone": "phone",
                "email": "email",
                "website": "website",
                "assigned_to": "assigned_to",
                "city": "city"
            }

## Display the specified Organization. [GET /organizations/{id}]
Get a JSON representation of the single Organization.

+ Parameters
    + id: (integer, required) - The id for the Organization

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "profile_image": "profile_image",
                "phone": "phone",
                "email": "email",
                "website": "website",
                "assigned_to": "assigned_to",
                "city": "city"
            }

## Store a new Organization [POST /organizations]
Register a new Organization with a `name` .

+ Request (application/json)
    + Body

            {
                "name": "name",
                "profile_image": "profile_image",
                "phone": "phone",
                "email": "email",
                "website": "website",
                "assigned_to": "assigned_to",
                "city": "city"
            }

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "profile_image": "profile_image",
                "phone": "phone",
                "email": "email",
                "website": "website",
                "assigned_to": "assigned_to",
                "city": "city"
            }

## Update an Organization [PUT /organizations/{id}]
Update a Organization with a `name` .

+ Parameters
    + id: (integer, required) - The id for the Organization

+ Request (application/json)
    + Body

            {
                "name": "name",
                "profile_image": "profile_image",
                "phone": "phone",
                "email": "email",
                "website": "website",
                "assigned_to": "assigned_to",
                "city": "city"
            }

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "profile_image": "profile_image",
                "phone": "phone",
                "email": "email",
                "website": "website",
                "assigned_to": "assigned_to",
                "city": "city"
            }

## Destroy an Organization [DELETE /organizations/{id}]
Destroy a single Organization. No content returned

+ Parameters
    + id: (integer, required) - The id for the Organization

+ Response 204 (application/json)

# Permissions [/permissions]
Permissions resource representation.

## Display a listing of the Permissions. [GET /permissions]
Get a JSON representation of all the Permissions.

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "display_name": "display_name"
            }

## Display the specified Permission. [GET /permissions/{id}]
Get a JSON representation of the single Permission.

+ Parameters
    + id: (integer, required) - The id for the Permission

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "display_name": "display_name"
            }

## Store a new Permission [POST /permissions]
Register a new Permission with a `name` .

+ Request (application/json)
    + Body

            {
                "name": "name",
                "display_name": "display_name"
            }

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "display_name": "display_name"
            }

## Update an Permission [PUT /permissions/{id}]
Update a Permission with a `name` .

+ Parameters
    + id: (integer, required) - The id for the Permission

+ Request (application/json)
    + Body

            {
                "name": "name",
                "display_name": "display_name"
            }

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "display_name": "display_name"
            }

## Destroy an Permission [DELETE /permissions/{id}]
Destroy a single Permission. No content returned

+ Parameters
    + id: (integer, required) - The id for the Permission

+ Response 204 (application/json)

# Roles [/roles]
Roles resource representation.

## Display a listing of the Roles. [GET /roles]
Get a JSON representation of all the Roles.

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "display_name": "display_name",
                "parent": "parent",
                "dept": "dept"
            }

## Display the specified Role. [GET /roles/{id}]
Get a JSON representation of the single Role.

+ Parameters
    + id: (integer, required) - The id for the Role

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "display_name": "display_name",
                "parent": "parent",
                "dept": "dept"
            }

## Store a new Role [POST /roles]
Register a new Role with a `name` .

+ Request (application/json)
    + Body

            {
                "name": "name",
                "display_name": "display_name",
                "parent": "parent",
                "dept": "dept"
            }

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "display_name": "display_name",
                "parent": "parent",
                "dept": "dept"
            }

## Update a Role [PUT /roles/{id}]
Update a Role with a `name` .

+ Parameters
    + id: (integer, required) - The id for the Role

+ Request (application/json)
    + Body

            {
                "name": "name",
                "display_name": "display_name",
                "parent": "parent",
                "dept": "dept"
            }

+ Response 200 (application/json)
    + Body

            {
                "id": "id",
                "name": "name",
                "display_name": "display_name",
                "parent": "parent",
                "dept": "dept"
            }

## Destroy an Role [DELETE /roles/{id}]
Destroy a single Permission. No content returned

+ Parameters
    + id: (integer, required) - The id for the Role

+ Response 204 (application/json)