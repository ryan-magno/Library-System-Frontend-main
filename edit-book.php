<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./edit-book.css" />
    <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap"
    />
</head>
<body>
<div class="edit-book4">
    <img class="ertert-2-icon2" alt="" src="./public/ertert-2@2x.png" />

    <button class="delete-book" id="delete-book">
        <div class="delete-book-inner">
            <div class="delete-book-wrapper">
                <div class="delete-book1">Delete Book</div>
            </div>
        </div>
    </button>
    <div class="or">or</div>
    <div class="logo8">
        <div class="logo9">
            <img class="wire-frame-13" alt="" src="./public/logo@2x.png" />
            <div class="sacred-heart-of4">
                Sacred Heart of Jesus Catholic School
            </div>
            <div class="old-stamesa-manila4">4324 OLD STA.MESA, MANILA</div>
            <div class="library-system5">LIBRARY SYSTEM</div>
            <div class="paascu-accredited-level4">
                PAASCU ACCREDITED LEVEL III
            </div>
            <b class="learning-resource-center4">Learning Resource Center</b>
        </div>
    </div>
    <div class="frame13"></div>
    <button class="home10" id="home">
        <div class="home-child3"></div>
        <div class="home11">HOME</div>
        <img class="vector-icon10" alt="" src="./public/vector.svg" />
        <img class="vector-icon11" alt="" src="./public/vector.svg" />
    </button>
    <button class="log-out11" id="logout">
        <div class="log-out-child3"></div>
        <div class="log-out12">LOG OUT</div>
    </button>
    <button class="donebutton1" id="done">
        <div class="done1">Done</div>
    </button>
    <div class="book-cover3">
        <img class="book-cover-inner" alt="" src="./public/rectangle-12.svg" />
        <div class="uploadfiletext1">Upload File</div>
        <img class="uploadicon2" alt="" src="./public/uploadicon.svg" />
        <img class="book-cover-inner" alt="" src="./public/rectangle-12.svg" />
        <img class="uploadicon2" alt="" src="./public/uploadicon.svg" />
        <div class="book-cover4">Book Cover</div>
        <input class="upload1" required="true" type="file" id="upload-file" />
    </div>
    <div class="genre4">
        <img class="genre-item" alt="" src="./public/rectangle-12.svg" />
        <div class="select3">Select</div>
        <div class="genre5">Genre</div>
    </div>
    <select class="history-group" id="genre">
        <option value="History">History</option>
        <option value="Science">Science</option>
    </select>
    <div class="publisher3">
        <img class="publisher-item" alt="" src="./public/rectangle-12.svg" />
        <input class="type-here8" placeholder="Type here..." type="text" id="publisher" />
    </div>
    <div class="book-id17">
        <img class="publisher-item" alt="" src="./public/rectangle-12.svg" />
        <div class="book-id18">Book ID</div>
        <input class="type-here8" placeholder="Type here..." type="number" id="book-id" />
    </div>
    <div class="author5">
        <img class="publisher-item" alt="" src="./public/rectangle-12.svg" />
        <div class="author6">Author</div>
        <input class="type-here8" placeholder="Type here..." type="text" id="author" />
    </div>
    <div class="copies3">
        <img class="publisher-item" alt="" src="./public/rectangle-12.svg" />
        <div class="author6">Copies</div>
        <input class="type-here8" placeholder="Type here..." type="text" id="copies" />
    </div>
    <div class="title4">
        <img class="publisher-item" alt="" src="./public/rectangle-12.svg" />
        <input class="type-here12" placeholder="Type here..." type="text" id="title" />
        <div class="title5">Title</div>
    </div>
    <div class="publication-date4">
        <img class="publication-date-child1" alt="" src="./public/rectangle-12.svg" />
        <div class="publication-date5">Publication Date</div>
        <input class="type-here8" placeholder="Type here..." type="text" id="publication-date" />
        <img class="publication-date-child1" alt="" src="./public/rectangle-12.svg" />
        <div class="publication-date5">Publication Date</div>
        <input class="type-here8" placeholder="Type here..." type="text" id="publication-date" />
        <img class="publication-date-child3" alt="" src="./public/add-sahpe.svg" />
        <div class="choose7">Choose</div>
        <button class="button8">
            <img class="button-item" alt="" src="./public/add-sahpe.svg" />
            <div class="choose8">Choose</div>
        </button>
    </div>
    <div class="bookid2">
        <div class="book-id19">
            <div class="book-id20">
                <img class="publication-date-child1" alt="" src="./public/rectangle-12.svg" />
                <div class="book-id21">Subject</div>
                <button class="add-sahpe-container">
                    <img class="button-item" alt="" src="./public/add-sahpe.svg" />
                    <div class="add2">Add</div>
                </button>
                <input class="input9" placeholder="Type here..." type="text" id="subject" />
            </div>
        </div>
    </div>
    <div class="section1">
<div class="last-name9">
<img class="shape-icon13" alt="" src="./public/shape.svg" />
<input class="input10" placeholder="Type here..." type="text" id="section" />
</div>
<div class="last-name10">Section</div>
</div>
<div class="edit-book5">EDIT BOOK</div>

</div>
<script>
    document.getElementById("home").addEventListener("click", function () {
        window.location.href = "admin.html";
    });

    document.getElementById("delete-book").addEventListener("click", function () {
        // Add AJAX call to delete book
        var bookId = document.getElementById("book-id").value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_book.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle response, maybe show a message to the user
                alert(xhr.responseText);
            }
        };
        xhr.send("book_id=" + bookId);
    });

    document.getElementById("logout").addEventListener("click", function () {
        // Add logout logic here
    });

    document.getElementById("done").addEventListener("click", function () {
        // Add AJAX call to update book information
        var bookId = document.getElementById("book-id").value;
        var title = document.getElementById("title").value;
        var author = document.getElementById("author").value;
        var publisher = document.getElementById("publisher").value;
        var copies = document.getElementById("copies").value;
        var genre = document.getElementById("genre").value;
        var section = document.getElementById("section").value;
        var publicationDate = document.getElementById("publication-date").value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_book.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle response, maybe show a message to the user
                alert(xhr.responseText);
            }
        };
        xhr.send("book_id=" + bookId + "&title=" + title + "&author=" + author + "&publisher=" + publisher + "&copies=" + copies + "&genre=" + genre + "&section=" + section + "&publication_date=" + publicationDate);
    });

    document.getElementById("upload-file").addEventListener("change", function () {
        // Handle file upload
    });

    document.getElementById("genre").addEventListener("change", function () {
        // Handle genre selection
    });

    // Add similar event listeners for other elements as needed
    // Autosuggest Book Titles
document.getElementById("title").addEventListener("input", function () {
    var title = this.value;
    // Send title to PHP script via AJAX
    // Receive JSON response and display suggestions
});

// Display Book Info on Click
document.addEventListener("click", function (event) {
    if (event.target.classList.contains("book-suggestion")) {
        var bookId = event.target.dataset.bookId;
        // Send bookId to PHP script via AJAX
        // Receive JSON response and update UI with book info
    }
});

// Update Book Info on Clicking "Done"
document.getElementById("done").addEventListener("click", function () {
    var bookId = document.getElementById("book-id").value;
    var title = document.getElementById("title").value;
    // Get other input values
    // Send updated info to PHP script via AJAX
});

// Delete Book
document.getElementById("delete-book").addEventListener("click", function () {
    var bookId = document.getElementById("book-id").value;
    // Send bookId to PHP script via AJAX for deletion
});

</script>
</body>
</html>