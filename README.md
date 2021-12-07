
## Technologies Used
* PHP 7.4 with Laravel 8
* Mysql
* Docker
## Configuring and running
    cp env.example .env
    docker-compose up -d

## Running migrations (inside the *_app container)
    php artisan migrate
### To clear database and run all (inside the *_app container)
    php artisan migrate:fresh

## Running Seeders (inside the *_app container)
    php artisan db:seed 
    
## Starting queue to listen (inside the *_app container)
    php artisan queue:listen

## Running tests (inside the *_app container)
    php artisan test --filter Lounch

## Stopping containers
    docker-compose down

## Endpoint for api
- Import the file Insomnia.json in Insomina for access valid endpoints


Statement Account

```
Method: GET
Rount: http://localhost:8001/api/statement/{iduser}
Payload: {
	"date": "2021-12-11",
	"user_account": "0000123-4"
}
```

Create Deposit

```
Method: POST
Rount: http://localhost:8001/api/deposit/{iduser}
Payload: {
	"value": 300.50,
	"type": "debit",
	"user_account_debit": "0000123-4",
	"description": "Transferência para PinBom",
	"system": "mobile"
}
```

Create Transfer

```
Method: POST
Rount: http://localhost:8001/api/statement/{iduser}
Payload: {
	"value": 300,
	"type": "credit",
	"user_account_debit": "0000123-4",
	"user_account_credit": "0000124-4",
	"description": "Transferência para PinBom",
	"system": "mobile"
}
```

Country

```
// CREATE
Method: POST
Rount: http://localhost:8001/api/country/
Payload: {
	"name": "Brasil",
	"initials": "BR"
}

// UPDATE
Method: PUT
Rount: http://localhost:8001/api/country/{ID}
Payload: {
	"name": "Mexico",
	"initials": "ME"
}

// DELETE
Method: DELETE
Rount: http://localhost:8001/api/country/{ID}
Payload: {
	
}

// LIST
Method: GET
Rount: http://localhost:8001/api/country/
Payload: {
	
}
	

```

State

```
// CREATE
Method: POST
Rount: http://localhost:8001/api/state/
Payload: {
	"name": "Brasilia",
	"initials": "BB",
	"country_id": 1
}

// UPDATE
Method: PUT
Rount: http://localhost:8001/api/state/{ID}
Payload: {
	"name": "Brasília",
	"initials": "ME",
	"country_id": 1
}

// DELETE
Method: DELETE
Rount: http://localhost:8001/api/state/{ID}
Payload: {
	
}

// LIST
Method: GET
Rount: http://localhost:8001/api/state/
Payload: {
	
}
```

City

```
// CREATE
Method: POST
Rount: http://localhost:8001/api/city/
Payload: {
	"name": "Brasil1",
	"population": "1",
	"state_id": 1
}

// UPDATE
Method: PUT
Rount: http://localhost:8001/api/city/{ID}
Payload: {
	"name": "Brasil1",
	"population": "1",
	"state_id": 1
}

// DELETE
Method: DELETE
Rount: http://localhost:8001/api/city/{ID}
Payload: {
	
}

// LIST
Method: GET
Rount: http://localhost:8001/api/city/
Payload: {
	
}
```
