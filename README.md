Run Program:
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan jwt:secret
- edit env set database
- php artisan migrate
- php artisan serve

```json


Register
url : {url:port} /api/register
Method: POST
parameter:
{
    "name": "Erwin H",
    "email": "admin@gmail.com",
    "password" : "admin@123"
}
result:
{
    "success": true,
    "message": "User created successfully",
    "data": {
        "name": "Erwin H",
        "email": "admin@gmail.com",
        "updated_at": "2022-10-30T05:49:10.000000Z",
        "created_at": "2022-10-30T05:49:10.000000Z",
        "id": 2
    }
}

Login
url : {url:port} /api/login
Method: POST
parameter:
{
    "email":"admin@gmail.com",
    "password": "admin@123"
}
result:
{
    "success": true,
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2NzEwODM3OCwiZXhwIjoxNjY3MTExOTc4LCJuYmYiOjE2NjcxMDgzNzgsImp0aSI6IjNpTkxjNHh3OW5FQzdKZHkiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.tK93Fzxks_qIXP9XkwkzbBmlOp4yEmjsttwnAPOrqJs"
}

Create Product / Brand
Method: POST
Authentication : bearer <Token>
url : {url:port} api/products/add
parameter:
{
        "name": "Laptop",
        "sku": "SK004",
        "brand": "Asus"
}
result:
{
    "success": true,
    "message": "Product Add Sukses",
    "data": {
        "name": "Laptop",
        "sku": "SK004",
        "brand": "Asus",
        "updated_at": "2022-10-30T05:40:40.000000Z",
        "created_at": "2022-10-30T05:40:40.000000Z",
        "id": 1
    }
}

Create Varian Product
Method: POST
Authentication : bearer <Token>
url : {url:port} api/varian/add
parameter:
{
        "name": "Ram 36 GB SSD",
        "sku": "SK005",
        "price": 450000000
}
result:
{
    "success": true,
    "message": "Varian Berhasil dibuat",
    "data": {
        "id_product": 1,
        "name": "Ram 36 GB SSD",
        "sku": "SK005",
        "price": 450000000,
        "updated_at": "2022-10-30T05:54:30.000000Z",
        "created_at": "2022-10-30T05:54:30.000000Z",
        "id": 1
    }
}

Get List Product / Brand
Method: GET
Authentication : bearer <Token>
url : {url:port} /api/products
parameter: {}
result:
{
    "status": "success",
    "Data": [
        {
            "id": 1,
            "name": "Laptop",
            "sku": "SK004",
            "brand": "Asus",
            "created_at": "2022-10-30T05:53:30.000000Z",
            "updated_at": "2022-10-30T05:53:30.000000Z",
            "varian": [
                {
                    "id": 1,
                    "id_product": 3,
                    "name": "Ram 36 GB SSD",
                    "sku": "SK005",
                    "price": 450000000,
                    "created_at": "2022-10-30T05:54:30.000000Z",
                    "updated_at": "2022-10-30T05:54:30.000000Z"
                }
            ]
        }
    ]
}

Get {id} Product / Brand
Method: GET
Authentication : bearer <Token>
url : {url:port} /api/products/{id}
parameter: {}
result:
{
    "id": 1,
    "name": "Laptop",
    "sku": "SK004",
    "brand": "Asus",
    "created_at": "2022-10-30T05:53:30.000000Z",
    "updated_at": "2022-10-30T05:53:30.000000Z"
}

Get {id} Varian 
Method: GET
Authentication : bearer <Token>
url : {url:port} /api/varian/{id}
result:
{
    "status": "success",
    "Data": [
        {
            "id": 1,
            "id_product": 3,
            "name": "Ram 36 GB SSD",
            "sku": "SK005",
            "price": 450000000,
            "created_at": "2022-10-30T05:54:30.000000Z",
            "updated_at": "2022-10-30T05:54:30.000000Z"
        }
    ]
}

Delete {id} Product / Brand
Method: POST
Authentication : bearer <Token>
url : {url:port} /api/products/delete
parameter: 
{
    "id": 1
}
result:
{
    "success": true,
    "message": "Product deleted successfully"
}

Delete {id} Varian 
Method: POST
Authentication : bearer <Token>
url : {url:port} /api/varian/delete
parameter: 
{
    "id": 1
}
result:
{
    "success": true,
    "message": "Product deleted successfully"
}

Edit {id} Product / Brand
Method: POST
Authentication : bearer <Token>
url : {url:port} /api/products/edit
parameter: 
{
        "name": "Laptop",
        "sku": "SKU001",
        "brand": "ASUS ROG",
        "id":1
}
result:
{
    "success": true,
    "message": "Edit Product Brand Berhasil"
}

Edit {id} Varian 
Method: POST
Authentication : bearer <Token>
url : {url:port} /api/varian/edit
parameter: 
{
        "name": "Ram 36 GB SSD",
        "sku": "SK005",
        "price": 450000000,
	"id":1
}
result:
{
    "success": true,
    "message": "Edit Varian Berhasil"
}
