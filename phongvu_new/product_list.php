<!-- LIB -->
<?php require_once('product_c/product_c.php');?>

<?php 
    $atz = new product_controller();

    $cat = array();
    $product_list = array();

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $cat = $atz->get_cat($_GET['id']);

        if(!empty($cat)){
            $cat_list = $atz->get_cats($cat['Cat_ID']);
            $product_list = $atz->get_products($cat_list);
        }
    }   
?>

<!doctype html>
<html lang="vi">

    <head>
        
        <!-- HEAD -->
        <?php include('modules/head.php') ?>
        <!-- END HEAD -->

        <!-- SEO -->
        <meta name="description" content="<?=$cat['Cat_Description_vi']?>">
        <meta name="keywords" content="<?=$cat['Cat_Keywords_vi']?>">

        <title><?=$cat['Cat_Name_vi']?></title>
        
    </head>

    <body>

        <!-- HEADER -->
        <header>
            <?php include('modules/header.php');?>
        </header>
        <!-- END HEADER -->

        <!-- MENU -->
        <?php include('modules/menu.php')?>
        <!-- MENU HEADER -->

        <!-- PRODUCT -->
        <div class="container mt-4">

            <div class="row mt-3">
                <div class="col-lg-3 order-2 order-lg-1 main-cat">

                    <div class="row mb-3">
                        <?php include('modules/left_sidebar.php') ?>
                    </div>
                    
                </div>

                <div class="col-lg-9 order-1 order-lg-2 mb-5 main-product">

                    <div class="row mb-3">
                        <div class="col-12">
                            <?php if ($cat): ?>
                            <h3><?=$cat['Cat_Name_vi']?></h3>
                                
                                <div class="row mt-4">
                                    <?php if (!empty($product_list)): ?>
                                        <?php foreach ($product_list as $v): ?>
                                            <div class="col-6 col-md-3 mb-4">
                                                <div class="product-item">
                                                    <figure class="text-center">
                                                        <a href="product.php?id=<?=$v['Product_ID']?>" title="<?=$v['Product_Name_vi']?>">
                                                            <img class="w-100" src="<?=str_replace('../', '', $v['Product_Thumbnail'])?>" alt="<?=$v['Product_Name_vi']?>">
                                                        </a>
                                                        <figcaption><a href="#"><?=$v['Product_Name_vi']?></a></figcaption>
                                                        Gi??:
                                                        <?php if ($v['Product_Price']): ?>
                                                            <span class="price">
                                                                <?=number_format($v['Product_Price'],0,',','.').'??'?>        
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="price">
                                                                <a href="tel:<?=str_replace(' ', '', SETTING['Setting_Phone'])?>">Li??n h???</a>
                                                            </span>
                                                        <?php endif ?>
                                                    </figure>
                                                </div>
                                            </div>   
                                        <?php endforeach ?>
                                    <?php else: ?>
                                        <div class="col-12 mb-4">
                                            <p class="font-weight-bold text-center">Chuy??n m???c n??y ch??a c?? s???n ph???m</p>
                                        </div>
                                    <?php endif ?>
                                    
                                </div>
                            <?php else: ?>
                                <p class="font-weight-bold text-center">Kh??ng c?? chuy??n m???c n??y</p>
                            <?php endif ?>

                        </div>

                    </div>
                    <!-- <nav class="mt-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">
                                    2 <span class="sr-only">(current)</span>
                                </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav> -->

                </div>

            </div>
        </div>
        <!-- END PRODUCT -->



        <div class="container-fluid">

            <div class="row justify-content-center align-items-center bg-contact py-3">

                <div class="col-lg-5 mb-xl-0 mb-3">

                    <div class="row justify-content-center">
                        
                        <div class="col-9 text-center">
                            
                            <div id="carouselExampleControls" class="carousel slide text-center" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="uploads/tieucanh.jpg" alt="First slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>

                    </div>

                </div>


                <!-- FORM -->
                <div class="col-lg-5">

                    <fieldset class="reg-form">
                        <legend class="text-center"><strong>????NG K?? NH???N TIN</strong></legend>
                    
                        <form method="post" class="text-center">
                            <p class="text-white">Nh???p th??ng tin c???a b???n v??o Form b??n d?????i ????? nh???n tin t??? ch??ng t??i!</p>
                            <div class="form-row">

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <input type="text" class="form-control" placeholder="H??? v?? t??n*">        
                                        </div>

                                        <div class="col-12 mb-3">
                                            <input type="text" class="form-control" placeholder="??i???n tho???i*">        
                                        </div>

                                        <div class="col-12 mb-3">
                                            <input type="text" class="form-control" placeholder="Email*">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="6">N???i dung*</textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-warning btn-contact" value="Li??n h??? ngay">    
                            
                        </form>

                    </fieldset>
                    
                </div>
                <!-- END FORM -->
            </div>
        </div>
        


        <div class="container my-5">

            <div class="row main_news">
                <div class="col-lg-4 blog">
                    <h4>KI???N TH???C N??NG NGHI???P</h4>
                    <ul id="scroller">
                        <li class="row">
                            <div class="col-md-12">
                                <img class="img-fluid" src="uploads/kienthuc1.jpg" alt="Firehouse" align="left">
                                <h5><a href="cham-soc-bao-ve-vat-nuoi-trong-mua-nang-nong">Tri???n v???ng t??? gi???ng l??a h???u c?? th???o d?????c t??m</a></h5>
                                <p>L??a th???o d?????c t??m ???????c ????a v??o s???n xu???t ??? Qu???ng Tr??? ???? v??i n??m nay nh??ng tr?????c ????y n??ng d??n th??m canh gi???ng l??a...</p>
                            </div>
                        </li>

                        <li class="row">
                            <div class="col-md-12">
                                <img class="img-fluid" src="uploads/kienthuc2.jpg" alt="Firehouse" align="left">
                                <h5><a href="cham-soc-bao-ve-vat-nuoi-trong-mua-nang-nong">Ch??m s??c, b???o v??? v???t nu??i trong m??a n???ng n??ng</a></h5>
                                <p>????? ch??? ?????ng ch??m s??c, b???o v??? ????n v???t nu??i trong m??a n???ng n??ng n??m nay, ng??nh n??ng nghi???p, ch??nh quy???n c??c ?????a ph????ng...</p>
                            </div>
                        </li>
                    </ul>
                </div>
                 
                <div class="col-lg-4">
                    <h4>VIDEO CLIP</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="ajax_video" class="ajax_video p-2">
                                <iframe width="100%" height="290" src="https://www.youtube.com/embed/blgRF0H8gVk" frameborder="0" allowfullscreen=""></iframe>
                                <select name="list-video" class="form-control list-video">
                                    <option value="blgRF0H8gVk">C??ch tr???ng rau c???i h???u c??: x?? l??ch, b??? xanh v?? b??? ng???t t???i nh??.</option>
                                    <option value="qr6bTDJefMs">C??ch tr???ng v?? ch??m s??c hoa ?????ng ti???n cho hoa ?????p 4 m??a</option>
                                    <option value="eBDh72nyDvs">Tr???ng v?? ch??m s??c c??c ?????ng ti???n sau khi ch??i t???t</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h4>TIN T???C N??NG NGHI???P</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="post-slider p-2">
                                
                                <div class="owl-two owl-carousel owl-theme">
                                    <div class="item product-item">
                                        <figure>
                                            <a href="#"><img class="w-100" src="uploads/post1.jpg" alt=""></a>
                                        </figure>
                                        <div class="bgdate float-left text-center">
                                            <strong>01</strong>
                                            <br>
                                            TH??NG 1
                                        </div>
                                        <h5><a href="gia-gao-viet-nam-cao-nhat-trong-vong-1-nam">Gi?? g???o Vi???t Nam cao nh???t trong v??ng 1 n??m</a></h5>
                                        <p>Gi?? g???o t???i nhi???u n?????c ch??u ?? ?????u li??n t???c ??i l??n v?? ?????ng ??? m???c cao nh???t trong v??ng 1 n??m qua.</p>
                                    </div>

                                    <div class="item product-item">
                                        <figure>
                                            <a href="#"><img class="w-100" src="uploads/post2.jpg" alt=""></a>
                                        </figure>
                                        <div class="bgdate float-left text-center">
                                            <strong>02</strong>
                                            <br>
                                            TH??NG 1
                                        </div>
                                        <h5><a href="#">Trang ch??? ?? D??? b??o s??u b???nh ?? D??? b??o s??u b???nh t???ng h???p trong tu???n (20.04.2020) D??? b??o s??u b???nh t???ng </a></h5>
                                        <p>Theo Trung t??m D??? b??o kh?? t?????ng thu??? v??n trung ????ng, khu v???c ?????ng b???ng s??ng C???u Long tu???n n??y th???i ti???t giao m??a c?? xen...</p>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?php include('modules/footer.php') ?>
        
        <!-- JS LIB-->
        <?php include('modules/js.php') ?>
        <!-- END JS LIB -->

    </body>
</html>