  <h2>Three items</h2>
  <div class="owl-carousel owl-carousel3">
    @foreach ($Produck as $key => $value)
    <div>
      <div class="product-item">
        <div class="pi-img-wrapper">
          <img src="{{asset('frontend/theme/assets/pages/img/products/k1.jpg')}}" class="img-responsive" alt="Berry Lace Dress">
          <div>
            <a href="{{asset('frontend/theme/assets/pages/img/products/k1.jpg')}}" class="btn btn-default fancybox-button">Zoom</a>
            <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
          </div>
        </div>
        <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
        <div class="pi-price">$29.00</div>
        <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
        <div class="sticker sticker-new"></div>
      </div>
    </div>
  @endforeach
  </div>
