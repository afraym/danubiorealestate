
# Danubio Realestat API 🏠

A simple Realestat inentory managemnt API build on PHP Laravel


## Run Locally

Clone the project

```bash
  git clone https://github.com/afraym/danubiorealestate.git
```

Go to the project directory

```bash
  cd danubiorealestate
```

Install dependencies

```bash
  composer install
```
copy ```env.example``` to ```env.``` and add your database info

Start the server

```bash
  php artisan serve
```


## API Reference

#### Get all properties

```http
  GET api/properties
```


#### Get property by id

```http
  GET api/properties/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of property to fetch |

```http
  GET api/search/
```
to search properties by any parameters of the table below
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Optional**. name of property to search for |
| `type`      | `string` | **Optional**. Type of property to search for ```Apartment```or```House```|
| `address`      | `string` | **Optional**. Address of property to search for |
| `size`      | `integer` | **Optional**. Id of property to search for |
| `bedrooms`      | `integer` | **Optional**. Id of property to search |
| `size`      | `integer` | **Optional**. Size of property to search  |

#### add(num1, num2)

Takes two numbers and returns the sum.

