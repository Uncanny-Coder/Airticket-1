const lockIcon = document.getElementById("lockIcon");
let password = document.getElementById("password");
const openIcon = document.getElementById("lockIconn");

openIcon.onclick = () => {
  if (password.type === "password") {
    lockIcon.style.visibility = "hidden";
    password.type = "text";
  } else if (password.type === "text") {
    lockIcon.style.visibility = "visible";
    password.type = "password";
  }
};
