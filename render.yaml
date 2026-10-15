databases:
  # La base de données PostgreSQL gérée par Render
  - name: resource-db
    plan: free
    databaseName: resource_db
    user: resource_user

services:
  # Ton application Web
  - type: web
    name: resource-app
    env: docker
    plan: free
    dockerfilePath: ./Dockerfile
    envVars:
      - key: APP_ENV
        value: prod
      - key: APP_SECRET
        generateValue: true
      - key: DATABASE_URL
        fromDatabase:
          name: resource-db
          property: connectionString