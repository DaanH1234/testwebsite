<?php
require('header.php');

$conn = dbConnect();
$category = $conn->query("SELECT * FROM category");

$stmt = $conn->prepare("SELECT foto, naam, prijs, duration FROM cheats WHERE type = ?");
$stmt->bind_param("s", $type);
$type = "redengine";
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="login-background">
    <div class="login-back-h">
        <h1>Shop</h1>
    </div>
    <div class="login-back-a">
        <a href="./home.php">Home</a>
        <span>/</span>
        <a href="./products.php">Shop</a>
    </div>
</div>


<div class="page_products">
    <div class="container">
        <h1>redENGINE</h1>
        <div class="category">
            <?php
            if ($category->num_rows > 0) {
                while ($category = $result->fetch_assoc()) {
            ?>
                    <div class="kast">
                        <img src="<?php echo $category['foto']; ?>" alt="redengine product image" class="rEimg"><br>
                        <h3><?php echo $category['naam'] ?><br></h3>
                        <h4>Duration:</h4>
                        <p><?php echo $category['duration']; ?></p>
                        <h4>Price:</h4>
                        <p>€<?php echo $category['prijs']; ?></p>
                        <a href="#" data-duration="<?php echo $category['duration'];?>" data-name="redENGINE" data-price="<?php echo $category['prijs']; ?>" class="add-to-cart btn btn-primary">Add to cart</a>
                    </div>
            <?php
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</div>






<?php

$conn = dbConnect();
$category = $conn->query("SELECT * FROM category");

$stmt = $conn->prepare("SELECT foto, naam, prijs, duration FROM cheats WHERE type = ?");
$stmt->bind_param("s", $type);
$type = "nexus";
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="page_products">
    <div class="container">
        <h1>Nexus</h1>
        <div class="category">
            <?php
            if ($category->num_rows > 0) {
                while ($category = $result->fetch_assoc()) {
            ?>
                    <div class="kast">
                        <img src="<?php echo $category['foto']; ?>" alt=""><br>
                        <h3><?php echo $category['naam'] ?><br></h3>
                        <h4>Duration:</h4>
                        <p><?php echo $category['duration']; ?></p>
                        <h4>Price:</h4>
                        <p>€<?php echo $category['prijs']; ?></p>
                        <a href="#" data-duration="<?php echo $category['duration'];?>" data-name="Nexus" data-price="<?php echo $category['prijs']; ?>" class="add-to-cart btn btn-primary">Add to cart</a>
                    </div>
            <?php
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</div>








<?php

$conn = dbConnect();
$category = $conn->query("SELECT * FROM category");

$stmt = $conn->prepare("SELECT foto, naam, prijs, duration FROM cheats WHERE type = ?");
$stmt->bind_param("s", $type);
$type = "absolute";
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="page_products">
    <div class="container">
        <h1>Absolute</h1>
        <div class="category">
            <?php
            if ($category->num_rows > 0) {
                while ($category = $result->fetch_assoc()) {
            ?>
                    <div class="kast">
                        <img src="<?php echo $category['foto']; ?>" alt=""><br>
                        <h3><?php echo $category['naam'] ?><br></h3>
                        <h4>Duration:</h4>
                        <p><?php echo $category['duration']; ?></p>
                        <h4>Price:</h4>
                        <p>€<?php echo $category['prijs']; ?></p>
                        <a href="#" data-duration="<?php echo $category['duration'];?>" data-name="Absolute" data-price="<?php echo $category['prijs']; ?>" class="add-to-cart btn btn-primary">Add to cart</a>
                    </div>
            <?php
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</div>

<div class="modal fade"  id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: #202020; color: white !important;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                <img src="./images/TRANSPARENT.png" width="60px" height="60px" alt="">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="show-cart table">

                </table>
                <div>Total price: €<span class="total-cart"></span></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="clear-cart btn btn-danger">Clear Cart</button>
                <button type="button" class="btn btn-primary">Order now</button>
            </div>
        </div>
    </div>
</div>
</div>




<?php
require('footer.php');
?>