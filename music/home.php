<?php
include 'slide.php';

// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM musics ORDER BY date_added DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?><?=template_header('Home')?>
<style type="text/css">
    main .featured {
    display: flex;
    flex-direction: column;
    background-image: url("img/bg.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    height: 500px;
    align-items: center;
    justify-content: center;
    text-align: center;
}
</style>
   <main style="background-color: #EEE;">
<div class="featured"
style="background-size:cover;background-position:center;width: 100%;">
    <h2 style="color: black" >Emotinal Funds By Music</h2>
  <?=slide('Home')?>
</div>
<div class="recentlyadded content-wrapper"   style="margin-left: 290px;">
    <h2>Recently Added Products</h2>
    <div class="products"style="margin-left: -90px;">
        <?php foreach ($recently_added_products as $product): ?>
    <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
<img src="img/<?=$product['img']?>" width="280" height="400" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">&dollar;<?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<hr width="600px">
<div class="recentlyadded content-wrapper">
    <h2>Added Products</h2>
    <div class="products"style="margin-left: -90px;">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="img/<?=$product['img']?>" width="280" height="400" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">&dollar;<?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>