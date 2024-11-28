
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

Migrate database

```bash
  php artisan migrate
```

Start the server

```bash
  php artisan serve
```

## API Reference


### Add new Property
```bash
  POST api/properties
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required**. Name of property  |
| `type`      | `string` | **Required**. Type of property  ```Apartment```or```House``` |
| `address`      | `string` | **Required**. Address of property  |
| `bedrooms`      | `integer` | **Required**. number of bedrooms of the property |
| `size`      | `integer` | **Required**. Size of property  |
| `price`      | `integer` | **Required**. Price of property  |
| `lat`      | `integer` | **Optional**. Latitude of property  |
| `lon`      | `integer` | **Optional**. Longitude of property  |


#### Get all properties

```bash
  GET api/properties
```

#### Get property by id

```bash
  GET api/properties/{id}
```




### Update Property
```bash
  PUT|PATCH api/properties/{id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Optional**. name of property  |
| `type`      | `string` | **Optional**. Type of property  ```Apartment```or```House``` |
| `address`      | `string` | **Optional**. Address of property  |
| `bedrooms`      | `integer` | **Optional**. number of bedrooms of the property |
| `size`      | `integer` | **Optional**. Size of property  |
| `price`      | `integer` | **Optional**. Price of property  |
| `lat`      | `integer` | **Optional**. Latitude of property  |
| `lon`      | `integer` | **Optional**. Longitude of property  |


### Delete Property

```bash
DELETE  api/properties/{id}
```

### Search properties
```bash
  GET api/search/
```
#### Search properties by any parameters of the table below

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Optional**. name of property  |
| `type`      | `string` | **Optional**. Type of property  ```Apartment```or```House``` |
| `address`      | `string` | **Optional**. Address of property  |
| `size`      | `integer` | **Optional**. Id of property  |
| `bedrooms`      | `integer` | **Optional**. number of bedrooms of property |

### Search properties geographically
To search Properties by a geographical (Lat/Lon) point and a
radius distance from it

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `lon`      | `integer` | **Required** Longitude  |
| `lat`      | `integer` | **Required** Latitude  |
| `radius`      | `integer` |**Required**  Radius distance |



## Features to be added later

- Authentication
- Property Image upload
- Property to user relationship
- Property Video Previews
- 
