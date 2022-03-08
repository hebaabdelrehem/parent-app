[![N|Solid](https://s3.eu-west-2.amazonaws.com/parent-documents/assets/parent_logo.png)](http://parent.eu)

## Code Challenge !
We have two providers collect data from them in json files we need to read and make some filter operations on them to get the result

## Solution
### Filtering from multiple data sources functionality

* This request will return all the users' data that meet the criteria of the filter.
*  Get request To [http://your_local_endpoint/api/v1/users](http://127.0.0.1/api/v1/users)
* possible payload should be like the example below
```
?provider='' => should be one of your data providers name. like 'ProviderX'
?currency='' => should be an string contains currency like 'USD'
?balanceMin='' => should be an integer contains min balance
?balanceMax='' => should be an integer contains max balance
?status='' => should be one of ['authorised','decline','refunded']
```
* response should be like
```
[ {
        "provider": "DataProviderX",
        "balance": 200,
        "currency": "USD",
        "email": "parent1@parent.eu",
        "status": 1,
        "date": "2018-11-30",
        "parentId": "d3d29d70-1d25-11e3-8591-034165a3a613"
    },
    {
        "provider": "DataProviderY",
        "balance": 300,
        "currency": "AED",
        "email": "parent2@parent.eu",
        "status": 100,
        "date": "22/12/2018",
        "parentId": "4fc2-a8d1"
    }
    ]
```


##Scalability and maintainability

### How to add new data provider easily ?
 1- Just add new class in app/DataProviders with the name of your new provider. <br>
 2- Extend DataProviderAbstract to your new class and implement the prototype function in your way . <br>
 3- Upload the new json file from your new provider to ```storage/app/public/data```. <br>


## Deployment

### laravel sail

1- just use the command ```./vendor/bin/sail up``` . <br>
2- After running the command laravel sail will give you a docker link. <br>


## Testing

### Running unit test PHPUnit

1- use the command ```./vendor/bin/phpunit``` <br>
2- All tests will be run.
 
