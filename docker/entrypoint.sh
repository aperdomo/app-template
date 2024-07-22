#!/bin/sh

# Start the application
npm install
npm run build
npm run dev -- --host

# Then start the main process
exec "$@"
