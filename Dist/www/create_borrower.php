<?php
    include "../Sources/header.php";
    try {
        require "../Sources/connect.php";
        $sql = "SELECT * FROM borrower_info";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    if (isset($_POST["submit"])) {
        try {
            require "connect.php";
            $sql =
                "INSERT INTO borrower_info (chemical_name, borrower_name, bottle_size, room_number, date, time) values (:chemical_name, :borrower_name, :bottle_size, :room_number, :date, :time)";
            $statement = $connection->prepare($sql);
            $statement->bindParam(
                ":chemical_name",
                $_POST["chemical_name"],
                PDO::PARAM_STR
            );
            $statement->bindParam(
                ":borrower_name",
                $_POST["borrower_name"],
                PDO::PARAM_STR
            );
            $statement->bindParam(
                ":bottle_size",
                $_POST["bottle_size"],
                PDO::PARAM_INT
            );
            $statement->bindParam(
                ":room_number",
                $_POST["room_number"],
                PDO::PARAM_INT
            );
            $statement->bindParam(":date", $_POST["date"], PDO::PARAM_STR);
            $statement->bindParam(":time", $_POST["time"], PDO::PARAM_STR);
            $statement->execute();
            header("refresh:0");
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
    if (isset($_POST["delete"])) {
        try {
            require "connect.php";
            $sql = "DELETE FROM borrower_info WHERE id = :id";
            $statement = $connection->prepare($sql);
            $statement->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
            $statement->execute();
            header("refresh:0");
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
            <h1>Borrower</h1>
            <center></center>
            <!-- Use 'method="post"' to send form in a way that PHP can read -->
            <form method="post">
                <label for="chemical_name">Chemical Name</label>
                <input type="text" name="chemical_name" id="chemical_name">
                <label for="borrower_name">Borrower Name</label>
                <input type="text" name="borrower_name" id="borrower_name">
                <label for="bottle_size">Quantity</label>
                <input type="number" min="0" step="1" name="bottle_size" id="bottle_size">
                <label for="room_number">Room</label>
                <input type="number" min="0" step="1" name="room_number" id="room_number">
                <label for="date">Date</label>
                <input type="date" name="date" id="date">
                <label for="time">Time</label>
                <input type="time" name="time" id="time">
                <input type="submit" name="submit" value="Submit">
            </form>
            <?php if ($result && $statement->rowCount() > 0) { ?>
            <h2>Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Chemical Name</th>
                        <th>Borrower Name</th>
                        <th>Quantity</th>
                        <th>Room Number</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["chemical_name"]; ?></td>
                        <td><?php echo $row["borrower_name"]; ?></td>
                        <td><?php echo $row["bottle_size"]; ?></td>
                        <td><?php echo $row["room_number"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><?php echo $row["time"]; ?></td>
                        <?php } ?>
                </tbody>
            </table>
            <form method="post">
                <label for="id">ID</label><br>
                <select name="id" id="id">
                    <?php foreach ($result as $row) { ?>
                    <option value="<?php echo $row["id"]; ?>"><?php echo $row[
                        "id"
                        ]; ?></option>
                    <?php } ?>
                </select>
                <br>
                <input type="submit" name="delete" value="Return"><br>
                <?php } ?>
            </form>
        </div>
    </body>
</html>