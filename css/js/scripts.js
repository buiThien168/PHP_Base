/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});
const avatar = document.getElementById("avatar");
const thumb = document.getElementById("img_load");

avatar.addEventListener("change", (e) => {
  console.log(e);
  if (e.target.files && e.target.files[0]) {
    let reader = new FileReader();
    reader.onload = function (e) {
      thumb.src = e.target.result;
      // $("#img_load").attr("src", e.target.result);
    };
    reader.readAsDataURL(e.target.files[0]);
  }
});
function togglePasswordVisibility() {
  var passwordInput = document.getElementById("inputPassword");
  var toggleIcon = document.getElementById("toggle-icon");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    toggleIcon.classList.remove("fa-eye");
    toggleIcon.classList.add("fa-eye-slash");
  } else {
    passwordInput.type = "password";
    toggleIcon.classList.remove("fa-eye-slash");
    toggleIcon.classList.add("fa-eye");
  }
}
function getCookie(name) {
  var cookies = document.cookie.split(";");
  for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i].trim();
    if (cookie.startsWith(name + "=")) {
      return cookie.substring(name.length + 1);
    }
  }
  return null;
}
window.addEventListener("load", function () {
  var emailInput = document.getElementById("username");
  var passwordInput = document.getElementById("password");
  var rememberCheckbox = document.getElementById("inputRememberPassword");

  var emailCookie = getCookie("username");
  var passwordCookie = getCookie("password");
  if (emailCookie && passwordCookie) {
    emailInput.value = emailCookie;
    passwordInput.value = passwordCookie;
    rememberCheckbox.checked = true;
  }
});
