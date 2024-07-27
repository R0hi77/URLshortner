# URL Shortening Service

## Installation

1. Clone the repository.
2. Import the `db.sql` file into your MySQL database.
3. Update the database configuration in `config.php`.
4. Start the PHP built-in server:

## Endpoints

### Encode URL

- URL: `/encode`
- Method: `POST`
- Body: `{"url": "https://example.com"}`

### Decode URL

- URL: `/decode`
- Method: `POST`
- Body: `{"short_code": "abc123"}`
  