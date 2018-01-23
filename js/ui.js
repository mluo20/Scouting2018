
/***THIS IS FOR THE UI NEXT PAGES AND NAVIGATION AND THE STOPWATCH
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

var claimedswitchtimes = [];
var failedswitchtimes = [];
var claimedscaletimes = [];
var failedscaletimes = [];

function removeZeros() {
    for (var i = 0; i < claimedswitchtimes.length; i++) {
        if (parseFloat(claimedswitchtimes[i]) == 0) {
            claimedswitchtimes.splice(i, 1);
        }
    }
	for (var i = 0; i < claimedscaletimes.length; i++) {
        if (parseFloat(claimedscaletimes[i]) == 0) {
            claimedscaletimes.splice(i, 1);
        }
    }
    for (var i = 0; i < failedscaletimes.length; i++) {
        if (parseFloat(failedscaletimes[i]) == 0) {
            failedscaletimes.splice(i, 1);
        }
    }
    for (var i = 0; i < failedswitchtimes.length; i++) {
        if (parseFloat(failedswitchtimes[i]) == 0) {
            failedswitchtimes.splice(i, 1);
        }
    }
}

$(function() {

	var failedswitch = false;

    $('#stopwatch').runner("init").on('runnerStart', function(eventObject, info) {
        $("#startbutton").text("Success");
    }).on('runnerStop', function(eventObject, info) {

    	if (failedswitch) {
    		failedswitchtimes.push($("#stopwatch").text());
    		failedswitch = false;
    	}
    	else {
        	claimedswitchtimes.push($("#stopwatch").text());
    	}

        var tempClaimedArray1 = [];
        for (var i = 0; i < claimedswitchtimes.length; i++){
            tempClaimedArray1[i] = "<span onclick='deleteTime("+i+")' id='cSwitchTime"+i+"'>" + (i + 1) + ": " + claimedswitchtimes[i] + "</span>" + "<br>";
        }

        var tempFailedArray1 = [];
        for (var i = 0; i < failedswitchtimes.length; i++){
            tempFailedArray1[i] = (i + 1) + ": " + failedswitchtimes[i] + "<br>";
        }

        removeZeros();
        $('#claimedtimes').html(tempClaimedArray1);
        $('#failedtimes').html(tempFailedArray1);
        $(this).runner("reset");
        $("#startbutton").text("Start");

    });

    $('#startbutton').click(function() {
        $('#stopwatch').runner('toggle');
    });

    $('#failbutton').click(function() {
    	failedswitch = true;
    	$('#stopwatch').runner('stop');
    });

    $('#resetbutton').click(function() {
        $('#stopwatch').runner('reset');
        $("#stopwatch").runner("stop");
    });

    var failedscale = false;

    $('#stopwatch2').runner("init").on('runnerStart', function(eventObject, info) {
        $("#startbutton2").text("Success");
    }).on('runnerStop', function(eventObject, info) {
    	if (failedscale) {
    		failedscaletimes.push($("#stopwatch2").text());
    		failedscale = false;
    	}
    	else {
        	claimedscaletimes.push($("#stopwatch2").text());
    	}
        removeZeros();
        $('#claimedtimes2').text(claimedscaletimes);
        $('#failedtimes2').text(failedscaletimes);
        $(this).runner("reset");
        $("#startbutton2").text("Start");
    });

    $('#startbutton2').click(function() {
        $('#stopwatch2').runner('toggle');
    });

    $('#failbutton2').click(function() {
    	failedscale = true;
    	$('#stopwatch2').runner('stop');
    });

    $('#resetbutton2').click(function() {
        $('#stopwatch2').runner('reset');
        $("#stopwatch2").runner("stop");
    });
});

function deleteTime(i){
	$("#cSwitchTime"+i).click(function() {
		$(this).remove();
	});
}

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
	else if (option == scoutingvalues["climb2"]) {
		document.getElementById("numofbuddies").style.display = "block";
	}
	else if (option == scoutingvalues["climb1"] || option == scoutingvalues["climb3"]) {
		document.getElementById("numofbuddies").style.display = "none";
		scoutingvalues["numofbuddies"].value = null;
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
        teleopspans.eq(1).text(scoutingvalues["groundcubes"].value);
        teleopspans.eq(2).text(scoutingvalues["exchangecubes"].value);
        teleopspans.eq(3).text(scoutingvalues["intoexchangecubes"].value);
        teleopspans.eq(4).text(claimedswitchtimes);
        teleopspans.eq(5).text(failedswitchtimes);
        teleopspans.eq(6).text(claimedscaletimes);
        teleopspans.eq(7).text(failedscaletimes);

        var postmatchspans = $("#postmatchvals").find("span");
        var climbvalues = scoutingvalues["climbing"].value;
        if (scoutingvalues["numofbuddies"].value > 0) {
        	climbvalues += ", " + scoutingvalues["numofbuddies"].value + " buddie(s)";
        }

        postmatchspans.eq(0).text(climbvalues);
        postmatchspans.eq(1).text(scoutingvalues["bluescore"].value);
        postmatchspans.eq(2).text(scoutingvalues["redscore"].value);

    });

    autosize($('textarea'));

});

/**ARE YOU SURE**/
$(function() {
    $('form.dirty-check').areYouSure();
});
