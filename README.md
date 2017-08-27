### Phalcon API for TESTING purposes

#### Installation:

- First step: Cloning the project:
    https://github.com/frodov/api.git

- Second step: Downloading and installing phalcon.dll
  - For Windows:
       - DLL: https://phalconphp.com/en/download/windows
       - Wampp and Phalcon: https://docs.phalconphp.com/en/3.2/webserver-wamp
  - For Linux: https://phalconphp.com/en/download/linux

- Third step: Installing Composer (if you already have Composer skip this step)
    - https://getcomposer.org/download/

- Fourth step:
    `composer install` into the project already downloaded

Now you have all dependencies installed, your project is ready to run.

## DataBase configuration:
- Creating database:
    - https://github.com/frodov/api/blob/master/structure.sql

- Adding example data:
    - https://github.com/frodov/api/blob/master/data.sql

## How To Consume:

- URL composition:
    - First the path to the project http://localhost/your-project-path/
    - Second the keyword 'service'
    - Third the mode you going to use.
        - Modes: add, delete, filter, edit.
        - Example url with mode: http://localhost/your-project-path/service/filter/

## Modes:

#### Filter:

  - You don't need a specific order for the construction of the different parameters
  - You MUST write the keyword and the variable separate by colon (:)
    - Possible keywords: id, type, color, milage, price, year, mark, model.
        - id: represents the identifier for the vehicle `int`
        - type: represent the type of vehicle `int`
            - example: car, motorcycle, etc.
        - color: the color of the vehicle `string`
        - milage: the milage of the vehicle `int`
        - price: the price of the vehicle `float`
        - year: year of the vehicle `string with only 4 characters`
            - example: `2017`
        - mark: the mark of the vehicle `string`
        - model: the model of the vehicle `string`
    - Example of url without variables:
    http://localhost/api/service/filter/
    - Example of url with multiple variables: http://localhost/api/service/filter/color:red/mark:cherry/price:10000/model:qq/year:2010/
    - Please notice that if you want to filter keywords by values between a range, you MUST separate the variables that determine such range, with colon (:). The only keywords that accept that filter are: price, year and milage.
      - Example: http://localhost/api/service/filter/year:2007:2017/price:0:100000/milage:2:100000/

#### Add:
  - You MUST complete all the keyword (without the id).
    - Example: http://localhost/api/service/add/color:yellow/model:3/mark:susuki/price:100000/year:2018/milage:2500/type:2

#### Delete:
   - You MUST set the identifier you want to delete.
    - Example: http://localhost/api/service/delete/id:10

#### Filter:
   - You MUST set the identifier and the keywords that you want to edit.
    - Example: http://localhost/api/service/edit/id:15/color:green/mark:yamaha

##### Response codes

 - The response has the following structure:

         {
             "status": true,
             "status_code": 200,
             "errors": [],
             "messages": [
                 "Success"
             ],
             "data": [
                 {
                     "id": 3,
                     "mark": "cherry",
                     "model": "qq",
                     "type_id": 1,
                     "milage": 30000,
                     "price": 10000,
                     "color": "red",
                     "year": 2010,
                     "created": "2017-08-26 18:16:31",
                     "modified": "2017-08-26 18:16:31"
                 }
             ]
        }

- status: is the connection.
- status_code:
    - 200 for a success.
    - 310 for an error.
- error: short description.
- messages: short description.
- data: the response data.
