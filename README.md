## About This Project

This is a simple template for conveniently standing up full-stack projects. It is dockerized and is composed of:

- An app service layer that is using Laravel 11.x
  - + is using Apache as a web server.
- A frontend layer using React.
  - is using Vite as a frontend build tool.
- A MySQL database.

When initally built, the Laravel application should be accessible at:

```apacheconf
http://localhost:8000
```

.. and the React application should be accessible at:

```apacheconf
http://localhost:3000
```

## Prerequisites

- Docker
- Ideally a Unix-based shell to be able to utilize the included `Makefile`.

## Initially building the project

1. `make init` - This will initially build + start the project.

## Continuously building the project

- `make build` - This will build the project.
- `make start` - This will start the project.
- `make stop` - This will stop the project.
- `make restart` - This will restart the project.
- `make migrate-fresh-seed` - This will blow away and run fresh database migrations.
- `make build-assets` - This will build the frontend assets.
- `make test` - This will run tests.

### Additional Makefile commands

- `make ssh` - This is a shortcut to shell into the app container.
- `make list-routes` - This is a shortcut to list what routes are available in the application.
