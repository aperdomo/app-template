#!/bin/sh

# Navigate to your application's directory
cd /app

# Build your application
npm run build

# Then start the main process
exec "$@"
