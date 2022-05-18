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
