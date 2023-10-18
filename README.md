# CSCE 310 - Cybersec Class Project

This is our final project for TAMU CSCE 310 - Database Design.

## Project Requirements
[Project Requirements](https://canvas.tamu.edu/courses/247645/pages/class-project-description?module_item_id=8738202)

Alternatively, the requirements can be found [here](./docs/REQUIREMENTS.md), though they may not be up to date.

## Installation

Prerequisites:
- This project assumes you have docker installed. If you don't, you can install it from [here](https://www.docker.com/products/docker-desktop/)

To get started with the project, clone the repo using ssh into a local folder.
```bash
cd path/to/your/folder
git clone git@github.com:akksell/csce310-cybersec-project.git
```

To start the server, run the docker-compose file in the root of the project:
```bash
docker-compose up
```

You can access the frontend application at http://localhost:8080

## Managing the Database

The CodeIgniter framework uses something called spark which comes pre-installed. Since we're using Docker containers, you'll need to access the container terminal to run migrations and use spark (this is just like CSCE 431 - Software Engineering w/ Ruby on Rails)

Instructions:
1. Make sure your docker container is started and up to date. You can check if it's up to date by looking at the Dockerfile in main and comparing the version label there with the **_apache-app_** container version.
2. Get the id of the **_apache-app_** container with the ps command. This results in the following output. You'll want to copy the container id for csce310-apache

```bash
docker ps
```

```bash
# example output
CONTAINER ID   IMAGE            COMMAND                  CREATED         STATUS         PORTS                               NAMES
3ae7c2577593   csce310-apache   "docker-php-entrypoi…"   5 minutes ago   Up 5 minutes   0.0.0.0:8080->80/tcp                apache-app
637d3b485838   mysql            "docker-entrypoint.s…"   5 minutes ago   Up 5 minutes   0.0.0.0:3306->3306/tcp, 33060/tcp   mysql-db                                   
```

3. Step into the container bash shell:
```bash
docker exec -it <container_id> /bin/bash
```

```bash
# example running with the previous container id
$ docker exec -it 3ae7c2577593 /bin/bash

# you should see the following output and
# be in the docker container bash shell
root@3ae7c2577593:/var/www/html $
```
4. Run spark
```bash
php spark
```

```bash
# example from inside a container
root@3ae7c2577593:/var/www/html $ php spark

# output

CodeIgniter v4.4.1 Command Line Tool - Server Time: 2023-10-18 16:17:15 UTC+00:00

Cache
  cache:clear        Clears the current system caches.
  cache:info         Shows file cache information in the current system.

...
```

The most useful commands for managing the database will be:
- **make:migration** (creates a migration file in app/Database/Migrations)
- **migrate** (updates the database to the most recent version)

There are also a ton of useful commands that you can see just by running the `php spark` command.

To run any of the commands just do `php spark <command>` along with any of the necessary arguments for the command.

## Tech Stack
- Apache
- PHP
- MySQL

Frameworks:
- [CodeIgniter 4](https://codeigniter.com/user_guide/index.html)

We may possibly implement React in the frontend for better UX using a CDN.

## Architecture
### ERD
![ERD](https://lucid.app/publicSegments/view/d4f4cf60-69f0-4863-a128-20287ec1d0be/image.png)

### Local Architecture
![Local Architecture](/docs/images/local_architecture.png)