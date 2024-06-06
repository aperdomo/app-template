#!/bin/sh

# Start the application
npm run dev -- --host

# Then start the main process
exec "$@"
