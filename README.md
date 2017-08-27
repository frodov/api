### Phalcon API for TESTING propose

#### Installation:

- First step is cloning the project:
    https://github.com/

- Second step is downloading and installing phalcon.dll
  - For windows:
       - DLL: https://phalconphp.com/en/download/windows
       - Wampp and Phalcon: https://docs.phalconphp.com/en/3.2/webserver-wamp
  - For Linux: https://phalconphp.com/en/download/linux

- Third step installing composer (if you already have composer skip this step)
    - https://getcomposer.org/download/

- Fourth step:
    `composer install` into the project already downloaded

Now you have all the dependency and your project is ready to run.

## DataBase configuration:
- Creating database:

- Adding example data:

## How To Consume:

- URL composition:
    - First the path to the project http://localhost/your-project-path/
    - Second the key word 'service'
    - Third the mode you going to use.
        - Modes: add, delete, filter
        - Example url with mode: http://localhost/your-project-path/service/filter/

## Modes:

#### Filter:

  - You don't need an specific order for the construction of the differents parameters
  - You MUST set the name of the key word separate with colon (:) and the variable you want to work.
    - Posible key words: id, color, milage, price, year, mark, model.
        - id: represent the idenfier for the vehicule `ínt`
        - type: represent the type of vehicle `ínt`
            - example: car, motorcycle, etc.
        - color: the color of the vehicle `string`
        - milage: the milage of the vehicle `int`
        - price: the price of the vehicle `float`
        - year: year of the vehicle `string with only 4 characters`
            - example: `2017`
        - mark: the mark of the vehicle `string`
        - model: the model of the vehicle `string`
    - Example url with multiple variables: http://localhost/techo/service/filter/color:red/mark:cherry/price:10000/model:qq/year:2011/
    - Please notice, if you want to make a filter with between options you MUST separate the range with colon, you only can add between filter to: price, year and milage.
      - example: http://localhost/techo/service/filter/year:2007:2017/price:0:100000/milage:2:100000/

#### Add:
  - You MUST complete all the key word (without the id).
    - Example: http://localhost/techo/service/add/color:yellow/model:3/mark:susuki/price:100000/year:2018/milage:2500/type:2
#### Delete:
   - You MUST set the identifier you want to delete.
    - Example: http://localhost/techo/service/delete/id:10

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
    - 9000 for an error.
- error: short description.
- messages: short description.
- data: the response data.
