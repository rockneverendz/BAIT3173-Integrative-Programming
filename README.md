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
Composer & Laravel *(Appendix 3.1 MVC with Laravel)*

## How to run
1. Open command prompt on root directory (where this README.md is located)
2. `composer update`
3. Using XAMPP, open MySQL admin panel
4. Create MySQL database named `canteensystem`
5. Update `DB_DATABASE` in `.env` to `canteensystem`
6. `php artisan migrate`
7. `php artisan serve`

## Reset password not working!

`.env` need to have email configured.

## Add staff account through tinker

    php artisan tinker

    $staff = new App\Staff
    $staff->staff_id_card = "sample_id_card"
    $staff->email = "sample.email@gmail.com"
    $staff->name = "sample_name"
    $staff->password = Hash::make('sample_password')
    $staff->save()



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
    - Everytime the canteen staff update the menu a new XML file is generated
    - The XML contains the menu
    - Customer view XML instead of getting from database
- Web service technology *(Chapter 5A)*
    - REST API for mobile (just create another project to pretend it is a mobile application)
    - For food menu viewing and ordering?