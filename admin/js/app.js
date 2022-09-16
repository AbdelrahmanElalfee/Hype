var btn = document.querySelector("#btn_menu");
var sidebar = document.querySelector(".sidebar");
var content = document.querySelector(".main");

btn.onclick = function () {
  sidebar.classList.toggle("active");
  content.classList.toggle("active");
};
