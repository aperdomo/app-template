#!/bin/sh

# Perform setup tasks here

npm install && npm run dev

# Then start the main process
exec "$@"
