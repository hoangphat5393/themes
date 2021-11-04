<?php require_once ('menu_c.php');?>
<?php 
    $atz = new module_menu_controller();
    $cats = $atz->get_cats();
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark main-menu py-1 custom-toggler">

    <div class="container">
        <button class="custom-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=$atz->site_url['main']?>">Trang chủ</a>
                </li>
                <?php if (!empty($cats)): ?>
                    <?php foreach ($cats as $k => $v): ?>
                        <li class="nav-item <?=!empty($v['Cat_Child'])?'dropdown':''?>">
                            <?php if (!empty($v['Cat_Child'])): ?>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$v['Cat_Name_vi']?>
                                </a>
                            <?php else: ?>
                                <a class="nav-link" href="<?=$v['Cat_Type']=='product'?'product_list.php':'post_list.php'?>?id=<?=$v['Cat_ID']?>"><?=$v['Cat_Name_vi']?></a>
                            <?php endif ?>
                            
                            <?php if (!empty($v['Cat_Child'])): ?>
                                <ul class="dropdown-menu">
                                    <?php foreach ($v['Cat_Child'] as $v1): ?>
                                        <li class="<?=!empty($v1['Cat_Child'])?'dropdown-submenu':''?>">

                                            <?php if (!empty($v1['Cat_Child'])): ?>
                                                <a class="dropdown-item dropdown-toggle" href="#"><?=$v1['Cat_Name_vi']?></a>
                                            <?php else: ?>
                                                <a class="dropdown-item" href="<?=$v1['Cat_Type']=='product'?'product_list.php':'post_list.php'?>?id=<?=$v1['Cat_ID']?>"><?=$v1['Cat_Name_vi']?></a>
                                            <?php endif ?>

                                            <?php if (!empty($v1['Cat_Child'])): ?>
                                                <div class="dropdown-menu">
                                                    <?php foreach ($v1['Cat_Child'] as $v2): ?>
                                                        <a class="dropdown-item" href="<?=$v2['Cat_Type']=='product'?'product_list.php':'post_list.php'?>?id=<?=$v2['Cat_ID']?>"><?=$v2['Cat_Name_vi']?></a>
                                                    <?php endforeach ?>
                                                </div>
                                            <?php endif?>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif ?>
                        </li>
                    <?php endforeach ?>
                <?php endif ?>
                
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Giỏ hàng</a>
                </li>
            </ul>
            <form action="search.php" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" name=q value="<?=isset($_GET['q'])?$_GET['q']:''?>">
                <button type="submit" class="btn btn-success my-2 my-sm-0"><i class="fa fa-search fa-fw"></i></</button>
            </form>
        </div>
    </div>
    
</nav>