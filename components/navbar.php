<?php require_once "./includes/db_connect.inc.php";
?>
<div id="navbar">
    <div class="left">
        <img src="./styles/img/logo.png" alt="logo" class="logo" />
        <input type="search" name="searchpeople" id="addUser" oninput="addUser()">
        <div id="searchuserlist"></div>
    </div>
    <div class="mid">
        <button><svg class="theme-ico" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg></button>
        <button>
            <svg class="ico" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </button>
        <button>
            <svg class="ico" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
        </button>
        <button>
            <svg class="ico" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
        </button>
    </div>
    <div class="right">
        <button><img class="pfp" src="./styles/img/pfp.jpg" alt="pfp"><?php echo $_SESSION['useruid']; ?></button>
        <button onclick="Logout()">Logout</button>
        <button id="ThemeSwitch" onclick="ThemeToggle()">
            <?php
            if (isset($_GET['theme']) && $_GET['theme'] == 'dark') {
                echo '`<svg class="theme-ico" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
<path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
</svg>`';
            } else {
                echo '`<svg class="theme-ico" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
<path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
</svg>`';
            }
            ?></button>
    </div>
</div>
<script>
const addUser = (searchInput) => {
    let input = document.getElementById("addUser").value;
    let data = new FormData();
    data.append("search", input);
    fetch("./includes/search.inc.php", {
            method: "POST",
            body: data,
        })
        .then((resp) => resp.text())
        .then((json) => {
            let list = document.getElementById("searchuserlist");
            list.innerHTML = "";
            let data = JSON.parse(json);
            let usercard = document.createElement("a");
            
            usercard.href = "includes/addUser.php?id="+data.id+"&username="+data.username
            usercard.classList.add("user-card");
            usercard.innerText = data.username;
            list.appendChild(usercard);
            console.log(data["username"]);

        });
};
</script>