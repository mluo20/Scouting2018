
/***THIS IS FOR THE UI NEXT PAGES AND NAVIGATION
    change to jquery later
***/

function nextPage(page) {

	// Declare all variables
    var i, pagecontent, nextButtons;
 
    // Get all elements with class="tabcontent" and hide them
    pagecontent = document.getElementsByClassName("page");

    var pageindex = 0;
    for (i = 0; i < pagecontent.length; i++) {
        pagecontent[i].style.display = "none";
        if (pagecontent[i].id == page) {
    		pageindex = i;
    	}
    }

    //adds active tags according what page the thing is on
    var progressbar = document.getElementById("progressbar").children;

    for (i = 0; i < progressbar.length; i++) {
    	progressbar[i].classList.remove("active")
    }

    progressbar[0].classList.add("active");


    for (i = 1; i <= pageindex; i++) {
    	progressbar[i].classList.add("active");
    }

    //shows current page
    pagecontent[pageindex].style.display = "block"; 

}

function addReview() {
	reviewbuttons = document.getElementsByClassName("review");
    for (i = 0; i < reviewbuttons.length; i++) {
        reviewbuttons[i].style.display = "block";
    }
}

/**STOPWATCH**/


var Example1 = new (function() {

    // Stopwatch element on the page
    var $stopwatch;
    
    // Timer speed in milliseconds
    var incrementTime = 100;

    // Current timer position in milliseconds
    var currentTime = 0;
    
    // Start the timer
    $(function() {
        $stopwatch = $('#stopwatch');
        Example1.Timer = $.timer(updateTimer, incrementTime, false);  
    });

    // Output time and increment
    function updateTimer() {
        var timeString = formatTime(currentTime);
        $stopwatch.html(timeString);
        currentTime += incrementTime;
    }

    // Reset timer
    this.resetStopwatch = function() {
        currentTime = 0;
        Example1.Timer.stop().once();
    };

});

function pad(number, length) {
    var str = '' + number;
    while (str.length < length) {str = '0' + str;}
    return str;
}
function formatTime(time) {
    time = time / 10;
    var min = parseInt(time / 6000),
        sec = parseInt(time / 100) - (min * 60),
        hundredths = pad(time - (sec * 100) - (min * 6000), 2);
    return (min > 0 ? pad(min, 2) : "00") + ":" + pad(sec, 2) + ":" + hundredths;
}

/**FORM HANDLING**/

var scoutingvalues = document.forms["scoutingform"];

function toggleForm(option) {
	if (option == scoutingvalues["switch1"]) {
		document.getElementById("correctside1").style.display = "block";
	}
	else if (option == scoutingvalues["switch2"]) {
		document.getElementById("correctside1").style.display = "none";
	}
	else if (option == scoutingvalues["scale1"]) {
		document.getElementById("correctside2").style.display = "block";
	}
	else if (option == scoutingvalues["scale2"]) {
		document.getElementById("correctside2").style.display = "none";
	}
}

/**ARE YOU SURE**/
$(function() {

    // Enable on selected forms
    $('form.dirty-check').areYouSure();

});


