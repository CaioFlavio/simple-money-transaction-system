# Simple Money Transaction

This is a study case of a system that simulates some usual transactions between users. 

---

# Feature Mapping

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
