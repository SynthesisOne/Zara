<div class="breadcrumb-area mt-37 hm-4-padding">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center border-top-2">
            <h2>product details gallery</h2>
            <ul>
                <?=$breadcrumbs;?>
            </ul>
        </div>
    </div>
</div>
<div class="product-details-area hm-3-padding ptb-130">
    <div class="container-fluid">
        <?php
        $curr = \ishop\App::$app->getProperty('currency');
        $cats = \ishop\App::$app->getProperty('cats');
        ?>
        <div class="row">

            <div class="col-lg-6">
                <div class="product-details-img-content">
                    <div class="product-details-tab mr-40">
                        <div class="product-details-large tab-content">
                            <div class="tab-pane active" id="pro-details<?=$product->id;?>">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="images/background/1200on1125/<?=$product->img;?>">
                                        <img src="images/background/600on656/<?=$product->img;?>" alt="">
                                    </a>
                                </div>
                            </div>
                            <?php foreach($gallery as $item): ?>
                            <div class="tab-pane" id="pro-details<?=$item->id?>">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="images/background/1200on1125/<?=$item->img;?>">
                                        <img src="images/background/600on656/<?=$item->img;?>" alt="">
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="product-details-small nav mt-12 product-dec-slider owl-carousel">
                            <a class="active" href="#pro-details<?=$product->id;?>">
                                <img src="images/background/141on135/<?=$product->img;?>" alt="">
                            </a>
                            <?php  foreach ($gallery as $item):?>
                                <a class="active" href="#pro-details<?=$item->id;?>">
                                    <img src="images/background/141on135/<?=$item->img;?>" alt="">
                                </a>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="product-details-content">
                    <h2><?= $product->title ?></h2>
                    <div class="product-rating">
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <i class="ion-ios-star"></i>
                        <span> ( 01 Customer Review )</span>
                    </div>
                    <div class="product-price">
                        <span class="old"><?=$curr['symbol_left'];?><?=$product->old_price * $curr['value'];?><?=$curr['symbol_right'];?></span>
                        <span><?=$curr['symbol_left'];?><?=$product->price * $curr['value'];?><?=$curr['symbol_right'];?></span>
                    </div>
                    <div class="product-overview">
                        <h5 class="pd-sub-title">Обзор продукта</h5>
                        <p><?=$product->content;?></p>
                    </div>
                    <div class="product-size">
                        <h5 class="pd-sub-title">Product size</h5>
                        <ul>
                            <li>
                                <a href="#">s</a>
                            </li>
                            <li>
                                <a href="#">m</a>
                            </li>
                            <li>
                                <a href="#">l</a>
                            </li>
                            <li>
                                <a href="#">xl</a>
                            </li>
                            <li>
                                <a href="#">lm</a>
                            </li>
                        </ul>
                    </div>
                    <div class="product-color">
                        <h5 class="pd-sub-title">Product color</h5>
                        <ul>
                            <li class="red">b</li>
                            <li class="pink">p</li>
                            <li class="blue">b</li>
                            <li class="sky2">b</li>
                            <li class="green">y</li>
                            <li class="purple2">g</li>
                        </ul>
                    </div>
                    <div class="quickview-plus-minus">
                        <div class="cart-plus-minus">
                            <input type="text" value="1" readonly name="qtybutton" class="cart-plus-minus-box">
                        </div>
                        <div class="quickview-btn-cart">
                            <a class="btn-style cr-btn add-to-cart-link" href="cart/add?id=<?=$product->id;?>" data-id="<?=$product->id;?>"<span>В корзину</span></a>
                        </div>
                        <div class="quickview-btn-wishlist">
                            <a class="btn-hover cr-btn" href="#"><span><i class="ion-ios-heart-outline"></i></span></a>
                        </div>
                    </div>
                    <div class="product-categories">
                        <h5 class="pd-sub-title">Категории</h5>
                        <ul>
                            <li>
                                <a href="#">fashion ,</a>
                            </li>
                            <li>
                                <a href="#">electronics ,</a>
                            </li>
                            <li>
                                <a href="#">toys ,</a>
                            </li>
                            <li>
                                <a href="#">food ,</a>
                            </li>
                            <li>
                                <a href="#">jewellery </a>
                            </li>
                        </ul>
                    </div>
                    <div class="product-share">
                        <h5 class="pd-sub-title">Поделиться</h5>
                        <ul>
                            <li>
                                <a href="#"><i class="ion-social-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-tumblr"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"> <i class="ion-social-instagram-outline"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

