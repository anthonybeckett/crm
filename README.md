# CRM

A simple CRM built with Laravel, VueJS and Intertia.

## Getting started

To start Laravel and the backend run the following command.

```bash
./vendor/bin/sail up -d
```

This will run the server on port `80`. It will also set up a testing mail server using MailPit on port `8025`. MinIO also runs on port `8900` for any persistant file storage similar to S3 or R2.

The database is using SQLite which is stored as a file in the database directory.

To run the frontend, we also need to run:

```bash
./vendor/bin/sail npm run dev
```

Helpful links

- https://vuetifyjs.com/
- https://pictogrammers.com/library/mdi/
