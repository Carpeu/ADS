document.addEventListener("DOMContentLoaded", function() {
    var menuHeight = document.querySelector("header").offsetHeight;
    var links = document.querySelectorAll("nav ul li a");
  
    for (var i = 0; i < links.length; i++) {
      links[i].addEventListener("click", function(event) {
        event.preventDefault();
        var targetId = this.getAttribute("href").substr(1);
        var targetElement = document.getElementById(targetId);
        var targetPosition = targetElement.offsetTop - menuHeight;
  
        window.scrollTo({
          top: targetPosition,
          behavior: "smooth"
        });
      });
    }
  });