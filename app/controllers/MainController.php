<?php

namespace app\controllers;

use app\models\Product;
use ishop\Cache;

class MainController extends AppController {

    public function indexAction(){
        $brands = \R::getAll("SELECT id, alias, slider_img, slider_text FROM product WHERE slider = 'on' ");
        $brands =  \R::convertToBeans('product', $brands);
        $featured = \R::getAll("SELECT *, brand.img as brand_img, product.img, brand.title as brand_title, product.title,product.alias, product.id FROM product JOIN brand ON brand.id = product.brand_id WHERE hit = 'on' LIMIT 8 ");
        $featured =  \R::convertToBeans('product',$featured);
        $latest = \R::getAll("SELECT *, brand.img as brand_img, product.img, brand.title as brand_title, product.title,product.alias, product.id FROM product JOIN brand ON brand.id = product.brand_id WHERE hit = 'on'  LIMIT 8 ");
        $latest =  \R::convertToBeans('product',$latest);
        $best_seller = \R::getAll("SELECT *, brand.img as brand_img, product.img, brand.title as brand_title, product.title,product.alias, product.id FROM product JOIN brand ON brand.id = product.brand_id WHERE best_seller = 'on' LIMIT  8 ");
        $best_seller =  \R::convertToBeans('product',$best_seller);

        // запись в куки запрошенного товара
        $p_model = new Product();


        // просмотренные товары
        $r_viewed = $p_model->getRecentlyViewed();
        $recentlyViewed = null;
        if($r_viewed){
            $recentlyViewed = \R::find('product', 'id IN (' . \R::genSlots($r_viewed) . ')  LIMIT 10', $r_viewed);
        }
        $this->setMeta('Главная страница', 'Описание...', 'Ключевики...');
        $this->set(compact('brands', 'recentlyViewed','featured','latest','best_seller'));

    }

}