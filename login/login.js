const lockIcon = document.getElementById("lockIcon");
let password = document.getElementById("password");
const openIcon = document.getElementById("lockIconn");
const closeBtn = document.getElementById("closeBtn");
const header = document.querySelectorAll("header");

openIcon.onclick = () => {
  if (password.type === "password") {
    lockIcon.style.visibility = "hidden";
    password.type = "text";
  } else if (password.type === "text") {
    lockIcon.style.visibility = "visible";
    password.type = "password";
  }
};
