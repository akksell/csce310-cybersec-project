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