
/***THIS IS FOR THE UI NEXT PAGES AND NAVIGATION
    change to jquery later possibly?
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

var claimedtimes = [];

$(function() {

    $('#stopwatch').runner("init").on('runnerStart', function(eventObject, info) {
        $("#startbutton").text("Stop");
    }).on('runnerStop', function(eventObject, info) {
        $("#startbutton").text("Start")
    });

    $('#startbutton').click(function() {

        $('#stopwatch').runner('toggle');

        // if ($(this).text() == "Start") {
        //     $('#stopwatch').runner('start');
        //     $(this).text("Stop");
        // }
        // else {
        //     alert("Current lap time: " + $('#runner').runner('lap'));
            // $("#runner").runner("reset", true);
            // $('#stopwatch').runner('stop');
        //     $(this).text("Start");
        // }
    });

    $('#lap').click(function() {
        console.log($('#runner').runner('lap'));
    });

    $('#resetbutton').click(function() {
        $('#stopwatch').runner('reset', true);
    });

    $('#claimedtimes').text(claimedtimes);

});

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

function decrement(element) {
    var currentVal = parseInt(document.getElementById(element).value);
    if (!isNaN(currentVal) && currentVal > 0) {
        document.getElementById(element).value = currentVal - 1;
    }
    else {
        document.getElementById(element).value = 0;
    }
}

function increment(element) {
    var currentVal = parseInt(document.getElementById(element).value);
    if (!isNaN(currentVal)) {
        document.getElementById(element).value = currentVal + 1;
    }
    else {
        document.getElementById(element).value = 0;
    }
}

$(function() {

    $('#scoutingform').on('keyup keypress', function(e) {

        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) { 
            e.preventDefault();
            return false;
        }

        $("#prematchvals").find("span:first-child").text(scoutingvalues["matchnum"].value);
        // $("#prematchvals").find("li")[1].append(scoutingvalues['teamnum'].value);
        // $("#prematchvals").find("li")[2].append(scoutingvalues['alliance'].value);

    });

});

/**ARE YOU SURE**/
$(function() {
    $('form.dirty-check').areYouSure();
});
