Here's a step-by-step guide for running the Virtual Library RESTful Application:

- Clone the Repository: Clone the repository to your local machine using the following command:
    git clone https://github.com/okonu/virtual_library.git

- Navigate to the Project Directory: Change your current directory to the cloned repository:

    cd virtual_ibrary

- Install Dependencies: Install the PHP dependencies using Composer:
    composer install

- And then install the JavaScript dependencies using npm:

    npm install

- Create .env File: Copy the .env.example file to create a new .env file:

    cp .env.example .env

- Then, open the .env file and update the database and other environment variables as per your local environment.

- Generate an Application Key: Generate a new application key using the following command:

    php artisan key:generate

- Run Migrations: Run the database migrations using the following command:

    php artisan migrate

- Compile Assets: Compile your assets using the following command:

    npm run dev

- Run the Server: Finally, start the Laravel server using the following command:

    php artisan serve

### Endpoints for the Genre module
- GET /genres - Retrieve all genres. No JSON body is required.

- GET /genres/{id} - Retrieve a specific genre by ID. No JSON body is required.

- GET /genres/{genreId}/books - Retrieve books by genre ID. No JSON body is required.

- POST /genres - Create a new genre. The JSON body should contain the following structure:
    
    {
        "name": "Genre Name"
    }


- PUT /genres/{id} - Update an existing genre by ID. The JSON body should contain the updated field. For example:
    
    {
        "name": "Updated Genre Name"
    }

- DELETE /genres/{id} - Delete a genre by ID. No JSON body is required.

### Endpoints for the Author module
- GET /authors - Retrieve all authors. No JSON body is required.

- GET /authors/{id} - Retrieve a specific author by ID. No JSON body is required.

- POST /authors - Create a new author. The JSON body should contain the following structure:
    
    {
        "name": "Author Name",
        "gender": "Author Gender",
        "age": Author age(integer),
        "country": "Author Country",
        "genre_id": Genre ID(integer)
    }

- PUT /authors/{id} - Update an existing genre by ID. The JSON body should contain the updated field. For example:
    
       {
            "name": "Updated Author Name",
            "gender": "Updated Author Gender",
            "age": Updated Author age(integer),
            "country": "Updated Author Country",
            "genre_id": Updated Author ID(integer)
        }

- DELETE /authors/{id} - Delete an author by ID. No JSON body is required.

### Endpoints for the Books module
- GET /books - Retrieve all books. No JSON body is required.

- GET /books/{id} - Retrieve a specific book by ID. No JSON body is required.

- POST /books - Create a new book. The JSON body should contain the following structure:
    
    {
        "book": "Book Name",
        "ISBN": "Book ISBN",
        "author_id": Author ID(integer)
    }



- PUT /books/{id} - Update an existing book by ID. The JSON body should contain the updated field. For example:
    
       {
            "book": "Updated Book Name",
            "ISBN": "Updated Book ISBN",
            "author_id": Updated Author ID(integer)
        }

- DELETE /books/{id} - Delete a book by ID. No JSON body is required.
