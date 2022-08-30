  AOS.init();
  $(document).ready(function () {
      $('.image-link').magnificPopup({
          type: 'image',
          gallery: {
              // options for gallery
              enabled: true
          },
      });
  });

  $(document).ready(function () {
      let width = screen.width;
      if (width < 992) {
          $('.product').addClass('w-100');
          $('.product_type_external').addClass('w-100');
      } else {
          $('.product').removeClass('w-100');
          $('.product_type_external').removeClass('w-100');
      }
  });

  $(window).resize(function () {
      let width = screen.width;

      if (width < 992) {
          $('.product').addClass('w-100');
          $('.product_type_external').addClass('w-100');
      } else {
          $('.product').removeClass('w-100');
          $('.product_type_external').removeClass('w-100');
      }
  });