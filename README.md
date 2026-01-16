# Laravel Cognee

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wishborn/laravel-cognee.svg?style=flat-square)](https://packagist.org/packages/wishborn/laravel-cognee)
[![Total Downloads](https://img.shields.io/packagist/dt/wishborn/laravel-cognee.svg?style=flat-square)](https://packagist.org/packages/wishborn/laravel-cognee)
[![License](https://img.shields.io/packagist/l/wishborn/laravel-cognee.svg?style=flat-square)](https://packagist.org/packages/wishborn/laravel-cognee)

A Laravel wrapper for the [Cognee PHP SDK](https://github.com/wishborn/php-cognee-sdk) - Transform raw data into persistent AI memory for your Laravel applications.

## Requirements

- PHP 8.2 or higher
- Laravel 11.x or 12.x
- A running Cognee instance

## Installation

Install the package via Composer:

```bash
composer require wishborn/laravel-cognee
```

The package will automatically register its service provider and facade.

### Publish Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --tag=cognee-config
```

This will create a `config/cognee.php` file in your application.

## Configuration

Add the following environment variables to your `.env` file:

```env
COGNEE_BASE_URL=http://localhost:8000
COGNEE_API_KEY=your-api-key
COGNEE_TIMEOUT=30
COGNEE_RETRY_ATTEMPTS=3
```

## Usage

### Using the Facade

```php
use Wishborn\Cognee\Facades\Cognee;

// Create a dataset
$dataset = Cognee::datasets()->create('my-dataset');

// Add data to a dataset
Cognee::datasets()->add(new AddDataRequest(
    data: 'Your text content here',
    datasetId: $dataset->id,
));

// Cognify (process into knowledge graph)
Cognee::datasets()->cognify(new CognifyRequest(
    datasetIds: [$dataset->id],
));

// Search the knowledge graph
$results = Cognee::search()->search(new SearchRequest(
    query: 'your search query',
    searchType: SearchType::CHUNKS,
    datasetIds: [$dataset->id],
));
```

### Using Dependency Injection

```php
use Wishborn\Cognee\CogneeManager;

class MyController extends Controller
{
    public function __construct(
        protected CogneeManager $cognee
    ) {}

    public function search(Request $request)
    {
        $results = $this->cognee->search()->search(
            new SearchRequest(
                query: $request->input('query'),
                searchType: SearchType::CHUNKS,
            )
        );

        return response()->json($results);
    }
}
```

### Accessing the SDK Client Directly

For advanced operations not covered by the wrapper methods:

```php
$client = Cognee::client();

// Use any SDK method directly
$auth = $client->auth();
$permissions = $client->permissions();
```

## Available Methods

### Datasets

- `Cognee::datasets()->create($name, $metadata)` - Create a new dataset
- `Cognee::datasets()->list()` - List all datasets
- `Cognee::datasets()->get($id)` - Get a specific dataset
- `Cognee::datasets()->delete($id)` - Delete a dataset
- `Cognee::datasets()->add($request)` - Add data to a dataset
- `Cognee::datasets()->cognify($request)` - Process data into knowledge graph
- `Cognee::datasets()->getGraph($id)` - Get dataset graph
- `Cognee::datasets()->getStatus($id)` - Get dataset processing status

### Search

- `Cognee::search()->search($request)` - Search the knowledge graph
- `Cognee::search()->history()` - Get search history

### Health

- `Cognee::health()->check()` - Basic health check
- `Cognee::health()->detailed()` - Detailed health check

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email security@example.com instead of using the issue tracker.

## Credits

- [Wishborn](https://github.com/wishborn)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
