SamKnows backend test
=====================
[Requirements](https://github.com/SamKnows/backend-test)

Instructions
------------
1. Run `composer install`

1. Copy the file `config/database.json.dist` to `config/database.json` and modify it accordingly to your database connection

1. Run the following command to install the tables in your database
`bin/samknows install`

1. Run the following command to import the metrics into database
`bin/samknows import http://tech-test.sandbox.samknows.com/php-2.0/testdata.json`

1. You can now aggregate results running the following command
`bin/samknows aggregate <unit> <metric> [<hour>]`