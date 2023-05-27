# Moka - API Tests

## Requirements

PHP 8.1 and later.

## Dependencies

The bindings require the following extensions in order to work properly:

-   [`curl`](https://secure.php.net/manual/en/book.curl.php)
-   [`json`](https://secure.php.net/manual/en/book.json.php)

## SSL / TLS
PCI-DSS rules only allow the use of TLS 1.2 and above protocols. Please ensure that your application POST to Moka URL over these protocols. Otherwise, errors such as 'Connection will be closed or Connection Closed' will be received.
