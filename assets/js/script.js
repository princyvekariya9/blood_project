
(function ($) {

    /*
        1. Data Background Function
        2. Scroll top button
        3. Offcanvus toggle
        4. Theme Slider Functions
        5. Pricing Range Slider
        6. Nice Select
        7. Checkout Toggle
        8. Header Sticky
        9. Mobile Menu
        10. Header Search 
        11. Preloader
        12. Fancybox
        13. Countdown
        14. Cart Drawer
        15. Wow Js
        16. Count Down
        17. Accordion Boxs
    */

    //fancy box video popup 
    Fancybox.bind("[data-fancybox]", {
    });


    $(".campaign_slider").slick({
        slidesToShow: 2,
        arrows: false,
        dots: true,
        customPaging: function (slider, i) {
            return '<span></span>';
        },
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    $(".testi_slider").slick({
        slidesToShow: 3,
        arrows: false,
        dots: false,
        responsive: [
            {
                breakpoint: 1150,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 765,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });
    $(".testimonials__slider").slick({
        slidesToShow: 1,
        arrows: false,
        dots: false,
    });

    $(".hm1_hero_slider").slick({
        autoplay: true,
        slidesToShow: 1,
        prevArrow: '<button class="prev-arrow"><i class="fa-solid fa-chevron-left"></i></button>',
        nextArrow: '<button class="next-arrow"><i class="fa-solid fa-chevron-right"></i></button>',
        speed: 800,
        fade: true,
    });


    $(".gallary_slider").slick({
        slidesToShow: 3,
        arrows: false,
        dots: true,
        customPaging: function (slider, i) {
            return '<span></span>';
        },
        responsive: [
            {
                breakpoint: 700,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 450,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    $(".cam_detail_slider").slick({
        slidesToShow: 2,
        arrows: false,
        dots: true,
        customPaging: function (slider, i) {
            return '<span></span>';
        },
        responsive: [
            {
                breakpoint: 450,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });


    $(".contact__slider").slick({
        slidesToShow: 1,
        arrows: false,
        slidesToScroll: 1,
    });


    $(".user__Slider").slick({
        slidesToShow: 2,
        arrows: false,
        slidesToScroll: 1,
    });

    $(".km_blog__slider").slick({
        slidesToShow: 1,
        arrows: true,
        slidesToScroll: 1,
        prevArrow: '<button class="prev-arrow"><i class="fas fa-arrow-left"></i></button>',
        nextArrow: '<button class="next-arrow"><i class="fas fa-arrow-right"></i></button>',
    });



    $('.km__main__slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.bottom__slider'
    });
    $('.bottom__slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: true,
        asNavFor: '.km__main__slider',
        prevArrow: '<button class="prev-arrow"><i class="fas fa-arrow-left"></i></button>',
        nextArrow: '<button class="next-arrow"><i class="fas fa-arrow-right"></i></button>',
    });



    //nice select
    $('.nice_select').niceSelect();


    // Preloader
    setTimeout(() => {
        $('.preloader').fadeOut()
    }, 1000);



    // Scroll back to top
    var progressPath = document.querySelector('.progress-wrap path');
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
    var updateProgress = function () {
        var scroll = $(window).scrollTop();
        var height = $(document).height() - $(window).height();
        var progress = pathLength - (scroll * pathLength / height);
        progressPath.style.strokeDashoffset = progress;
    }
    updateProgress();
    $(window).scroll(updateProgress);
    var offset = 150;
    var duration = 550;
    jQuery(window).on('scroll', function () {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.progress-wrap').addClass('active-progress');
        } else {
            jQuery('.progress-wrap').removeClass('active-progress');
        }
    });
    jQuery('.progress-wrap').on('click', function (event) {
        event.preventDefault();
        jQuery('html, body').animate({
            scrollTop: 0
        }, duration);
        return false;
    });

    // sticky header

    $(window).scroll(function () {

        if ($(window).scrollTop() > 200) {
            $('.header_bottom').addClass('fixed_menu');
        } else {
            $('.header_bottom').removeClass('fixed_menu');
        }
    });


    // counter UP
    $(document).ready(function () {
        $('.count').counterUp({
            delay: 10,
            time: 5000
        });
    });


})(jQuery);



// leave apply  
const COMMENTS_PER_PAGE = 3;
let currentPage = 0;

window.addEventListener('DOMContentLoaded', function() {
  loadComments();
});

document.getElementById('commentForm').addEventListener('submit', function(event) {
  event.preventDefault();

  // Get form values
  const name = document.getElementById('name').value;
  const comment = document.getElementById('comment').value;

  // Get current date and time
  const date = new Date();
  const formattedDate = `${date.toLocaleDateString()} at ${date.toLocaleTimeString()}`;

  // Create a comment object
  const newComment = {
    name: name,
    date: formattedDate,
    text: comment
  };

  // Save the comment to local storage
  saveComment(newComment);

  // Reload comments to reflect the new addition
  loadComments();

  // Clear the form
  document.getElementById('commentForm').reset();
});

document.getElementById('showMoreBtn').addEventListener('click', function() {
  currentPage++;
  loadComments();
});

function saveComment(comment) {
  // Get existing comments from local storage
  const comments = JSON.parse(localStorage.getItem('comments')) || [];

  // Add the new comment to the array
  comments.push(comment);

  // Save the updated comments array back to local storage
  localStorage.setItem('comments', JSON.stringify(comments));
}

function loadComments() {
  // Get comments from local storage
  const comments = JSON.parse(localStorage.getItem('comments')) || [];

  // Calculate the start and end index for the current page
  const start = currentPage * COMMENTS_PER_PAGE;
  const end = start + COMMENTS_PER_PAGE;

  // Clear the comments section
  document.getElementById('commentsSection').innerHTML = '';

  // Display the relevant comments
  comments.slice(0, end).forEach(addCommentToPage);

  // Show or hide the "Show More" button
  if (end < comments.length) {
    document.getElementById('showMoreBtn').style.display = 'block';
  } else {
    document.getElementById('showMoreBtn').style.display = 'none';
  }
}

function addCommentToPage(comment) {
  // Create a new comment block
  const commentBlock = document.createElement('div');
  commentBlock.classList.add('comments__text');

  commentBlock.innerHTML = `
    <span><b class="me-3">${comment.name}</b>Says ${comment.date}</span>
    <p class="mt-3">${comment.text}</p>
    <button class="mt-3 r__btn">Reply</button>
  `;

  // Add the new comment to the comments section
  document.getElementById('commentsSection').appendChild(commentBlock);
}
