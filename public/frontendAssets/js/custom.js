// home slider 
var prevIconUrl = '<img src="frontendAssets/static_images/prev.png">';
var nextIconUrl = '<img src="frontendAssets/static_images/next.png">';
$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  dots: true,
  nav: true,
  mouseDrag: true,
  autoplay: true,
  animateOut: 'slideOutUp',
  navText: [
    prevIconUrl,
    nextIconUrl
  ],
  responsive: {
    0: {
      items: 1,
      dots: false
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  },
});




//slider image positining
document.addEventListener('DOMContentLoaded', function() {
  const items = document.querySelectorAll('.owl-item .item');

  items.forEach((item, index) => {
      const banner = item.querySelector('.banner_slider');
      const positions = ['left-top', 'right-center', 'bottom-center'];
      let currentIndex = 0;

      function togglePosition() {
          banner.classList.remove(positions[currentIndex]);
          currentIndex = (currentIndex + 1) % positions.length;
          banner.classList.add(positions[currentIndex]);
      }

      setInterval(togglePosition, 1500); // Change class every 1 second
  });
});



// mobile sub menu list open 
$(".mobile_side_menu_section li").click(function () {
  $(this).siblings().find(".mobile_side_sub_menu_section").slideUp();
  $(this).find(".mobile_side_sub_menu_section").slideToggle();
});

// back to top 
var btn = $('#back_to_top_button');

$(window).scroll(function () {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function (e) {
  e.preventDefault();
  $('html, body').animate({ scrollTop: 0 }, '300');
});

// client slick
$('.client_slick').slick({
  infinite: true,        // Loop infinitely
  speed: 6000,           // Speed of the animation (adjust as needed)
  slidesToShow: 6,       // Number of items to show at once
  slidesToScroll: 1,     // Number of items to scroll at a time
  autoplay: true,        // Auto-play enabled
  autoplaySpeed: 0,      // Set to 0 for continuous scrolling
  cssEase: 'linear',     // Use linear easing for smooth scrolling
  dots: false,
  arrows: false,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 5
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 4
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 400,
      settings: {
        slidesToShow: 2
      }
    }
  ]
});

//testimonial 
$('.testimonial').slick({
  dots: false,
  arrows: true,
  nextArrow: '<span class="slick_right"><i class="bx bxs-right-arrow"></i></span>',
  prevArrow: '<span class="slick_left"><i class="bx bxs-left-arrow"></i></span>',
  infinite: true,
  autoplay: true,
  autoplaySpeed: 5000,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },

    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },

    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

function makesvg(percentage){

  var abs_percentage = Math.abs(percentage).toString();
  var classes = "warning-stroke";


 var svg = '<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg">'
     + '<circle class="circle-chart__background" cx="16.9" cy="16.9" r="15.9" />'
     + '<circle class="circle-chart__circle '+classes+'"'
     + 'stroke-dasharray="'+ abs_percentage+',100"    cx="16.9" cy="16.9" r="15.95" />'
     + '<g class="circle-chart__info">';
  
  return svg
}

(function( $ ) {

    $.fn.circlechart = function() {
        this.each(function() {
            var percentage = $(this).data("percentage");
            var inner_text = $(this).text();
            $(this).html(makesvg(percentage, inner_text));
        });
        return this;
    };

}( jQuery ));


// image gallery 
$(document).ready(function () {
  // JavaScript
  $('.buttons').click(function () {
    $(this).addClass('active').siblings().removeClass('active');
    var filter = $(this).attr('data-filter');

    if (filter == 'All') {
      $('.img_box').show(400);
    } else {
      $('.img_box').hide(200);
      $('.img_box').has('.' + filter).show(400);
    }
  });

  $('.gallery').magnificPopup({

    delegate: 'a',
    type: 'image',
    gallery: {
      enabled: true
    }

  });

});

// image gallery animation 
document.addEventListener('DOMContentLoaded', function () {
  const imgBoxes = document.querySelectorAll('.img_box');
  imgBoxes.forEach((imgBox, index) => {
    setTimeout(() => {
      imgBox.classList.add('loading');
    }, index * 800); // Delay each image's animation by 1000ms (1 second)
  });
});
// back to top 
var btn = $('#back_to_top_button');

