# Tile Goes Here
*Put your description here*

## Table of Contents
1. Installation
2. Notes
3. FAQ
4. License

## 1. Installation
**Before you install**, you will need a MtSQL server, and a Web server with PHP/PDO. If you really don't want MySQL, see the FAQ section.

### Install Instructions
1. Create a database using database.sql
2. Move the files in "www" to your web root.
3. Move the folder 'Sources' one level above your web root.

## Notes
• You can edit /Sources/connect.php to use a password, if your SQL istance has a password. You can also edit to use a non-root account. 
  You can do this by changing the following code:
  > $username	= 'root';
  > $password	= '';
  to
  > $username	= '*desired username*';
  > $password	= '*desired password*';
