# Products API

This API is developed on php using Symfony 6.1 version using a MariaDB relational database.
Files products_api_db.sql and products_api_db_test.sql are included to restore project's database and test database.

## Explanation

Application has only one Controller that handles the request **/api/products** get request and returns some json response.
To transform  the data to fit the requirememts  uses **TransformServiceTest**, **CalculateProductFinalPriceTest**, **ProductDiscountServiceTest**.


## Example url's

1. http://localhost:8000/api/products
2. http://localhost:8000/api/products?category=sneakers
3. http://localhost:8000/api/products?priceLessThan=50000
4. http://localhost:8000/api/products?priceLessThan=50000&category=sneakers

## Comands
1. Execute **symfony server:start** inside project's folder to run  the application
2. Execute  **php bin/phpunit**inside project's folder to run  the application



