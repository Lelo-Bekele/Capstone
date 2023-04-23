<?php
   include "../Sources/header.php";
   
   if (isset($_POST["submit"])) {
       try {
           require "../Sources/connect.php";
   
           $sql =
               "INSERT INTO chemical_inventory (chemical_name, formula, bottle_size, compound, location) values (:chemical_name, :formula, :bottle_size, :compound, :location)";
   
           $statement = $connection->prepare($sql);
           $statement->bindParam(
               ":chemical_name",
               $_POST["chemical_name"],
               PDO::PARAM_STR
           );
           $statement->bindParam(":formula", $_POST["formula"], PDO::PARAM_STR);
           $statement->bindParam(
               ":bottle_size",
               $_POST["bottle_size"],
               PDO::PARAM_INT
           );
           $statement->bindParam(":compound", $_POST["compound"], PDO::PARAM_STR);
           $statement->bindParam(":location", $_POST["location"], PDO::PARAM_STR);
           $statement->execute();
       } catch (PDOException $error) {
           echo $sql . "<br>" . $error->getMessage();
       }
   }
   ?>
<html>
   <head>
      <title>PHP Test</title>
   </head>
   <body>
      <?php include "../Sources/topbar.php"; ?>
      <div class="cont">
         <h1>Create</h1>
         <form method="post">
            <label for="chemical_name">Chemical Name</label>
            <input type="text" name="chemical_name" id="chemical_name">
            <label for="formula">Chemical Formua</label>
            <input type="text" name="formula" id="formula">
            <label for="bottle_size">Quantity</label>
            <input type="number" min="0" step="1" name="bottle_size" id="bottle_size">
            <label for="compound">Compound Type</label>
            <select name="compound" id="compound">
               <option value="Organic">Organic</option>
               <option value="Inorganic">Inorganic</option>
            </select>
            <br>
            <label for="location">Location</label>
            <select name="location" id="location">
               <option value="Shelf 1A">Shelf 1A</option>
               <option value="Shelf 1B">Shelf 1B</option>
               <option value="Shelf 1C">Shelf 1C</option>
               <option value="Shelf 2A">Shelf 2A</option>
               <option value="Shelf 2B">Shelf 2B</option>
               <option value="Shelf 2C">Shelf 2C</option>
               <option value="Shelf 4">Shelf 4</option>
               <option value="Shelf 7">Shelf 7</option>
               <option value="Shelf Miscellaneous">Shelf Miscellaneous</option>
               <option value="Shelf 3">Shelf 3</option>
               <option value="Shelf 5">Shelf 5</option>
               <option value="Shelf 6">Shelf 6</option>
               <option value="Shelf 8">Shelf 8</option>
            </select>
            <br>
            <input type="submit" name="submit" value="Submit">
         </form>
      </div>
   </body>
</html>
