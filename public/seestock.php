<?php
require('./header.php');

if ($_SESSION['type'] != 2) {
    header("Location: stocknoowner.php");
} else {
    $conn = dbConnect();
    $category = $conn->query("SELECT * FROM category");

    $stmt = $conn->prepare("SELECT * FROM stock WHERE type = ?");
    $stmt->bind_param("s", $type);
    $type = "redengine";
    $stmt->execute();
    $result = $stmt->get_result();

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <div class="login-background">
            <div class="login-back-h">
                <h1>See stock</h1>
            </div>
            <div class="login-back-a">
                <a href="./home.php">Home</a>
                <span>/</span>
                <a href="./seestock.php">See stock</a>
            </div>
        </div>

        <div class="adminpaneloptions">
            <div class="users">
            <h3>redengine</h3>
                <div class="user_container">
                    <div class="user2">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Duration</th>
                                <th>product</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                            <?php
                            ?>
                            <?php
                            if ($category->num_rows > 0) {
                                while ($category = $result->fetch_assoc()) {
                            ?>


                                    <div class="kast">
                                        <tr>
                                            <td><?php echo $category['id'] ?></td>
                                            <td><?php echo $category['name'] ?></td>
                                            <td><?php echo $category['type'] ?></td>
                                            <td><?php echo $category['duration'] ?></td>
                                            <td><?php echo $category['product'] ?></td>

                                            <form action="./editstock.php">
                                                <input type="hidden" name="edit" value="<?php echo $category['id']; ?>">
                                                <input type="hidden" name="username" value="<?php echo $category['name']; ?>">
                                                <td><input class="btn btn-success" type="submit" value="Edit" name="editbtn"></td>
                                            </form>

                                            <form action="./removestock.php" method="post">
                                                <input type="hidden" name="delete" value="<?php echo $category['id']; ?>">
                                                <input type="hidden" name="username" value="<?php echo $category['name']; ?>">
                                                <td><input class="btn btn-danger" type="submit" value="Delete" name="deletebtn"></td>
                                        </tr>
                                    </div>
                                    </form>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <?php
        $conn = dbConnect();
        $category = $conn->query("SELECT * FROM category");

        $nexus = "SELECT id, name, type ,duration, product FROM stock WHERE type = 'nexus'";
        $result = $conn->query($nexus);
        ?>

        <div class="adminpaneloptions">
            <div class="users">
            <h3>Nexus</h3>
                <div class="user_container">
                    <div class="user2">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Duration</th>
                                <th>product</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                            <?php
                            ?>
                            <?php
                            if ($category->num_rows > 0) {
                                while ($category = $result->fetch_assoc()) {
                            ?>


                                    <div class="kast">
                                        <tr>
                                            <td><?php echo $category['id'] ?></td>
                                            <td><?php echo $category['name'] ?></td>
                                            <td><?php echo $category['type'] ?></td>
                                            <td><?php echo $category['duration'] ?></td>
                                            <td><?php echo $category['product'] ?></td>

                                            <form action="./editstock.php">
                                                <input type="hidden" name="edit" value="<?php echo $category['id']; ?>">
                                                <input type="hidden" name="username" value="<?php echo $category['name']; ?>">
                                                <td><input class="btn btn-success" type="submit" value="Edit" name="editbtn"></td>
                                            </form>

                                            <form action="./removestock.php" method="post">
                                                <input type="hidden" name="delete" value="<?php echo $category['id']; ?>">
                                                <input type="hidden" name="username" value="<?php echo $category['name']; ?>">
                                                <td><input class="btn btn-danger" type="submit" value="Delete" name="deletebtn"></td>
                                        </tr>
                                    </div>
                                    </form>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <?php
        $conn = dbConnect();
        $category = $conn->query("SELECT * FROM category");

        $absolute = "SELECT id, name, type ,duration, product FROM stock WHERE type = 'absolute'";
        $result = $conn->query($absolute);
        ?>

        <div class="adminpaneloptions">
            <div class="users">
                <h3>Absolute</h3>
                <div class="user_container">
                    <div class="user2">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Duration</th>
                                <th>product</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                            <?php
                            ?>
                            <?php
                            if ($category->num_rows > 0) {
                                while ($category = $result->fetch_assoc()) {
                            ?>


                                    <div class="kast">
                                        <tr>
                                            <td><?php echo $category['id'] ?></td>
                                            <td><?php echo $category['name'] ?></td>
                                            <td><?php echo $category['type'] ?></td>
                                            <td><?php echo $category['duration'] ?></td>
                                            <td><?php echo $category['product'] ?></td>

                                            <form action="./editstock.php">
                                                <input type="hidden" name="edit" value="<?php echo $category['id']; ?>">
                                                <input type="hidden" name="username" value="<?php echo $category['name']; ?>">
                                                <td><input class="btn btn-success" type="submit" value="Edit" name="editbtn"></td>
                                            </form>

                                            <form action="./removestock.php" method="post">
                                                <input type="hidden" name="delete" value="<?php echo $category['id']; ?>">
                                                <input type="hidden" name="username" value="<?php echo $category['name']; ?>">
                                                <td><input class="btn btn-danger" type="submit" value="Delete" name="deletebtn"></td>
                                        </tr>
                                    </div>
                                    </form>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>



<?php
}
require('./footer.php');
?>