<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./admin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" />
</head>
<body>
    <div class="admin">
        <img class="ertert-2-icon" alt="" src="./public/ertert-2@2x.png" />
        <div class="logo1">
            <div class="logo2">
                <img class="wire-frame-11" alt="" src="./public/wire-frame-1@2x.png" />
                <div class="sacred-heart-of1">Sacred Heart of Jesus Catholic School</div>
                <div class="library-system1">LIBRARY SYSTEM</div>
                <b class="learning-resource-center1">Learning Resource Center</b>
            </div>
        </div>
        <div class="frame">
            <a href="logout.php"><button class="log-out1">
                <div class="log-out-child"></div>
                <div class="log-out2">LOG OUT</div>
            </button></a>
            <button class="home" id="home">
                <div class="home-child"></div>
                <div class="home1">HOME</div>
                <img class="vector-icon" alt="" src="./public/vector.svg" />
                <img class="vector-icon1" alt="" src="./public/vector.svg" />
            </button>
        </div>
        <div class="navigate">
            <div class="navigate1">navigate</div>
        </div>
        <button class="borrowed">
            <div class="borrowed-child"></div>
            <div class="borrowed-item"></div>
            <div class="header2">Borrowed</div>
            <b class="header3">92</b>
        </button>
        <button class="lost">
            <div class="borrowed-child"></div>
            <div class="borrowed-item"></div>
            <div class="header2">Lost</div>
            <b class="header3">92</b>
        </button>
        <button class="overdue">
            <div class="borrowed-child"></div>
            <div class="borrowed-item"></div>
            <div class="header2">Overdue</div>
            <b class="header3">92</b>
        </button>
        <a href="history.html"><button class="history" id="history">
            <div class="history-child"></div>
            <div class="history1">History</div>
        </button></a>
        <a href="borrowing-form.html"><button class="borrow-book" id="borrowBook">
            <div class="borrow-book-child"></div>
            <div class="borrow-book1">Borrow Book</div>
        </button></a>
        <a href="edit-book.html"><button class="books" id="books">
            <div class="books-child"></div>
            <div class="books1">Books</div>
        </button></a>
    </div>

    <script>
        var home = document.getElementById("home");
        if (home) {
            home.addEventListener("click", function (e) {
                window.location.href = "admin.php";
            });
        }

        var history = document.getElementById("history");
        if (history) {
            history.addEventListener("click", function (e) {
                window.open("./history.html");
            });
        }

        var borrowBook = document.getElementById("borrowBook");
        if (borrowBook) {
            borrowBook.addEventListener("click", function (e) {
                window.location.href = "./borrowing-form.html";
            });
        }

        var books = document.getElementById("books");
        if (books) {
            books.addEventListener("click", function (e) {
                window.location.href = "./edit-book.html";
            });
        }
    </script>
</body>
</html>
