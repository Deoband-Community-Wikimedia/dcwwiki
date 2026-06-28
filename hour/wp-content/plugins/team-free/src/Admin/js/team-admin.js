jQuery(document).ready(function ($) {
  $(".sptp-generator-tabs .spf-wrapper").css("visibility", "hidden");
  $('.sptp_filter_members').find("option:nth-of-type(2), option:nth-of-type(3), option:nth-of-type(4)").attr('disabled', 'disabled');

 $(`.sptp_image_grayscale option,
    .sptp-inline-repeater-social option,
    .sptp-repeater-select option`).each(function( i, item ) {
    const regex = new RegExp( 'Pro' );
    if ( regex.test( item.innerText ) ) {
      $(item).attr('disabled', 'disabled');
    }
 })

  $('.spf--typography').find('.spf--font-family, .spf--font-style-select, .spf--font-size, .spf--line-height, .spf--text-align, .spf--text-transform, .spf--letter-spacing, .spf--margin-top').attr('disabled', 'disabled');
  $('.sptp_typography_pro').css('pointer-events', 'none');
  $('.spf--block-preview').css('cursor', 'auto');
  $('.spf--block-preview .spf--toggle').hide();
  $('.spf--block-preview').css('pointer-events', 'none');

  var select_value_layout = $(
    ".sptp-layout-preset .spf--sibling.spf--image.spf--active"
  )
    .find("input")
    .val();
  if (select_value_layout === "carousel") {
    $(".spf-nav-metabox li.spf-menu-item-carousel-controls").show();
  } else {
    $(".spf-nav-metabox li.spf-menu-item-carousel-controls").hide();
  }

  $(document).on(
    "click",
    ".sptp-layout-preset .spf--sibling.spf--image",
    function (event) {
      event.stopPropagation();
      var select_value = $(this)
        .find("input")
        .val();

      if (select_value !== "carousel") {
        $(".spf-nav-metabox li.spf-menu-item-carousel-controls").hide();
        $(".spf-nav-metabox li.spf-menu-item-general-settings a").click();
      } else {
        $(".spf-nav-metabox li.spf-menu-item-carousel-controls").show();
      }
    }
  );

  $(".sptp-generator-tabs .spf-wrapper").css("visibility", "visible");
  $(".sptp-generator-tabs .spf-wrapper li").css("opacity", 1);

  $(document).on("click", "#copy-shortcode, #copy-tag", function () {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp
      .val(
        $(this)
          .parent()
          .find("input")
          .val()
      )
      .select();
    document.execCommand("copy");
    $(this).append('<span class="copy-alert">copied</span>');
    setTimeout(function () {
      $(".copy-alert")
        .fadeOut()
        .empty();
    }, 1000);
    $temp.remove();
  });

  $('.sptp-shortcode-selectable, .post-type-sptp_generator .column-shortcode input').on('click',function (e) {
    e.preventDefault();
    /* Get the text field */
    var copyText = $(this);
    /* Select the text field */
    copyText.select();
    document.execCommand("copy");
    jQuery(".sptp-after-copy-text").animate({
      opacity: 1,
      bottom: 25
    }, 300);
    setTimeout(function () {
      jQuery(".sptp-after-copy-text").animate({
        opacity: 0,
      }, 200);
      jQuery(".sptp-after-copy-text").animate({
        bottom: -50
      }, 0);
    }, 2000);
  });
});
