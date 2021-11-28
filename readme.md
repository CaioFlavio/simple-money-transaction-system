# Summary

[Simple money transaction](#simple-money-transaction)  
[1. Feature Mapping](#1-feature-mapping)  
[2. Running Local](#2-running-local)  
[Development References](#development-references)

# Simple Money Transaction

This is a study case of a system that simulates some usual transactions between users. 

# 1. Feature Mapping

There are only two type of users **Personal** and **Business** and in this system we will implement some features. The current mapped features are listed below. Feature suggestion are welcome feel free to [create a issue](https://github.com/CaioFlavio/simple-money-transaction-system/issues/new) with the _enhancement_ label.

- [ ]  Personal users:
  - [ ] Basic Features
    - [ ] Register:
      - [ ] Required Information
        - [ ] Full name
        - [ ] CPF 
        - [ ] E-mail
        - [ ] Password
      - [ ] Required Restrictions
        - [ ] Email should be unique 
        - [ ] CPF should be unique
      - [ ] Additional
        - [ ] Email confirmation
    - [ ] Transactions
      - [ ] Basic Features
        - [ ] Add funds to the account
        - [ ] Remove funds from the account
        - [ ] Transfer funds to **Personal** users
        - [ ] Transfer funds to **Business** users
        - [ ] Receive funds from **Personal** users
        - [ ] Receive funds from **Business** users
      - [ ] Restrictions
        - [ ] Must have funds to remove funds action
        - [ ] Must have funds to transfer to other accounts
        - [ ] Must validate the transference action using this [data](https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6)
        - [ ] On trasfer fail must return the funds
      - [ ] Notifications
        - [ ] Notify user when a transaction occur
        - [ ] Validate the notify action using this [data](http://o4d9z.mocklab.io/notify)
      - [ ] Additional Features
        - [ ] Apply a defined tax after a defined amount of free transactions

- [ ] Business users :
  - [ ] Basic Features
    - [ ] Register:
      - [ ] Required Information
        - [ ] Company name
        - [ ] CNPJ 
        - [ ] E-mail
        - [ ] Password
      - [ ] Required Restrictions
        - [ ] Email should be unique 
        - [ ] CNPJ should be unique
      - [ ] Additional
        - [ ] Email confirmation
    - [ ] Transactions
      - [ ] Basic Features
        - [ ] Add funds to the account
        - [ ] Remove funds from the account
        - [ ] Receive funds from **Personal** users
        - [ ] Receive funds from **Business** users
      - [ ] Restrictions
        - [ ] Must have funds to remove funds action
        - [ ] Must validate the transference action using this [data](https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6)
        - [ ] On trasfer fail must return the funds
      - [ ] Notifications
        - [ ] Notify user when a transaction occur
        - [ ] Validate the notify action using this [data](http://o4d9z.mocklab.io/notify)
      - [ ] Additional Features
        - [ ] Apply a defined tax when funds are received

# 2. Running Local

## 2.1 System Requirements
  - Git (Tested on version 2.25.1)
    -  If you dont have Git installed [click here](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git) and follow the installation guide.
  - Docker version 20.10.11 or higher (Tested on version 20.10.11)
    - If you dont have docker installed [click here](https://docs.docker.com/engine/install/) and follow the installation guide.

## 2.2 First Steps
  - In your terminal run:
    - git clone git@github.com:caioflavio/smts.git
  - Enter on folder project: 
    - cd smts 
  - On the first run you need create the .env file that have the enviroment variables
    - cp .env.example .env
  - After copied the .env file you can proceed to run the project:
    - ./vendor/bin/sail up
  - By default the project is running on port 8081, it can be changed in .env changing the APP_PORT value.

# Development References
 - [Laravel Framework](https://laravel.com/docs/8.x/installation) - PHP Framework used on development
 - [Laravel Sail](https://laravel.com/docs/8.x/sail) - Laravel's built-in docker container for application start 
