const ThemeToggle = () => {
  if (
    window.location == "http://localhost/projet-backend/" ||
    window.location == "http://localhost/projet-backend/index.php"
  ) {
    window.location = "http://localhost/projet-backend/?theme=dark";
  } else if (window.location == "http://localhost/projet-backend/?theme=dark") {
    window.location = "http://localhost/projet-backend/";
  }
};
const Logout = () => {
  window.location = "http://localhost/projet-backend/includes/Logout.inc.php";
};

const searchBar = document.getElementById("searchuser"),
  usersList = document.getElementById("discussionlist");

searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
  if (searchTerm != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (!searchBar.classList.contains("active")) {
          usersList.innerHTML = data;
        }
      }
    }
  };
  xhr.send();
}, 500);
