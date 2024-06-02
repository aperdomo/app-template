## About This Project

This is a simple project that I have created as a template to be able to stand up projects or noodle on thoughts. It is dockerized and is composed of:

- A service layer that is using Laravel 11.x
  - And is using Apache as a web server.
- A front end that is using a framework TBD
- A MySQL database.

## Prerequisites

- Docker
- Node
- Ideally a Unix-based shell to be able to utilize the included `Makefile`.

## Initially building the project

1. `make init` - This will initially build + start the project.

## Continuously building the project

- `make build` - This will build the project.
- `make start` - This will start the project.
- `make stop` - This will stop the project.
- `make restart` - This will restart the project.

## Testing the Project

1. `make test` - This will run tests.

## License

- [MIT license](https://opensource.org/licenses/MIT).
