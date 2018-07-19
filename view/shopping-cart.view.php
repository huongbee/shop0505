<section class="main-container col1-layout">
  <div class="main container">
    <div class="col-main">
      <div class="cart">

        <div class="page-content page-order">
          <div class="page-title">
            <h2>Giỏ hàng của bạn</h2>
          </div>


          <div class="order-detail-content">
            <div class="table-responsive">
              <table class="table table-bordered cart_summary">
                <thead>
                  <tr>
                    <th class="cart_product">Sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th class="action">
                      <i class="fa fa-trash-o"></i>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $cart = $data;
                    foreach($cart->items as $c):
                    ?>
                  <tr id="product-<?=$c['item']->id?>">
                    <td class="cart_product">
                      <a href="#">
                        <img src="public/source/images/products/<?=$c['item']->image?>" alt="<?=$c['item']->name?>">
                      </a>
                    </td>
                    <td style="width:20%">
                      <?=$c['item']->name?>
                    </td>
                    <td class="price">
                      <span>
                        <?php
                        if($c['item']->price == $c['item']->promotion_price){
                          echo number_format($c['item']->price);
                        }
                        else{
                          echo "<del style='color:#777777'>".number_format($c['item']->price).'</del>';
                          echo "<br>";
                          echo number_format($c['item']->promotion_price);
                        }
                        ?>

                      </span>
                    </td>
                    <td class="qty">
                      <input class="form-control input-sm txtQty"  type="text" value="<?=$c['qty']?>">
                    </td>
                    <td class="price">
                      <span>
                        <?php
                          if($c['price'] == $c['discountPrice']){
                            echo number_format($c['discountPrice']);
                          }
                          else{
                            echo "<del style='color:#777777'>".number_format($c['price']).'</del>';
                            echo "<br>";
                            echo number_format($c['discountPrice']);
                          }
                        ?>
                      </span>
                    </td>

                    <td class="action">
                      <i style="cursor: pointer;" class="icon-close" data-id="<?=$c['item']->id?>"></i>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2" rowspan="2"></td>
                    <td colspan="3">Tổng tiền chưa km</td>
                    <td colspan="2" id="totalPrice">
                      <?=number_format($cart->totalPrice)?>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <strong>Tổng tiền thanh toán</strong>
                    </td>
                    <td colspan="2">
                      <strong id="promtPrice">
                        <?=number_format($cart->promtPrice)?>
                      </strong>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="cart_navigation">
              <a class="continue-btn" href="./">
                <i class="fa fa-arrow-left"> </i>&nbsp; Tiếp tực mua sắm
              </a>
              <a class="checkout-btn" href="checkout.php">
                <i class="fa fa-check"></i>
                Đặt hàng
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- jquery js -->
<script type="text/javascript" src="public/source/js/jquery.min.js"></script>

<script>
  $(document).ready(function () {
    $('.icon-close').click(function () {
      var idSP = $(this).attr('data-id')
      $.ajax({
        url:"cart.php",
        type:"POST",
        data:{
          id:idSP,
          action:"delete"
        },
        dataType:"JSON",
        success:function(res){
          $('#promtPrice').html(res.promtPrice)
          $('#totalPrice').html(res.totalPrice )
          $('#product-'+idSP).hide(500)
          // console.log(JSON.parse(res))
          // console.log(JSON.parse(res).promtPrice)
        },
        error:function(){
          console.log("error")
        }
      })
    })

    
    $('.txtQty').keyup(function() {
      var soluong = $(this).val()
      clearTimeout($.data(this, 'timer'));
      var wait = setTimeout(function(){
        $.ajax({
          
        })
      }, 2000);
      $(this).data('timer', wait);
    });

  })
</script>