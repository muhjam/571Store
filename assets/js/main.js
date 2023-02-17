// post kalo kembali ga error
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

// jquery
$(document).ready(function () {
  // mencegah form search reload
  $("#form-search").submit(function () {
    event.preventDefault();
  });

  // light slider
  $("#autoWidth").lightSlider({
    autoWidth: true,
    loop: true,
    onSliderLoad: function () {
      $("#autoWidth").removeClass("cS-hidden");
    },
  });
});

// navbar

// search
var inputSearch = document.getElementById("input-search");
function search() {
  inputSearch.style.width = "100px";
  inputSearch.focus();
}

inputSearch.addEventListener("focusout", function () {
  inputSearch.style.width = "0";
});

// on position
$(window).scroll(function () {
  var scrollTop = $(document).scrollTop();
  var home = $("body").find("header");
  var anchors = $("body").find("section");
  var contact = $("body").find("footer");

  for (var i = 0; i < contact.length; i++) {
    if (
      scrollTop > $(contact[i]).offset().top - 50 &&
      scrollTop < $(contact[i]).offset().top + $(contact[i]).height() - 50
    ) {
      $('a[href="#' + $(contact[i]).attr("id") + '"]').addClass("active");
    } else {
      $('a[href="#' + $(contact[i]).attr("id") + '"]').removeClass("active");
    }
  }

  for (var i = 0; i < home.length; i++) {
    if (
      scrollTop > $(home[i]).offset().top - 50 &&
      scrollTop < $(home[i]).offset().top + $(home[i]).height() - 50
    ) {
      $('a[href="#' + $(home[i]).attr("id") + '"]').addClass("active");
    } else {
      $('a[href="#' + $(home[i]).attr("id") + '"]').removeClass("active");
    }
  }

  for (var i = 0; i < anchors.length; i++) {
    if (
      scrollTop > $(anchors[i]).offset().top - 50 &&
      scrollTop < $(anchors[i]).offset().top + $(anchors[i]).height() - 50
    ) {
      $('a[href="#' + $(anchors[i]).attr("id") + '"]').addClass("active");
    } else {
      $('a[href="#' + $(anchors[i]).attr("id") + '"]').removeClass("active");
    }
  }
});
// hide nav
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-110px";
  }
  prevScrollpos = currentScrollPos;
};

// slide header
var slideIndex = 1;
var timer = null;
showSlides(slideIndex);

function plusSlides(n) {
  clearTimeout(timer);
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  clearTimeout(timer);
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n == undefined) {
    n = ++slideIndex;
  }
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    // dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  timer = setTimeout(showSlides, 5000);
}
