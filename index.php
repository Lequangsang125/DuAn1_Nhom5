<?php 
require_once('layouts/header.php');

$sql = "SELECT Product.*, Category.name as category_name FROM Product 
        LEFT JOIN Category ON Product.category_id = Category.id 
        ORDER BY Product.updated_at DESC LIMIT 0,8";
$lastestItems = executeResult($sql);
?>
<!-- Banner Slider -->
<div id="demo" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- Slideshow images -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://intphcm.com/data/upload/dung-luong-banner-thoi-trang.jpg" class="d-block w-100" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="https://t004.gokisoft.com/uploads/2021/07/2-s-1634-banner-web.jpg" class="d-block w-100" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="https://t004.gokisoft.com/uploads/2021/07/3-s-1634-banner-web.jpg" class="d-block w-100" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!-- Banner End -->

<div class="container my-5">
    <h2 class="text-center mb-4">Sản Phẩm Mới Nhất</h2>
    <div class="row">
        <?php foreach($lastestItems as $item) { ?>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card product-item h-100">
                <a href="detail.php?id=<?=$item['id']?>"><img class="card-img-top" src="<?=$item['thumbnail']?>" alt="<?=$item['title']?>" style="height: 220px; object-fit: cover;"></a>
                <div class="card-body">
                    <h6 class="card-title text-muted"><?=$item['category_name']?></h6>
                    <a href="detail.php?id=<?=$item['id']?>" class="text-dark">
                        <h5 class="card-title font-weight-bold"><?=$item['title']?></h5>
                    </a>
                    <p class="card-text text-danger font-weight-bold"><?=number_format($item['discount'])?> VND</p>
                </div>

            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Danh Muc San Pham -->
<?php
$count = 0;
foreach($menuItems as $item) {
    $sql = "SELECT Product.*, Category.name as category_name FROM Product 
            LEFT JOIN Category ON Product.category_id = Category.id 
            WHERE Product.category_id = ".$item['id']." 
            ORDER BY Product.updated_at DESC LIMIT 0,4";
    $items = executeResult($sql);
    if($items == null || count($items) < 4) continue;
?>
<div style="background-color: <?=($count++%2 == 0)?'#f7f9fa':''?>;">
    <div class="container my-5">
        <h2 class="text-center mb-4"><?=$item['name']?></h2>
        <div class="row">
            <?php foreach($items as $pItem) { ?>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card product-item h-100">
                    <a href="detail.php?id=<?=$pItem['id']?>"><img class="card-img-top" src="<?=$pItem['thumbnail']?>" alt="<?=$pItem['title']?>" style="height: 220px; object-fit: cover;"></a>
                    <div class="card-body">
                        <h6 class="card-title text-muted"><?=$pItem['category_name']?></h6>
                        <a href="detail.php?id=<?=$pItem['id']?>" class="text-dark">
                            <h5 class="card-title font-weight-bold"><?=$pItem['title']?></h5>
                        </a>
                        <p class="card-text text-danger font-weight-bold"><?=number_format($pItem['discount'])?> VND</p>
                    </div>
                    <div class="card-footer p-0">
                        
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>

<?php require_once('layouts/footer.php'); ?>
