
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

function menu() {
    var x = document.getElementById("mainmenu");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

/**STOPWATCH**/

var claimedtimes = [];

$(function() {

    $('#stopwatch').runner("init").on('runnerStart', function(eventObject, info) {
        $("#startbutton").text("Stop");
    }).on('runnerStop', function(eventObject, info) {
        claimedtimes.push($("#stopwatch").text());
        $('#claimedtimes').text(claimedtimes);
        $("#stopwatch").runner("reset");
        $("#startbutton").text("Start");
    });

    $('#startbutton').click(function() {

        $('#stopwatch').runner('toggle');

        // if ($(this).text() == "Stop") {


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


});

/**FORM HANDLING**/

var scoutingvalues = document.forms["scoutingform"];

function toggleForm(option) {
	if (option == scoutingvalues["switch1"]) {
		document.getElementById("correctside1").style.display = "block";
        document.getElementById("c1").style.display = "block";
	}
	else if (option == scoutingvalues["switch2"]) {
		document.getElementById("correctside1").style.display = "none";
        document.getElementById("c1").style.display = "none";
	}
	else if (option == scoutingvalues["scale1"]) {
		document.getElementById("correctside2").style.display = "block";
        document.getElementById("c2").style.display = "block";
	}
	else if (option == scoutingvalues["scale2"]) {
		document.getElementById("correctside2").style.display = "none";
        document.getElementById("c2").style.display = "none";
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

    var lis = $("li");
    $("#prematchvals").find(lis).append("<span></span>");
    $("#autonvals").find(lis).append("<span></span>");
    $("#teleopvals").find(lis).append("<span></span>");
    $("#postmatchvals").find(lis).append("<span></span>");

    $('#scoutingform').on('keyup keypress change mouseup', function(e) {

        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) { 
            e.preventDefault();
            return false;
        }

        var prematchspans = $("#prematchvals").find("span");
        prematchspans.eq(0).text(scoutingvalues["matchnum"].value);
        prematchspans.eq(1).text(scoutingvalues['teamnum'].value);
        prematchspans.eq(2).text(scoutingvalues['alliance'].value);

        var autonspans = $("#autonvals").find("span");
        var baseline = scoutingvalues["baseline"].value == 0 ? "no" : "yes";
        var switch1 = scoutingvalues["switch"].value == 0 ? "no" : "yes";
        var correctswitch = scoutingvalues["correctswitch"].value == 0 ? "no" : "yes";
        var scale = scoutingvalues["scale"].value == 0 ? "no" : "yes";
        var correctscale = scoutingvalues["correctscale"].value == 0 ? "no" : "yes";
        autonspans.eq(0).text(baseline);
        autonspans.eq(1).text(switch1);
        autonspans.eq(2).text(correctswitch);
        autonspans.eq(3).text(scale);
        autonspans.eq(4).text(correctscale);

        var teleopspans = $("#teleopvals").find("span");
        teleopspans.eq(0).text(scoutingvalues["portalcubes"].value);
        teleopspans.eq(1).text(scoutingvalues["exchangecubes"].value);
        teleopspans.eq(2).text(scoutingvalues["groundcubes"].value);
        teleopspans.eq(3).text(claimedtimes);

        var postmatchspans = $("#postmatchvals").find("span");
        var climbvalues = "";
        for (var i = 0; i < scoutingvalues["climbing[]"].length; i++) {
            if (scoutingvalues["climbing[]"][i].checked) {
                climbvalues += scoutingvalues["climbing[]"][i].value + " ";
            }
        }
        postmatchspans.eq(0).text(climbvalues);
        postmatchspans.eq(1).text(scoutingvalues["bluescore"].value);
        postmatchspans.eq(2).text(scoutingvalues["redscore"].value);

    });

    // $('.nextlink').keyup(function(e) {
    //     var keyCode = e.keyCode || e.which;
    //     if (keyCode === 39) {
    //         nextPage("auton");
    //     }
    //     console.log("hello");
    // });

});

/**ARE YOU SURE**/
$(function() {
    $('form.dirty-check').areYouSure();
});
