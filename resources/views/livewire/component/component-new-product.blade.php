<!-- ::::::  Start  Product Style - Default Section  ::::::  -->
<div class="product m-t-100">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- Start Section Title -->
        <div class="section-content section-content--border m-b-35">
          <h5 class="section-content__title">New Products</h5>
          <a href="#" class="btn btn--icon-left btn--small btn--radius btn--transparent btn--border-green btn--border-green-hover-green font--regular text-capitalize">More Products<i class="fal fa-angle-right"></i></a>
        </div>  <!-- End Section Title -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="default-slider default-slider--hover-bg-red product-default-slider">
          <div class="product-default-slider-4grid-1rows gap__col--30 gap__row--40">
            @foreach($products as $product)
              <!-- Start Single Default Product -->
              <div class="product__box product__default--single text-center">
                <!-- Start Product Image -->
                <div class="product__img-box  pos-relative">
                    <a href="#" class="product__img--link">
                    <?php $i=0; ?>
                      <img class="product__img img-fluid" style="width:268px; height:268px;" @foreach($product->product_images as $dd)
                        @if($i<1)
                        src="asset/product/{{$product->id}}/{{$dd->image_name}}"
                        <?php $i=$i+1; ?>
                        @endif
                      @endforeach alt="">
                    </a>
                    <!-- Start Procuct Label -->
                    <!-- <span class="product__label product__label--sale-dis">-34%</span> -->
                    <!-- End Procuct Label -->
                    <!-- Start Product Action Link-->
                    <ul class="product__action--link pos-absolute">
                      <li><a href="#modalAddCart" data-toggle="modal"><i class="icon-shopping-cart"></i></a></li>
                      <li><a href="compare.html"><i class="icon-sliders"></i></a></li>
                      <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                      <?php $i=0; ?>
                      <li><a class="btnQuickView" data-product-nama="{{$product->product_name}}" data-product-price="{{$product->price}}" 
                      @foreach($product->product_images as $dd)
                        @if($i<1)
                        data-product-image="asset/product/{{$product->id}}/{{$dd->image_name}}"
                        <?php $i=$i+1; ?>
                        @endif
                      @endforeach data-product-desc="{{$product->desc}}" data-product-qty="{{$product->stock}}" data-product-rate="{{$product->product_rate}}"><i class="icon-eye"></i></a></li>
                    </ul> <!-- End Product Action Link -->
                </div> <!-- End Product Image -->
                <!-- Start Product Content -->
                <div class="product__content m-t-20">
                  <ul class="product__review">
                    @if($product->product_rate <=0.99)
                    <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                    @elseif($product->product_rate <=1.49)
                      <li class="product__review--fill"><i class="icon-star"></i></li>
                    @elseif($product->product_rate <=1.99)
                      <li class="product__review--fill"><i class="fas fa-star"></i></li>
                      <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                    @elseif($product->product_rate <=2.49)
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    @elseif($product->product_rate <=2.99)
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                    @elseif($product->product_rate <=3.49)
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    @elseif($product->product_rate <=3.99)
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star-half"></i></li>
                    @elseif($product->product_rate <=4.49)
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    @elseif($product->product_rate <=4.99)
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--blank"><i class="icon-star"></i></li>
                    @else
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    <li class="product__review--fill"><i class="fas fa-star"></i></li>
                    @endif
                  </ul>
                  <a href="product-single-default.html" class="product__link">{{$product->product_name}}</a>
                  <div class="product__price m-t-5">
                      <span class="product__price"><?php echo rupiah($product->price) ?> <del>Rp.5.000</del></span>
                  </div>
                </div> <!-- End Product Content -->
              </div> <!-- End Single Default Product -->
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- ::::::  End  Product Style - Default Section  ::::::  -->