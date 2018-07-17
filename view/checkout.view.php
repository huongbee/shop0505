<script src="public/ckeditor/ckeditor.js"></script>
<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12">
        <div class="page-content checkout-page"><div class="page-title">
          <h2>Đặt hàng</h2>
        </div>
            <div class="box-border">
                <ul>
                    <li class="row">
                        <div class="col-sm-6">
                            <label for="first_name" class="required">Họ tên</label>
                            <input type="text" class="input form-control" name="" id="first_name">
                        </div><!--/ [col] -->
                        <div class="col-sm-6">
                            <label class="required">Giới tính</label>
                                <select class="input form-control" name="">
                                    <option value="nam">Nam</option>
                                    <option value="nữ">Nữ</option>
                                    <option value="khác">Khác</option>
                            </select>
                        </div><!--/ [col] -->
                    </li><!--/ .row -->
                    <li class="row">
                        <div class="col-sm-6">
                            <label for="company_name">Điện thoại</label>
                            <input type="text" name="" class="input form-control" id="company_name">
                        </div><!--/ [col] -->
                        <div class="col-sm-6">
                            <label for="email_address" class="required">Email</label>
                            <input type="text" class="input form-control" name="" id="email_address">
                        </div><!--/ [col] -->
                    </li><!--/ .row -->
                    <li class="row"> 
                        <div class="col-xs-12">

                            <label for="address" class="required">Địa chỉ</label>
                            <input type="text" class="input form-control" name="" id="address">

                        </div><!--/ [col] -->

                    </li><!-- / .row -->
                    <li class="row"> 
                        <div class="col-xs-12">

                            <label for="address" class="required">Ghi chú</label>
                            <textarea class="input form-control" name="" rows="6" id="note"></textarea>
                            
                        </div><!--/ [col] -->

                    </li><!-- / .row -->

                    <li>
                        <button class="button"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Đặt hàng</span></button>
                    </li>
                </ul>
            </div>
            
        </div>
      </div>
      
    </div>
  </div>
  </section>
<script>
    CKEDITOR.replace('note') //id:note
</script>