$(window).scroll(function () {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function (e) {
  e.preventDefault();
  $('html, body').animate({ scrollTop: 0 }, '300');
});

// gallery 
function showPanel(panelId) {
  // Hide all panels
  var panels = document.querySelectorAll('.panel_show > div');
  panels.forEach(function (panel) {
    panel.classList.add('hidden');
  });

  // Show the selected panel
  var selectedPanel = document.querySelector('.' + panelId);
  selectedPanel.classList.remove('hidden');

  // Deactivate all buttons
  var buttons = document.querySelectorAll('.glowing_btn_div .learn_more_btn');
  buttons.forEach(function (button) {
    button.classList.remove('active');
  });

  // Activate the button corresponding to the selected panel
  var correspondingButton = document.querySelector('button[data-panel="' + panelId + '"]');
  correspondingButton.classList.add('active');
}


// language change 
$(document).ready(function () {
  $(".language_change").click(function (e) {
    e.stopPropagation(); // Prevent the click from propagating to the document
    $(".language_select_option").toggle();
    $(this).find(".arrow_icon").toggleClass("rotate-icon");
  });

  $(document).click(function (e) {
    // Check if the click was not within the language_change or language_select_option elements
    if (!$(e.target).closest(".language_change, .language_select_option").length) {
      $(".language_select_option").hide(); // Close the panel
      $(".language_change .arrow_icon").removeClass("rotate-icon"); // Reset arrow icon
    }
  });
});

const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});

// online registration 
$(document).ready(function () {
  // Initially, show the panel corresponding to the checked radio button
  $(".customer_choose_package:checked").each(function () {
    var id = $(this).attr("id");
    $("#panel-" + id).addClass("active");
  });

  // When a radio button is clicked, show the corresponding panel and hide others
  $(".customer_choose_package").change(function () {
    var id = $(this).attr("id");
    $(".package_registration_panel").removeClass("active");
    $("#panel-" + id).addClass("active");
  });
});


//corporate alert open
function toggleCorporateAlert() {
  var corporateAlert = document.getElementById("corporateAlert");

  if (corporateAlert.style.display === "none" || corporateAlert.style.display === "") {
    corporateAlert.style.display = "block";
    // Add a click event listener to the overlay to close the modal when clicked outside
    document.querySelector(".corporate_alert").addEventListener("click", function (e) {
      if (e.target === corporateAlert) {
        corporateAlert.style.display = "none";
      }
    });
  } else {
    corporateAlert.style.display = "none";
  }
}




// ajax start 
//sort-news_event with ajax
$(document).ready(function () {
  $("#news_event_sort").on('change', function () {
    var url = $(this).data('url');
    var news_event_sort = $('#news_event_sort').val();
    $.ajax({
      url: url,
      method: "GET",
      data: { news_event_sort: news_event_sort },
      success: function (res) {
        $('.news_events_result').html(res);
        if (res.status == 'nothing found') {
          $('.news_events_result').html('<span class="text-black fw-bold text-center wow fadeInUp">' + 'Nothing Found' + '</span>');
        }
      }
    });
  });
});

//search-news-event with ajax
$(document).ready(function () {
  $("#news_event_search").on('keyup', function (e) {
    e.preventDefault();
    let search_string = $('#news_event_search').val();
    var url = $(this).data('url');
    $.ajax({
      url: url,
      method: "GET",
      data: { search_string: search_string },
      success: function (res) {
        $('.news_events_result').html(res);
        if (res.status == 'nothing found') {
          $('.news_events_result').html('<span class="text-black fw-bold text-center wow fadeInUp">' + 'Nothing Found' + '</span>');
        }
      }
    });
  });
});

//sort-notice with ajax
$(document).ready(function () {
  $("#notice_sort").on('change', function () {
    var url = $(this).data('url');
    var notice_sort = $('#notice_sort').val();
    $.ajax({
      url: url,
      method: "GET",
      data: { notice_sort: notice_sort },
      success: function (res) {
        $('.notice_result').html(res);
        if (res.status == 'nothing found') {
          $('.notice_result').html('<span class="text-black fw-bold text-center wow fadeInUp">' + 'Nothing Found' + '</span>');
        }
      }
    });
  });
});

