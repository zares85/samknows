SamKnows backend test
=====================
[Requirements](https://github.com/SamKnows/backend-test)

Instructions
------------
Copy the file `config/database.json.dist` to `config/database.json` and modify it accordingly to your database connection

Run the following command to install the tables in your database
`bin/console install`

Run the following command to import the metrics into database
`bin/console import http://tech-test.sandbox.samknows.com/php-2.0/testdata.json`