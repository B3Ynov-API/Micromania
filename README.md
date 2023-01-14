<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## ROUTES
### USERS: 

- GET http://127.0.0.1:8000/api/users Route servant à récupérer la liste de tout les utilisateurs 
- POST http://127.0.0.1:8000/api/users Route servant à ajouter un utilisateur
    * Paramètre demandé: 
        - name
        - email
        - password
        - password_confirmation
        - role_id
- GET http://127.0.0.1:8000/api/users/{'id de l'utilisateur'} Route servant à récupérer un utilisateur en fonction de son identifiant dans la bdd
- PUT http://127.0.0.1:8000/api/users/{'guid de l'utilisateur'} Route servant à modifier un utilisateur
    * Paramètre demandé: 
        - name
        - email
        - role_id
        ```
        Le password n'est pas modifiable
        ```
- DEL http://127.0.0.1:8000/api/users/{'guid de l'utilisateur'} Route servant à supprimer un utilisateur de la bdd
### PRODUCTS: 
- GET http://127.0.0.1:8000/api/products Route servant à récupérer la liste de tout les produits 
- POST http://127.0.0.1:8000/api/products Route servant à ajouter un produit
    * Paramètre demandé: 
        - name
        - price
        - category_id

- GET http://127.0.0.1:8000/api/products/{'id du produit'} Route servant à récupérer un produit en fonction de son identifiant dans la bdd
- PUT http://127.0.0.1:8000/api/products/{'id du produit'} Route servant à modifier un produit
    * Paramètre demandé: 
        - name
        - price
        - category_id

- DEL http://127.0.0.1:8000/api/products/{'id du produit'} Route servant à supprimer un produit de la bdd


### PURCHASES: 
- GET http://127.0.0.1:8000/api/purchases Route servant à récupérer la liste de toute les factures 
- POST http://127.0.0.1:8000/api/purchases Route servant à ajouter une facture
    * Paramètre demandé: 
        - product_ids[] (tableau des identifiants des produits)
        - product_quantities[] (tableau des quantités)

- GET http://127.0.0.1:8000/api/purchases/{'id de la facture'} Route servant à récupérer une facture en fonction de son identifiant dans la bdd

- DEL http://127.0.0.1:8000/api/purchases/{'id de la facture'} Route servant à supprimer une facture de la bdd


### CATEGORIES: 
- GET http://127.0.0.1:8000/api/categories Route servant à récupérer la liste de tout les catégories
- POST http://127.0.0.1:8000/api/categories Route servant à ajouter une catégorie
    * Paramètre demandé: 
        - description
- GET http://127.0.0.1:8000/api/categories/{'id de la catégorie'} Route servant à récupérer une catégorie en fonction de son identifiant dans la bdd
- PUT http://127.0.0.1:8000/api/categories/{'id de la catégorie'} Route servant à modifier une catégorie
    * Paramètre demandé: 
        - description

- DEL http://127.0.0.1:8000/api/categories/{'id de la catégorie'} Route servant à supprimer une catégorie de la bdd


### GENRES: 
- GET http://127.0.0.1:8000/api/genres Route servant à récupérer la liste de tout les genres 
- POST http://127.0.0.1:8000/api/genres Route servant à ajouter un genre
    * Paramètre demandé: 
        - description

- GET http://127.0.0.1:8000/api/genres/{'id du genre'} Route servant à récupérer un genre en fonction de son identifiant dans la bdd
- PUT http://127.0.0.1:8000/api/genres/{'id du genre'} Route servant à modifier un genre
    * Paramètre demandé: 
        - description

- DEL http://127.0.0.1:8000/api/genres/{'id du genre'} Route servant à supprimer un genre de la bdd

### USERS

POST http://127.0.0.1:8000/oauth/token
- grant_type (mode d'identification (ici à mettre en 'password'))
- client_id
- client_secret
- username
- password