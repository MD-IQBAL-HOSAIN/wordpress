var scrollToTopBtn = document.getElementById("scrollToTopBtn");
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollToTopBtn.style.display = "inline";
  } else {
    scrollToTopBtn.style.display = "none";
  }
}
function scrollToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
