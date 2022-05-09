<div id="navbar">
    <div class="left"><img src="#" alt="logo" />
        <input type="search" name="searchpeople" id="">
    </div>
    <div class="mid">
        <button>Home</button><button>?</button><button>Messages</button><button>Notification</button>
    </div>
    <div class="right">
        <button><img src="#" alt="pfp">Username</button>
        <button id="ThemeSwitch" onclick="ThemeToggle()"><?php
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