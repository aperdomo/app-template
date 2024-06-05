#!/bin/sh

# List the contents of the current directory
ls -al

# Start the application
npm run dev -- --host

# Then start the main process
exec "$@"
