# docker_php_bootstrap
Project template for web development on PHP and MySQL.
Includes PHP, MySQL (actually, MariaDB), Xdebug (debugger and profiler) and Adminer.

## Directories
1. containers: Docker containers and its internal services (Nginx, PHP) configs
2. database: InnoDB files
3. logs: webserver access and errors logfiles, xdebug profiler output
4. php-code: PHP application sources

## Notes
### Xdebug 
Xdebug can be turned off by editing XDEBUG_CONFIG environment key of fpm service 
in docker-compose.yml: ```remote_enable=0```

```profiler_enable=1``` turns on profiler (and slows down performance, be careful) 

Intellij IDEA/PHPStorm Xdebug setup:
1. set in Settings => Languages and Frameworks => PHP => Debug => DBGp Proxy 
- `IDE KEY=<idekey in XDEBUG_CONFIG>`
- `Host=<remote_host in XDEBUG_CONFIG>`
- `Port 8083`
2. Turn `Listen for debugger connections` on
3. Put breakpoints and refresh page

Remote host IP is the address of machine IDE is working on.        

### Database
Default credentials are in environment variables of db service

## How to use:
1. clone project
2. change `remote_host` in docker-compose.yml => fpm => XDEBUG_CONFIG to current machine IP
3. `docker-compose up` in project directory (or `docker-compose up -d` to daemonize)
4. open browser and points in to main page  

## Addresses
- [Main page](http://localhost:8080): http://localhost:8080
- [Adminer](http://localhost:8081): http://localhost:8081
- [DB](mysql://root:example@localhost:8082): mysql://root:example@localhost:8082
