<?php
  $title="PROGNET - TRANSAKSI SIMPANAN";

  function rupiah ($angka) {
    $hasil = 'Rp ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
?>
@extends('layouts.template-user')

@section('content')
  <!-- :::::: Start Main Container Wrapper :::::: -->
  <main id="main-container" class="main-container">
    <div class="hero slider-dot-fix slider-dot slider-dot-fix slider-dot--center slider-dot-size--medium slider-dot-circle  slider-dot-style--fill slider-dot-style--fill-white-active-green dot-gap__X--10">
      <!-- Start Single Hero Slide -->
      <div class="hero-slider">
        <img src="/asset/home/menu-pages.png" alt="">
        <div class="hero__content">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                <div class="hero__content--inner">
                  <h6 class="title__hero title__hero--tiny text-uppercase"></h6>
                  <h1 class="title__hero title__hero--xlarge font--regular text-uppercase"><br> </h1>
                  <h4 class="title__hero title__hero--small font--regular"></h4>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Single Hero Slide -->
      <!-- Start Single Hero Slide -->
      <div class="hero-slider">
        <img src="/asset/home/hero-home-2.webp" alt="">
        <div class="hero__content">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                <div class="hero__content--inner">
                  <h6 class="title__hero title__hero--tiny text-uppercase">100% Healthy & Affordable</h6>
                  <h1 class="title__hero title__hero--xlarge font--regular text-uppercase">Organic <br>   fresh fruits</h1>
                  <h4 class="title__hero title__hero--small font--regular">Small Changes Big Difference</h4>
                  <a href="#" class="btn btn--large btn--radius btn--black btn--black-hover-green font--bold text-uppercase">Shop now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Single Hero Slide -->
    </div> <!-- ::::::  End Hero Section  ::::::  -->



    @livewire('component-home-category')



      <!-- ::::::  Start banner Section  ::::::  -->
    <div class="banner m-t-100 pos-relative">
      <div class="banner__bg">
        <img src="/asset/home/banner-product.webp" alt="">
      </div>
      <div class="banner__box banner__box--single-text-style-2">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="banner__content banner__content--center pos-absolute">
                <h6 class="banner__title  font--medium m-b-10">SPECIAL DISCOUNT</h6>
                <h1 class="banner__title banner__title--large font--regular text-capitalize">For all Grocery <br>
                    products</h1>
                <h6 class="banner__title font--medium m-b-40">Take now 20% off for all grocer product.</h6>
                <a href="product-single-default.html" class="btn btn--large btn--radius btn--black btn--black-hover-green font--bold text-uppercase">Shop now</a>
              </div> 
            </div>
          </div>
        </div>
      </div>    
    </div> <!-- ::::::  End banner Section  ::::::  -->



    <!-- ::::::  Start Testimonial Section  ::::::  -->
    <div class="testimonial m-t-100 pos-relative">
      <div class="testimonial__bg">
        <img src="/asset/home/banner-info.webp" alt="">
      </div>
        <div class="testimonial__content pos-absolute absolute-center text-center">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="section-content__inner">
                  <h2>Yang Perlu Kalian Ketahui Mengenai FreshMart!</h2>
                </div>
                <div class="testimonial__slider default-slider">
                  <div class="testimonial__content--slider ">
                    <div class="testimonial__single">
                      <p class="testimonial__desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                  </div>
                  <div class="testimonial__content--slider ">
                      <div class="testimonial__single">
                          <p class="testimonial__desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                          <div class="testimonial__info">
                              <img class="testimonial__info--user" src="assets/img/testimonial/testimonial-home-1-img-2.png" alt="">
                              <h5 class="testimonial__info--desig m-t-20">Torvi / <span>C0O</span> </h5>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div> <!-- ::::::  End Testimonial Section  ::::::  -->
  </main>  <!-- :::::: End MainContainer Wrapper :::::: -->
@endsection

@section('scriptjs')
  <script type="text/javascript">
    function formatRupiah(angka){
			var 	bilangan = angka;
		
      var	reverse = bilangan.toString().split('').reverse().join(''),
        ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');
      return ribuan;
		}
  </script>
  <script type="text/javascript">
    
    $(function(){

      
        $('body').on('click','.btnQuickView', function(e){
            e.preventDefault();
            var data = $(this).data();
            $('#modalQuickView #modal-product-nama').html(data.productNama);
            $('#modalQuickView #modal-product-image').attr('src', data.productImage);
            $('#modalQuickView #modal-product-price').html("Rp." + formatRupiah(data.productPrice));
            $('#modalQuickView #modal-product-desc').html(data.productDesc);
            $('#modalQuickView #modal-number').attr('value', data.productQty);
            $('#modalQuickView #modal-product-rate').attr('value', data.productRate);

            $('#modalQuickView').modal();
        });
    });
  </script>
  <script type="text/javascript">
    
    $(function(){

        $('body').on('click','.btnAddCart', function(e){
            e.preventDefault();
            var data = $(this).data();
            var myInputQtyCart = document.querySelector(".input_qty_product_cart");
            myInputQtyCart.value =1;
            $('#modalAddCart #modal-product-nama').html(data.productNama);
            $('#modalAddCart #modal-product-image').attr('src', data.productImage);
            $('#modalAddCart #modal-product-price').html("Rp." + formatRupiah(data.productPrice));
            $('#modalAddCart .temp-qty-cart').attr('value', data.productQty);
            $('#modalAddCart .temp-price-cart').attr('value', data.productPrice);
            $('#modalAddCart #output_subtotal_cart').attr('value', "Rp." + formatRupiah(data.productPrice));
            $('#modalAddCart #subtotal_cart').attr('value', data.productPrice);
            $('#modalAddCart #product_id').attr('value', data.productId);
            $('#modalAddCart').modal();
        });
    });
  </script>
  <script type="text/javascript">
    var myInputQtyCart = document.querySelector(".input_qty_product_cart");
    var maks_stock = document.querySelector(".temp-qty-cart");
    var msg = document.querySelector(".pesan-max-terpenuhi");
    var output_subtotal = document.getElementById("output_subtotal_cart");
    var final_subtotal = document.getElementById("subtotal_cart");
    var temp_price = document.querySelector(".temp-price-cart");
    myInputQtyCart.addEventListener("input", myFunction);

    
    function myFunction(){
      output_subtotal.value = "Rp." + formatRupiah(parseInt(myInputQtyCart.value)*parseInt(temp_price.value));
      final_subtotal.value = parseInt(myInputQtyCart.value)*parseInt(temp_price.value);
      if(parseInt(maks_stock.value)==0){
        msg.innerHTML = "";
      }else {
        if(parseInt(myInputQtyCart.value) > parseInt(maks_stock.value)){
          msg.innerHTML = "Stok melebih batas yaitu " + maks_stock.value;
        }else{
          msg.innerHTML = "";
        }
      }     
    };

    function nambahQty(){
      msg.innerHTML = "";
      let x = parseInt(myInputQtyCart.value);
      if(parseInt(myInputQtyCart.value) >= parseInt(maks_stock.value)){
        myInputQtyCart.value = maks_stock.value;
      }else{
        myInputQtyCart.value = x+1;
      }
      output_subtotal.value = "Rp." + formatRupiah(parseInt(myInputQtyCart.value)*parseInt(temp_price.value));
      final_subtotal.value = parseInt(myInputQtyCart.value)*parseInt(temp_price.value);
    };
    
    function kurangQty(){
      msg.innerHTML = "";
      let y = parseInt(myInputQtyCart.value);
      if(myInputQtyCart.value <= 1){
        myInputQtyCart.value = 1;
      }else{
        myInputQtyCart.value = y-1;
      }
      output_subtotal.value = "Rp." + formatRupiah(parseInt(myInputQtyCart.value)*parseInt(temp_price.value));
      final_subtotal.value = parseInt(myInputQtyCart.value)*parseInt(temp_price.value);
    };
  </script>
  @endsection

