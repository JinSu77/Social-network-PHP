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
const userMessages = [
  {
    user: "Maria DeLopez",
    latestmessage: "Lemme see yo body baby",
    read: false,
  },
  {
    user: "John Doe",
    latestmessage: "Yo bro can you come tonight ?",
    read: false,
  },
  {
    user: "Katy Petty",
    latestmessage:
      "Oh baby you cute but I got a boyfriend and I ain't sharin it",
    read: true,
  },
  {
    user: "Biola Kuruz",
    latestmessage: "Help I need to see yo momma she to big",
    read: true,
  },
  {
    user: "Patrick Sebastien",
    latestmessage:
      "Ha ! Qu'est-ce qu'on est serré, au fond de cette boite,Chantent les sardines, chantent les sardines,Ha ! Qu'est-ce qu'on est serré, au fond de cette boite,Chantent les sardines entre l'huile et les aromates. (x2) ",
    read: true,
  },
  {
    user: "Krush Sanda",
    latestmessage: "I love you Sanda",
    read: true,
  },
];
