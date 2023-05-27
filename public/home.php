<?php
require('header.php');

$conn = dbConnect();
$category = $conn->query("SELECT * FROM category");

$sql = "SELECT foto, naam FROM category";
$result = $conn->query($sql);
?>


<div class="first-mid-section">
    <div class="first-mid-section-text">
        <h1>Welcome to AGB999</h1>
        <p>Find the perfect products for every game here!<br> We offer all sorts of accounts and cheats</p><br>
        <a href="">Shop &#8594</a>
    </div>
    <div class="first-mid-section-img">
        <img src="images/TRANSPARENT.png" alt="">
    </div>
</div>

<section>

    <div class="first-mid-section-verif">
        <div class="first-mid-section-verif-ev">
            <img src="./images/verified-protected.webp" alt="">
            <p>Verrified reseller</p>
        </div>
        <div class="first-mid-section-verif-ev">
            <img src="./images/verified-protected.webp" alt="">
            <p>Cheapest prices</p>
        </div>
        <div class="first-mid-section-verif-ev">
            <img src="./images/verified-protected.webp" alt="">
            <p>Instant delivery's</p>
        </div>
    </div>

    <div class="counter_midsection">
        <div class="counter_customers">
            <h3 style="font-size: 20px; padding-top: 10px !important;">Happy customers:</h3>
            <h4 class="customer_count"></h4>
        </div>
        <div class="counter_products_sold">
            <h3 style="font-size: 20px; padding-top: 10px !important;">Products sold:</h3>
            <h4 class="sold_count"></h4>
        </div>
        <div class="counter_products_available">
            <h3 style="font-size: 20px; padding-top: 10px !important;">Products available:</h3>
            <h4 class="products_count">
                <?php $conn = dbConnect();
                $sql = "SELECT COUNT(id) FROM cheats";
                $resultEnc = $conn->query($sql);
                $result = $resultEnc->fetch_all(); ?>
                <?php echo $result[0][0]; ?></h4>
        </div>
    </div>

</section>

<div class="showcase-last-section">
    <div class="showcase-last-section-text">
        <h1>Showcase</h1>
        <p>This is an showcase of one of our top products</p>
    </div>

    <div class="showcase-last-section-video">
        <iframe width="942" style="border: 1px solid red; border-radius: 10px;" height="530" src="https://www.youtube.com/embed/j26IKyl0868" title="Fivem Global unban in 5 minutes! | Working 2023 | redENGINE spoofer" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
</div>


<?php
require('footer.php');
?>