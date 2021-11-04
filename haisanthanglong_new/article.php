<!-- LIB -->
<?php require_once('article_c/article_c.php');?>

<?php 
    $atz = new article_controller();
    $article = $atz->get_article();
?>

<!doctype html>
<html lang="vi">

    <head>       
        <!-- HEAD -->
        <?php include('modules/head.php') ?>
        <!-- END HEAD -->

        <!-- SEO -->
        <meta name="description" content="<?=$article['Article_Description_vi']?>">
        <meta name="keywords" content="<?=$article['Article_Keywords_vi']?>">

        <title><?=$article['Article_Title_vi']?></title>
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

        <!-- ARTICLE -->
        <div class="container mt-4">

            <div class="row mt-3">
                <div class="col-lg-3 order-2 order-lg-1 main-cat">
                    <div class="row mb-3">
                        <?php include('modules/left_sidebar.php')?>
                    </div>
                </div>

                <div class="col-lg-9 order-1 order-lg-2 mb-5 main-product">

                    <div class="row mb-3">
                        <div class="col-12 post-detail">
                            <?php if (!empty($article)): ?>
                                <!-- <h3 class="mb-4"><?=$cat['Cat_Name_vi']?></h3> -->
                                <h1><?=$article['Article_Title_vi']?></h1>
                                
                                <div class="follow mb-3">
                                    <i class="far fa-calendar-alt"></i> <i><?=date('d-m-Y',$article['Article_Created'])?></i>&emsp;
                                </div>

                                <p><?=$article['Article_Description_vi']?></p>

                                <div>
                                    <?=$article['Article_Content_vi']?>
                                </div>
                            <?php else: ?>
                                <p>Không có bài viết này</p>
                            <?php endif ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- END ARTICLE -->

        <?php include('modules/footer.php') ?>
        
        <!-- JS LIB-->
        <?php include('modules/js.php') ?>
        <!-- END JS LIB -->
    </body>
</html>