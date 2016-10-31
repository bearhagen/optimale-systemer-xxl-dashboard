<?php
    if (!$_GET) {
        header('Location: index.php');
        die();
    }

    require_once("head.php");
?>
    </head>
    <body>
        <img id="img-nav-left" src="images/nav-left.png" alt="Nav left">
        <img id="img-nav-top" src="images/nav-top.png" alt="Nav top">
        <img id="img-chat" src="images/chat.png" alt="Chat">
        <div id="dynamic"></div>
    </body>
    <script>
        window.onload = function() {
            sizeUI();

            var userType = document.location.search.replace("?user_type=", "");
            var contentEl = document.getElementById("dynamic");
            var contents = [
                {title: "To do", color: "red", icon: "list-1-1"},
                {title: "Kalender", color: "blue", icon: "calendar-2"},
                {title: "Guides", color: "orange", icon: "book-1"}
            ];

            switch(userType) {
                case "admin":
                    contents.push({title: "Lønninger", color: "green", icon: "dollar-bag"});
                    contents.push({title: "Logisitkk", color: "blue", icon: "truck-1"});
                    break;
                case "salg":
                    contents.push({title: "Kunder", color: "red", icon: "contacts-2"});
                    break;
                case "dev":
                    contents.push({title: "Status", color: "grey-dark", icon: "window-graph-1"});
                    contents.push({title: "Instillinger", color: "grey-dark", icon: "setting-wrenches"});
                    contents.push({title: "Oversikt", color: "black", icon: "globe-1"});
                    break;
                default:
                    break;
            }

            var i = 0;
            var tmpHTML = "";
            var tmpHTMLClosed = false;

            contents.forEach(function(tile, index) {
                if (i%4 === 0) {
                    tmpHTML += "<div class=\"row\">";
                    tmpHTMLClosed = false
                }

                tmpHTML += "<div class=\"tile bg-" + tile.color + "\">" +
                               "<i class=icon-" + tile.icon + "></i>" +
                               "<h1>" + tile.title + "</h1>" +
                           "</div>";

                i++;

                if (i%4 === 0) {
                    tmpHTML += "</div>";
                    tmpHTMLClosed = true;
                }

            });

            if (!tmpHTMLClosed) {
                tmpHTML += "</div>";
            }

            contentEl.innerHTML = tmpHTML;
        }

        window.onresize = sizeUI;

        function sizeUI() {
            var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
            var navLeft = document.getElementById("img-nav-left");
            var navTop = document.getElementById("img-nav-top");
            var chat = document.getElementById("img-chat");
            var contentEl = document.getElementById("dynamic");

            navTop.style.width = windowWidth - navLeft.offsetWidth + "px";
            
            chat.style.width = navLeft.offsetWidth + "px";
            chat.style.top = navTop.offsetHeight + 25 + "px";

            contentEl.style.top = navTop.offsetHeight + 25 + "px";
            contentEl.style.left = navLeft.offsetWidth + 25 + "px";
            contentEl.style.width = (windowWidth - navLeft.offsetWidth - chat.offsetWidth - 75) + "px";
            contentEl.style.height = (windowHeight - navTop.offsetHeight - 50) +  "px";
        }
    </script>
</html>