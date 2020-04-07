<div class="container">
    <h3 class="h3">shopping </h3>

    <?php if( !empty($this->session->msg) ){?>
    <center>
        <div class="alert alert-success" style="width: 500px">
          <strong> Success! </strong> 
          <?= $this->session->msg?> 
        </div>        
    </center>
    <?php } ?>

    <div class="row" style="min-height: 400px">
        <?php if(count($productLists) == 0): ?>
            <h6 class="col-md-4 offset-md-4" style="text-align: center; padding-top:50px">No Products...</h6>
        <?php endif; ?>
    <?php foreach($productLists as $key=>$row){ ?>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid2">
                <div class="product-image2">
                    <a href="<?= base_url('product/individual/').$row['id']?>">
                        <img class="pic-1" src="<?= base_url('upload/').$row['pro_main_img']?>" style="height: 255px">
                        <?php $sndIMG = explode(",", $row['pro_other_img'])[0]; ?>
                        <?php if( isset($sndIMG) && ($sndIMG!="") ){?>
                        <img class="pic-2" src="<?= base_url('upload/').explode(",", $row['pro_other_img'])[0]?>">
                        <?php } ?>
                    </a>
                    <a class="add-to-cart" href="<?= base_url('starter/login')?>">Add to cart</a>
                    <input type="hidden" name="real-price<?= $row['id']?>" value="<?= $row["pro_retail"]?>">
                </div>
                <div class="product-content" style="background-color: #f2f2f2; text-align: center;">
                    <h3 class="title"><a href="<?= base_url('product/individual/').$row['id']?>"><?= $row['pro_title']?></a></h3>
                    <?php { ?>

                        <span class="price">$ <?= $row['pro_retail']?></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        <!--<span class="price notable-price" data-toggle="tooltip" title="To purchase this wholesale price, You have to upgrade your membership">$ <?= $row['pro_wholesale']?></span><br>-->
                        <span class="fa fa-lock" data-toggle="tooltip" title="To purchase wholesale, you have to provide a reseller certificate or other appropriate proof. " aria-hidden="true"></span>
                    <?php } ?>

                    <h6 class="name"><?= $row['firstname'].' '.$row['lastname']?></h6>
                    <span class="type"><?= $row['category_sort'].' '.$row['category_name']?></span><br>
                    <span class="size"><?= $row['pro_size']?></span><br>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
<hr>
<hr>
<style type="text/css">
    .notable-price{
        text-decoration-line: line-through; cursor: pointer; padding-left: 30px
    }
    div.col-sm-6.radio>label{
        cursor: pointer;
    }
</style>
<script type="text/javascript">
function add_cart_func_(id, name, qty=1){
    var price = $("input[name='real-price"+id+"']").val();
    jQuery.ajax({
        url: '<?= base_url("product/add_to_cart")?>',
        data: {'id':id, 'name':name, 'price': price, 'qty': qty},
        type: 'post',
        dataType: 'html',
        success: function(res){
            let _res = JSON.parse(res);
            $('span.p1.fa-stack.fa-2x.has-badge').attr('data-count', _res['qtys']);
            $('#navbar-cart-lists').html(_res['contents']);
        },
        error: function(err){
            console.log(error);
        }
    });
}
</script>