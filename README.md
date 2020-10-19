In order to run it on the server side PHP require> = 7.2

Single entry point is the index.php file located in the root directory.

In this example, I have implemented the most simple version of the autoloaderfor classes to demonstrate how that feature works.

The file /config/settings.php containes parameters -> please fill it with credentials to connect third party api's.


Each class contains a minimal set of code, so most of the code (I think) shouldbe intuitive. 
Nevertheless, I tried to give in each file at least a brief description.

To run it every 10 minutes we can use cronjob on server like this:

*/10 *   * * *  cd /var/www/html; /usr/local/bin/php index.php >/dev/null 2>&1

Currently I have no much time but maybe later I will make docker container that will run this code.

Sincerely,