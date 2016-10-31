<?php
    require_once("head.php");
?>
    </head>
    <body>
        <header id="header">
            <img src="images/logo.svg" alt="XXL logo">
            <p>All sports united</p>
        </header>
        <div id="login-wrapper">
            <div id="login" class="box box-dark box-accent center-v center-h">
                <header>
                    <h1>LOGG INN</h1>
                </header>
                <section class="box-fields">
                    <input id="user-type" type="text" placeholder="BRUKERNAVN">
                    <input type="password" placeholder="PASSORD">
                </section>
                <section class="box-footer">
                    <button id="btn-login"><i class="icon-arrow-right"></i></button>
                </section>
            </div>
        </div>
        <footer id="footer">
            <img src="images/decor-bot.svg" alt="">
        </footer>
    </body>
    <script>
        window.onload = function() {
            moveFooter();

            document.getElementById("btn-login").onclick = function() {
                document.location = "logged-in.php?user_type=" + document.getElementById("user-type").value + "";
            }
        }

        window.onresize = moveFooter;

        function moveFooter() {
            var footer = document.getElementById("footer");

            if (window.innerHeight > (document.getElementById("header").offsetHeight + document.getElementById("login-wrapper").offsetHeight + footer.offsetHeight)) {
                footer.style.marginTop = (window.innerHeight - document.getElementById("header").offsetHeight - document.getElementById("login-wrapper").offsetHeight - footer.offsetHeight) + "px";
            }
        }
    </script>
</html>