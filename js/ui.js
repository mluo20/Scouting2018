function nextPage(page) {
	// Declare all variables
    var i, pagecontent, nextButtons;

    // Get all elements with class="tabcontent" and hide them
    pagecontent = document.getElementsByClassName("page");
    for (i = 0; i < pagecontent.length; i++) {
        pagecontent[i].style.display = "none";
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(page).style.display = "block";
}

function addReview() {
	reviewbuttons = document.getElementsByClassName("review");
    for (i = 0; i < reviewbuttons.length; i++) {
        reviewbuttons[i].style.display = "block";
    }
}