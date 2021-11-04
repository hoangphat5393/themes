<?php require_once('contact_c/contact_c.php');?>
<?php 
    $atz = new contact_controller();
    $atz->add_contact();

    $page_content = $atz->get_page_content(1);    
?>

<!doctype html>
<html lang="vi">

    <head>
        
        <!-- HEAD -->
        <?php include('modules/head.php') ?>
        <!-- END HEAD -->


        <!-- SEO -->
        <meta name="description" content="<?=$page_content['Setting_Page_Description_vi']?>">
        <meta name="keywords" content="<?=SETTING['Setting_Keywords']?>">

        <title>Liên hệ - <?=SETTING['Setting_Title']?></title>

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


        <!-- CONTACT -->
        <div class="container contact-page mt-4">

            <div class="row">
                <div class="col-lg-7 order-2 order-lg-1 main-cat">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.1661648542636!2d106.67085005798424!3d10.86230823221918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDUxJzQ0LjMiTiAxMDbCsDQwJzE5LjAiRQ!5e0!3m2!1svi!2s!4v1590738223317!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                  
                </div>


                <!-- FORM -->
                <div class="col-lg-5 order-1 order-lg-2 mb-5 main-product contact-form">
                    <div class="row mb-3">
                        
                        <div class="col-md-12">

                            <h3><span>LIÊN HỆ</span></h3>

                            <p class="font-weight-bold mt-3">Địa chỉ: <?=SETTING['Setting_Address']?></p>
                            <div class="contact-info mb-2">
                                <a href="tel:<?=str_replace(' ', '', SETTING['Setting_Phone'])?>"  title="Gọi điện">
                                    <!-- <i class="fa fa-phone fa-fw"></i> <?=str_replace(' ', '', SETTING['Setting_Phone'])?> -->
                                    <span class="text-red">Hotline:</span>
                                    <?=str_replace(' ', '', SETTING['Setting_Phone'])?>
                                </a>
                            </div>
                            
                            <form action="" method="post" id="contact-form">
                                <div class="form-row">
                                
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="Contact_Name" placeholder="Họ và tên*">        
                                    </div>

                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="Contact_Address" placeholder="Địa chỉ">        
                                    </div>

                                    <div class="col-6 mb-3">
                                        <input type="text" class="form-control" name="Contact_Mobile" placeholder="Điện thoại*">        
                                    </div>

                                    <div class="col-6 mb-3">
                                        <input type="text" class="form-control" name="Contact_Email" placeholder="Email">
                                    </div>

                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="6" name="Contact_Message" placeholder="Lời nhắn"></textarea>
                                    </div>
                                
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-md-12">
                                        <button type="reset" class="btn btn-danger">Nhập lại</button>
                                        <input type="submit" class="btn btn-danger" value="Gửi">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END FORM -->

        

            </div>
        </div>
        <!-- END PRODUCT -->


        <?php include('modules/footer.php') ?>
        
        <!-- JS LIB-->
        <?php include('modules/js.php') ?>
        <!-- END JS LIB -->

        
        <script> 
            $(document).ready(function() {
                $('#contact-form').validate({
                    errorPlacement: function(error, element) {
                        var place = element.closest('.input-group');
                        if (!place.get(0)) {
                            place = element;
                        }
                        if (place.get(0).type === 'checkbox') {
                            place = element.parent();
                        }
                        if (error.text() !== '') {
                            place.before(error);
                        }
                    },
                    rules: {
                        Contact_Name: {
                            required: true
                        },
                        Contact_Email: {
                            // required: true,
                            email: true
                        },
                        Contact_Mobile: {
                            required: true,
                            number: true,
                            digits: true,
                            minlength: 10
                        },
                        Contact_Message: {
                            required: true
                        },
                    },
                    messages: {
                        Contact_Name: {
                            required: "Chưa nhập tên!"
                        },
                        Contact_Email: {
                            required: "Chưa nhập Email!",
                            email: "Email không hợp lệ"
                        },
                        Contact_Mobile: {
                            required: "Chưa nhập số điện thoại!",
                            number: "Điện thoại phải là số!",
                            digits: "Điện thoại không được nhập số âm !",
                            minlength: "Điện thoại phải ít nhất có 10 số!"
                        },
                        Contact_Message: {
                            required: "Chưa nhập lời nhắn!"
                        }
                    },
                    
                    submitHandler: function(form) {
                        
                        console.log($(form).serialize());
                        $.ajax({
                            url: "<?=$_SERVER['REQUEST_URI']?>", 
                            type: "POST",             
                            data: $(form).serialize(),
                            cache: false,             
                            processData: false,      
                            success: function(data) {
                                alert(data);
                            }
                        });
                        
                        return false; // required to block normal submit since you used ajax
                    }
                });
            });
        </script>
    
    </body>
</html>