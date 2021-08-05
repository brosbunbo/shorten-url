# Shorten URL demo

## Deployment
```bash
bash docker/up.sh
```

Site is available at http://localhost:3000

## Commands
- Run test:
```bash
docker-compose exec laravel.test bash -c "php artisan test"
```

## Endpoints
- `POST /api/shorten-url`: Create short link
- `GET /api/shorten-url`: List url (for Admin)
- `DELETE /api/shorten-url/{id}`: Delete a url (for Admin)
- `GET /{code}`: Short link

## Demo criteria
- [x] API Client can send a url and be returned a shortened URL.

- [x] API Client can specify an expiration time for URLs, expired URLs must return HTTP 410

- [x] Input URL should be validated and respond with error if not a valid URL

- [x] Regex based blacklist for URLs, urls that match the blacklist respond with an error
  
-> blacklist is defined by .env `SHORTEN_URL_BLACKLIST`

- [x] Visiting the Shortened URLs must redirect to the original URL with a HTTP 302 redirect, 404 if not found.

- [x] Hit counter for shortened URLs (increment with every hit)

- [x] Admin api (requiring token) to list
    - Short Code
    - Full Url
    - Expiry (if any)
    - Number of hits

-> Simple admin authentication is located at [app/Http/Middleware/AuthAdminMiddleware.php](app/Http/Middleware/AuthAdminMiddleware.php)

Admin token is defined by .env `SHORTEN_URL_ADMIN_TOKEN`

- [x] Above list can filter by Short Code and keyword on origin url.

- [x] Admin api to delete a URL (after deletion shortened URLs must return HTTP 410)

- [x] BONUS: Add a caching layer to avoid repeated database calls on popular URLs

-> Using built in feature of [l5-repository library](https://github.com/andersao/l5-repository#cache)
