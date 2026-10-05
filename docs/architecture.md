# Application architecture

This application uses a service-oriented modular monolith. HTTP, domain use
cases, and persistence remain in one Laravel application and deployment, while
service contracts provide boundaries between controllers and domain behavior.

## Request flow

`routes` -> `Http\Controllers` -> `Contracts` -> `Services` -> `Models` / database

Controllers adapt HTTP and Inertia requests; they should not contain domain
queries or business rules. Services implement use cases, and contracts keep
controllers independent from implementation details. Bind contract
implementations in `AppServiceProvider`.

The post-listing flow is the first service-backed feature:

- `App\Contracts\Posts\PostService` defines the post-listing boundary.
- `App\Services\Posts\EloquentPostService` implements it with Eloquent.
- `PostController` consumes the contract, resolved by Laravel's container.

Add new functionality within its domain service and expose only the required
contract operations. Keep persistence local until a domain has a concrete need
for independent deployment; extracting a service later should preserve its
contract and replace the implementation at the composition root.
