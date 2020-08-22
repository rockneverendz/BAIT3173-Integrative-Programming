# BAIT3173 Integrative Programming Assignment 202005

| ID         | Name                  |
| ---------- | --------------------- |
| 19WMR09552 | Brendan Chew Jian Wen |
| 19WMR09572 | Chong Ken Shen        |
| 19WMR09644 | Lok Wah Chee          |
| 19WMR09653 | Ng Shaw Fann          |
| 19WMR09678 | Soo Cia Yang          |

## Prerequisite 
XAMPP  
Composer

## How to run
 1. Uncomment `extension=xsl` on `C:\xampp\php\php.ini`
 2. Open command prompt on root directory (where this README.md is located)
 3. `composer update`
 4. Duplicate `.env.example` and rename it `.env`, skip if it already exists.
 5. `php artisan key:generate`
 6. Using XAMPP, open MySQL admin panel
 7. Create MySQL database named `canteensystem`
 8. Update `DB_DATABASE` in `.env` to `canteensystem`
 9. `php artisan storage:link`
10. `php artisan migrate`
11. `php artisan db:seed`
12. `php artisan serve`

## FAQ

### Reset password not working!

`.env` need to have email configured.

### Broken image links!

Run `php artisan storage:link`

### Rebuild Database!

Run `php artisan migrate:refresh --seed`

## Add admin account through tinker

    php artisan tinker

    $admin = new App\Admin
    $admin->name = "sample_name"
    $admin->description = "sample description"
    $admin->email = "sample.email@gmail.com"
    $admin->password = Hash::make('sample_password')
    $admin->save()



- PHP and MySQL/MariaDB
    - We will use PHP and MySQL (XAMPP)
- Design patterns *(Chapter 3)*
    - Probably the only hard part in this assignment
    - [Refactoring Guru](https://refactoring.guru/design-patterns/catalog)
    - 30 min to 1 hour per pattern deep dive by [Christopher Okhravi](https://www.youtube.com/playlist?list=PLrhzvIcii6GNjpARdnO4ueTUAVR9eMBpc)
- Secure coding practices *(Chapter 2)*
    - Server-side validation
    - Logging?
    - Sanitize Input?
    - Limit number of login attempts?
- XML, XSLT and XPath *(Chapter 4)*
    - Everytime the canteen admin update the menu a new XML file is generated
    - The XML contains the menu
    - Customer view XML instead of getting from database
- Web service technology *(Chapter 5A)*
    - REST API for mobile (just create another project to pretend it is a mobile application)
    - For food menu viewing and ordering?