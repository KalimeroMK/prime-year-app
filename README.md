<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## About test case 
1. **Create the Database and Table:**: 
    - Create a migration to set up the years table with columns for id, year, and day.
2. **Set Up Routes and Controllers:**:
    - Define routes for displaying the form, handling the form submission, and fetching the data. 
    - Create a controller to handle the logic for form submission, prime number calculation, encryption, and data retrieval.

3. **Build the Form and Logic:**:
   - Build a form to input the year and submit it via POST.
   - Calculate prime numbers in reverse order from the given year.
   - Determine the day of the week for Christmas of each prime year.
   - Encrypt and Store Data

4. **Encrypt and Store Data:**:
    - Encrypt the day of the week and store it in the database using prepared statements.
5. **Fetch and Decrypt Data:**:
    - Retrieve the encrypted data from the database, decrypt it, and return it as a JSON object.
6. **Display Data:**:
    - Use AJAX to fetch the decrypted data and display it in a table on the frontend.

**Init project**:

   ```env
   docker compose up -d

   docker compose exec prime_app composer install
   
   docker compose exec prime_app php artisan:migrate```

--**Note**--:

   local adress is 

   http://localhost:81
   
