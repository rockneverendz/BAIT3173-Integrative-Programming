# BAIT3173 Integrative Programming Assignment 202005

| ID         | Name                  |
| ---------- | --------------------- |
| 19WMR09552 | Brendan Chew Jian Wen |
| 19WMR09572 | Chong Ken Shen        |
| 19WMR09644 | Lok Wah Chee          |
| 19WMR09653 | Ng Shaw Fann          |
| 19WMR09678 | Soo Cia Yang          |

The XSLT files are at `public\xsl\`

## Prerequisite 
> XAMPP  
> Composer  
> Postman

## How to run
 1. Install this project in `C:\xampp\htdocs`
 2. Uncomment `extension=xsl` on `C:\xampp\php\php.ini`
 3. Open command prompt on root directory (where this README.md is located)
 4. `composer update`
 5. Duplicate `.env.example` and rename it `.env`, skip if it already exists.
 6. `php artisan key:generate`
 7. Using XAMPP, open MySQL admin panel
 8. Create MySQL database named `canteensystem`
 9. Update `DB_DATABASE` in `.env` to `canteensystem`
10. `php artisan storage:link`
11. `php artisan migrate`
12. `php artisan db:seed`
13. `php artisan serve`

## How to test API
 1. Import `Bricks.postman_collection.json` into postman
 2. Create an environment called *Bricks*
 3. Create variables called `user_api_token`, `admin_api_token`
 4. At the sidebar, go to **Bricks > Authentication > Login**
 5. At the tabs, click **Body**
 6. Enter values of **email** & **password**
 7. Click **Send**
 8. It should return user information with an `api_token`
 9. Select the token string and right click
10. **Set: Bricks** > **user_api_token**
11. You are ready to test the api

## Seeded Login Credentials

### Student

> Email : `user@gmail.com`  
> Password : `password`  
> (Preloaded with 100 credits)

### Admin

> Email : `masakanmalaysia@gmail.com`  
> Password : `masakanmalaysia`  
> (Preloaded with 6 meals)

> Email : `noodles@gmail.com`  
> Password : `noodles`  
> (Preloaded with 6 meals)

## FAQ

### Register / Reset password not working!

> `.env` need to have email configured.

### Broken image links!

> Run `php artisan storage:link`

### Rebuild Database!

> Run `php artisan migrate:refresh --seed`

### Enable/Disable debug mode

> `.env` file `APP_DEBUG=?`,  
> `true` to Enable,  
> `false` to Disable.

## Add admin account through tinker

    php artisan tinker

    $admin = new App\Admin
    $admin->name = "sample_name"
    $admin->description = "sample description"
    $admin->email = "sample.email@gmail.com"
    $admin->password = Hash::make('sample_password')
    $admin->save()