//search-notice with ajax
$(document).ready(function () {
  $("#notice_search").on('keyup', function (e) {
    e.preventDefault();
    let search_string = $('#notice_search').val();
    var url = $(this).data('url');
    $.ajax({
      url: url,
      method: "GET",
      data: { search_string: search_string },
      success: function (res) {
        $('.notice_result').html(res);
        if (res.status == 'nothing found') {
          $('.notice_result').html('<span class="text-black fw-bold text-center wow fadeInUp">' + 'Nothing Found' + '</span>');
        }
      }
    });
  });
});

//sort-employee with ajax
window.getEmployeeByDepartment = function (e, url) {
  var department_name = $(e).html();
  $('.sort_btn span').html(department_name);
  $.ajax({
    type: "get",
    url: url,
    success: function (response) {
      $('.employee_result').html(response);
      if (response.status == 'nothing found') {
        $('.employee_result').html('<span class="text-black fw-bold text-center wow fadeInUp">' + 'Nothing Found' + '</span>');
      }
    }
  });
};




//search-employee with ajax
$(document).ready(function () {
  $("#employee_search").on('keyup', function (e) {
    e.preventDefault();
    let search_string = $('#employee_search').val();
    var url = $(this).data('url');
    $.ajax({
      url: url,
      method: "GET",
      data: { search_string: search_string },
      success: function (res) {
        $('.employee_result').html(res);
        if (res.status == 'nothing found') {
          $('.employee_result').html('<span class="text-black fw-bold text-center wow fadeInUp">' + 'Nothing Found' + '</span>');
        }
      }
    });
  });
});

//sort-branch with ajax
window.getBranchByLocation = function (e, url) {
  var location_name = $(e).html();
  $('.sort_btn span').html(location_name);
  $.ajax({
    type: "get",
    url: url,
    success: function (response) {
      $('.branch_result').html(response);
      if (response.status == 'nothing found') {
        $('.branch_result').html('<span class="text-black fw-bold text-center wow fadeInUp">' + 'Nothing Found' + '</span>');
      }
    }
  });
};

//search-branch with ajax
$(document).ready(function () {
  $("#branch_search").on('keyup', function (e) {
    e.preventDefault();
    let search_string = $('#branch_search').val();
    var url = $(this).data('url');
    $.ajax({
      url: url,
      method: "GET",
      data: { search_string: search_string },
      success: function (res) {
        $('.branch_result').html(res);
        if (res.status == 'nothing found') {
          $('.branch_result').html('<span class="text-black fw-bold text-center wow fadeInUp">' + 'Nothing Found' + '</span>');
        }
      }
    });
  });
});

//search-blog with ajax
$(document).ready(function () {
  $("#blog_search").on('keyup', function (e) {
    e.preventDefault();
    let search_string = $('#blog_search').val();
    var url = $(this).data('url');
    $.ajax({
      url: url,
      method: "GET",
      data: { search_string: search_string },
      success: function (res) {
        $('.blog_result').html(res);
        if (res.status == 'nothing found') {
          $('.blog_result').html('<span class="text-black fw-bold text-center wow fadeInUp">' + 'Nothing Found' + '</span>');
        }
      }
    });
  });
});

//sort-blog by category with ajax
window.sortBlogByCategory = function (e, url) {
  $.ajax({
    type: "get",
    url: url,
    success: function (response) {
      $('.blog_result').html(response);
      if (response.status == 'nothing found') {
        $('.blog_result').html('<span class="text-black fw-bold text-center wow fadeInUp">' + 'Nothing Found' + '</span>');
      }
    }
  });
};
//sort-blog by tag with ajax
window.sortBlogByTag = function (e, url) {
  $('.tags-items a').removeClass('active');
  $(e).addClass('active');

  $.ajax({
    type: "get",
    url: url,
    success: function (response) {
      $('.blog_result').html(response);
      if (response.status == 'nothing found') {
        $('.blog_result').html('<span class="text-black fw-bold text-center wow fadeInUp">' + 'Nothing Found' + '</span>');
      }
    }
  });
};
