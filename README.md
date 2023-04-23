# Chemventory
*A front end for a chemistry inventory database.*

## Table of Contents
1. Installation
2. Notes
3. FAQ
4. License

## 1. Installation
**Before you install**, you will need a MtSQL server, and a Web server with PHP/PDO. If you really don't want MySQL, see the FAQ section.

### Install Instructions
1. Create a database using SRC/database.sql
2. Move the files in "www" to your web root.
3. Move the folder 'Sources' one level above your web root.

## Notes
• You can edit 'Dist/Sources/connect.php' to use a password, if your SQL istance has a password. You can also edit to use a non-root account. You can do this by changing the following code:
> $username	= 'root';

> $password	= '';

  to this format.
> $username	= '*desired username*';

> $password	= '*desired password*';

• This is not a mobile friendly webapp.

## FAQ
1. **Q.** Can I use a different database engine?
   **A.** Yes. You will need to edit 'Dist/Sources/connect.php' and the SQL queries in 'Dist/www/read.php', 'Dist/www/create.php', 'Dist/www/create_borrower.php', www/search.php and 'database.sql' to match the specific syntax of your SQL Server. Most SQL servers will not require a query change, save for SQLite. 

## Licence
This product is licensed under the Gnu GPL V3.
