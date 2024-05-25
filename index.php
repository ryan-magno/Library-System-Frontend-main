<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" />
</head>
<body>
    <div class="all" width="100%">
        <div class="landing">
            <div class="header">
                <button class="log-in" id="logInButton">
                    <div class="log-in-child"></div>
                    <div class="log-in1">LOG IN</div>
                </button>
            </div>
            <div class="button7-parent">
                <button class="button7"></button>
                <button class="button3"></button>
                <button class="button5"></button>
                <button class="button1"></button>
                <button class="button6"></button>
                <button class="button2"></button>
                <button class="button4"></button>
            </div>
            <div class="left" width="40%">
                <div class="library-rules">
                    <div class="library-rules-child"></div>
                    <div class="library-rules-item"></div>
                    <div class="rules">
                        <ul class="user-must-not-have-overdue-boo">
                            <li class="user-must-not">User must not have overdue books.</li>
                            <li class="user-must-not">There is a set duration that a user may borrow the book.</li>
                            <!-- Add more rules here if needed -->
              </li>
              <li class="user-must-not">Failure to Return a Circulation Book.</li>
              <li class="user-must-not">
                Php 2.00 a day, exclusive of Sundays and holidays.
              </li>
              <li class="user-must-not">Failure to Return a Reserve Book.</li>
              <li class="user-must-not">Php 1.00 (first hour)</li>
              <li class="user-must-not">
                Php 5.00 (Each hour after the first hour)
              </li>
              <li class="user-must-not">Php 50.00 (Whole day)</li>
              <li class="user-must-not">
                Withdrawal of a Reserve Book Without Reservation Permit.
              </li>
              <li class="user-must-not">Php 50.00</li>
              <li class="user-must-not">
                Failure to Return a General Reference Book and Other Restricted
                Materials Borrowed for Photocopying Purposes.
              </li>
              <li class="user-must-not">Php 50.00 fine</li>
              <li class="user-must-not">
                Library privileges suspended for 1 week (second offense)
              </li>
              <li class="user-must-not">Loss of a Circulation Book</li>
              <li class="user-must-not">
                Replace it with the same title or good photocopy or pay its
                current replacement value
              </li>
              <li>
                The person shall pay a fine equivalent to 50% of the cost of the
                book
              </li>
              </ul>
                    </div>
                    <div class="header1">Library Rules</div>
                </div>
            </div>
            <div class="right" width="60%">
        <div class="logo">
          <img class="wire-frame-1" alt="" src="./public/wire-frame-1@2x.png" />

          <div class="sacred-heart-of">Sacred Heart of Jesus Catholic School</div>
          <div class="library-system">LIBRARY SYSTEM</div>
          <div class="learning-resource-center">Learning Resource Center</div>
        </div>
        <div class="book-search">
          <img
            class="magnifying-glass-icon"
            alt=""
            src="./public/magnifying-glass@2x.png"
          />

          <input class="type-here" placeholder="Type here..." type="text" />

          <b class="search-for-a">Search for a book</b>
        </div>
        <button class="book" id="book">
          <img
            class="canva-brown-rusty-mystery-nove-icon"
            alt=""
            src="./public/canvabrownrustymysterynovelbookcoverhg1qha7bibu-1@2x.png"
          />

          <b class="animal-farm">Animal Farm</b>
          <div class="george-orwell">George Orwell</div>
        </button>
      </div>
    </div>

    <div id="loginPopUpPopup" class="popup-overlay" style="display: none">
      <div class="login-pop-up">
        <div class="bottom-red"></div>
        <div class="top-red"></div>
        <div class="logo3">
          <img class="logo-icon" alt="" src="./public/logo@2x.png" />

          <div class="school-name">Sacred Heart of Jesus Catholic School</div>
          <div class="library-system2">LIBRARY SYSTEM</div>
          <b class="system">Learning Resource Center</b>
        </div>
        <b class="id">ID</b>
        <input class="id-input" placeholder="Type here..." type="text" />

        <b class="password">Password</b>
        <input class="password1" placeholder="Type here..." type="password" />

        <div class="log-in4" id="popuplogInContainer">
          <div class="log-in-inner"></div>
          <div class="log-in5">LOG IN</div>
        </div>
      </div>
    </div>

    <div id="bookPopUpPopup" class="popup-overlay" style="display: none">
      <div class="book-pop-up">
        <div class="frame10"></div>
        <img class="bookcover-icon" alt="" src="./public/bookcover@2x.png" />

        <div class="book-title4">
          <div class="booktitle">Animal Farm</div>
          <i class="author">by George Orwell</i>
        </div>
        <div class="line"></div>
        <div class="parent">
          <div class="div1">1945</div>
          <div class="publication-date">Publication Date</div>
        </div>
        <div class="publisher">
          <div class="secker-and-warburg">Secker and Warburg</div>
          <div class="publisher1">Publisher</div>
        </div>
        <div class="genre">
          <div class="fable">Fable</div>
          <div class="genre1">Genre</div>
        </div>
        <div class="book-id7">
          <div class="book-id-child"></div>
          <div class="div2">00001</div>
        </div>
        <div class="book-id8">
          <div class="book-id-child"></div>
          <div class="copies">2 copies</div>
        </div>
        <div class="book-id9">
          <div class="book-id-inner"></div>
          <div class="tag">tag</div>
        </div>
      </div>
    </div>
  </div>

  <div id="loginPopUpPopupContent" class="popup-overlay" style="display: none"></div>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    var logInButton = document.getElementById("logInButton");
    var loginPopUpPopup = document.getElementById("loginPopUpPopup");

    if (logInButton && loginPopUpPopup) {
        logInButton.addEventListener("click", function () {
            // Fetch login-pop-up.php content
            fetch('login-pop-up.php')
                .then(response => response.text())
                .then(data => {
                    // Set the content to the loginPopUpPopup div
                    loginPopUpPopup.innerHTML = data;
                    loginPopUpPopup.style.display = "flex";
                    loginPopUpPopup.style.zIndex = 100;
                    loginPopUpPopup.style.backgroundColor = "rgba(61, 61, 61, 0.55)";
                    loginPopUpPopup.style.alignItems = "center";
                    loginPopUpPopup.style.justifyContent = "center";

                    // Get the login form element
                    var loginForm = loginPopUpPopup.querySelector('form');

                    // Add the event listener to the login form
                    if (loginForm) {
                        loginForm.addEventListener("submit", function (e) {
                            e.preventDefault(); // Prevent default form submission

                            // Get form data
                            const formData = new FormData(loginForm);

                            // Prepare AJAX request
                            fetch('login-pop-up.php', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log('Login response:', data); // Debugging statement

                                // Handle login response
                                if (data.success) {
                                    console.log('Redirecting to admin.php...'); // Debugging statement
                                    window.location.href = "admin.php"; // Redirect to admin page
                                } else {
                                    alert(data.message); // Display error message
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                        });
                    }
                })
                .catch(error => {
                    console.error('Error fetching login-pop-up.php:', error);
                });
        });
    }
});
</script>

</body>
</html>