<script src="public/ckeditor/ckeditor.js"></script>
<section class="main-container col2-right-layout">
  <div class="main container">
    <?php
    if(isset($_SESSION['error'])):
    ?>
        <div class="col-md-4 col-md-offset-4">
            <div class="alert alert-danger  alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        </div>
    <?php
    endif
    ?>
    <?php
    if(isset($_SESSION['success'])):
    ?>
        <div class="col-md-4 col-md-offset-4">
            <div class="alert alert-success  alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        </div>
    <?php
    endif
    ?>
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12">
        <div class="page-content checkout-page"><div class="page-title">
          <h2>Đặt hàng</h2>
        </div>
            <div class="box-border">
                <form action="checkout.php" method="POST">
                    <ul>
                        <li class="row">
                            <div class="col-sm-6">
                                <label for="first_name" class="required">Họ tên</label>
                                <input type="text" class="input form-control" name="fullname" id="first_name">
                            </div><!--/ [col] -->
                            <div class="col-sm-6">
                                <label class="required">Giới tính</label>
                                    <select class="input form-control" name="gender">
                                        <option value="nam">Nam</option>
                                        <option value="nữ">Nữ</option>
                                        <option value="khác">Khác</option>
                                </select>
                            </div><!--/ [col] -->
                        </li><!--/ .row -->
                        <li class="row">
                            <div class="col-sm-6">
                                <label for="company_name">Điện thoại</label>
                                <input type="text" name="phone" class="input form-control" id="company_name">
                            </div><!--/ [col] -->
                            <div class="col-sm-6">
                                <label for="email_address" class="required">Email</label>
                                <input type="text" class="input form-control" name="email" id="email_address">
                            </div><!--/ [col] -->
                        </li><!--/ .row -->
                        <li class="row"> 
                            <div class="col-xs-12">

                                <label for="address" class="required">Địa chỉ</label>
                                <input type="text" class="input form-control" name="address" id="address">

                            </div><!--/ [col] -->

                        </li><!-- / .row -->
                        <li class="row"> 
                            <div class="col-xs-12">

                                <label for="address" class="required">Ghi chú</label>
                                <textarea class="input form-control" name="note" rows="6" id="note"></textarea>
                                
                            </div><!--/ [col] -->

                        </li><!-- / .row -->

                        <li>
                            <button class="button" type="submit" name="btnCheckout"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Đặt hàng</span></button>
                        </li>
                    </ul>
                </form>
            </div>
            
        </div>
      </div>
      
    </div>
  </div>
  </section>
<script>
    CKEDITOR.replace('note') //id:note
</script>