<?php
    include "../Sources/header.php";
    if (isset($_POST["submit"])) {
        try {
            require "../Sources/connect.php";
            $sql = "SELECT * FROM chemical_inventory WHERE chemical_name = :chemical_name";
            $statement = $connection->prepare($sql);
            $statement->bindParam(
                ":chemical_name",
                $_POST["chemical_name"],
                PDO::PARAM_STR
            );
            $statement->execute();
            $result = $statement->fetchAll();
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
            <h1>Read</h1>
            <form method="post">
                <label for="chemical_name">Chemical Name</label><br>
                <input type="text" name="chemical_name" id="chemical_name"><br>
                <input type="submit" name="submit" value="Submit"><br>
            </form>
            <?php if (isset($_POST["submit"])) {
                if ($result && $statement->rowCount() > 0) { ?>
            <h2>Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>Chemical Name</th>
                        <th>Chemical Formula</th>
                        <th>Quantity</th>
                        <th>Compound Type</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo $row["chemical_name"]; ?></td>
                        <td><?php echo $row["formula"]; ?></td>
                        <td><?php echo $row["bottle_size"]; ?></td>
                        <td><?php echo $row["compound"]; ?></td>
                        <td><?php echo $row["location"]; ?></td>
                        <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
            <blockquote>No results found for <?php echo $_POST[
                "chemical_name"
                ]; ?>.</blockquote>
            <?php }
                } ?> 
        </div>
    </body>
</html>