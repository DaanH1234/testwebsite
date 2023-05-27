<?php
require('header.php');
require('../src/utils.php');

$conn = dbConnect();
$category = $conn->query("SELECT * FROM category");

$stmt = $conn->prepare("SELECT email, username, type, id FROM users");
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
            <h1>Adminpanel</h1>
        </div>
        <div class="login-back-a">
            <a href="./home.php">Home</a>
            <span>/</span>
            <a href="./adminpanel.php">Adminpanel</a>
        </div>
    </div>

    <div class="login-back-h1">
        <h1>Welcome back: <?php echo $_SESSION['username']; ?></h1>
    </div>

    <div class="adminpaneloptions">
        <div class="users">
            <div class="user_container">
                <div class="user2">
                    <table>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Blacklisted</th>
                            <th>Blacklist</th>
                            <th>Unblacklist</th>
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
                                        <td><?php echo $category['email'] ?></td>
                                        <td><?php echo $category['username'] ?></td>

                                        <td><?php
                                            if ($category['type'] == 2) {
                                                echo "Owner";
                                            } else if ($category['type'] == 1) {
                                                echo "Admin";
                                            } else {
                                                echo "User";
                                            }
                                            ?></td>

                                        <td><?php if ($category['type'] == -1) {
                                                echo "Yes";
                                            } else {
                                                echo "No";
                                            }
                                            ?></td>
                                        <form action="./blacklistuser.php" method="post">
                                            <input type="hidden" name="blacklist" value="<?php echo $category['id']; ?>">
                                            <input type="hidden" name="type" value="<?php echo $category['type']; ?>">
                                            <input type="hidden" name="username" value="<?php echo $category['username']; ?>">
                                            <td><input class="blacklistbtn" type="submit" value="Blacklist" name="blacklistbtn"></td>
                                        </form>

                                        <form action="./unblacklist.php" method="post">
                                            <input type="hidden" name="unblacklist" value="<?php echo $category['id']; ?>">
                                            <input type="hidden" name="type" value="<?php echo $category['type']; ?>">
                                            <input type="hidden" name="username" value="<?php echo $category['username']; ?>">
                                            <td><input class="unblacklistbtn" type="submit" value="Unblacklist" name="unblacklistbtn"></td>
                                        </form>

                                        <form action="./removeuser.php" method="post">

                                            <input type="hidden" name="delete" value="<?php echo $category['id']; ?>">
                                            <input type="hidden" name="username" value="<?php echo $category['username']; ?>">
                                            <td><input class="deletebtn" type="submit" value="Delete" name="deletebtn"></td>
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
require('footer.php');
?>