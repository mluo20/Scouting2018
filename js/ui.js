function nextPage(page) {
	// Declare all variables
    var i, pagecontent, nextButtons;

	var progressbar = document.getElementById("progressbar").children;

    for (i = 0; i < progressbar.length; i++) {
    	progressbar[i].classList.remove("active")
    }

    progressbar[0].classList.add("active");

    // Get all elements with class="tabcontent" and hide them
    pagecontent = document.getElementsByClassName("page");
    for (i = 0; i < pagecontent.length; i++) {
        pagecontent[i].style.display = "none";
    }

    for (i = 0; i < pagecontent.length; i++) {
    	if (i == 0) {continue;}
    	progressbar[i].className += "active";
    	if (pagecontent[i].id == page) {break;};
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