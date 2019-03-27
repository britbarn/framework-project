# Local Setup

## Spin up Vagrant box
```
vagrant up
```

## Install PHPUnit as well as phinx
```
composer install
```

- Rename config.example.php to config.php
- Credentials do not need to be changed because they are the dummy credentials


## migrate the database

```
vendor/bin/phinx migrate -e development
```

