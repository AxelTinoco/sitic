document.addEventListener("DOMContentLoaded", function(){
  window.addEventListener("scroll", function(){
    let logo = document.querySelector(".et_pb_menu__logo img");
     if (window.scrollY > 100) {
        document.querySelector(".main-header").classList.add("header-scroll");
        // document.querySelector(".main-header-container").classList.add("header-scroll");
        logo.setAttribute("src", "https://dev.siticsoftware.com/wp-content/uploads/2025/03/logo-positivo.svg");
     } else {
        document.querySelector(".main-header").classList.remove("header-scroll");
        // document.querySelector(".main-header-container").classList.remove("header-scroll");
        logo.setAttribute("src", "https://dev.siticsoftware.com/wp-content/uploads/2025/03/logo-white.svg");
     }
  });
});
