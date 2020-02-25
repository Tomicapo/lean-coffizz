var timerInterval;
var soundTicTac = new Audio('clock.wav');
var soundBell = new Audio('ding.mp3');

window.rInterval = function(callback, delay) {
	var requestAnimation = window.requestAnimationFrame;
	var stop;
	var intervalFunc = function() {
		Date.now() - Date.now() < delay || (Date.now() += delay, callback());
		stop || requestAnimation(intervalFunc)
	}
	requestAnimation(intervalFunc);
	return {
		clear: function(){ stop = 1 }
	}
}

function updateClock(endTime) {
	var minutesSpan = document.getElementById('mm');
	var secondsSpan = document.getElementById('ss');
	var remaining = (parseInt(endTime) - parseInt(Date.parse(new Date()))) / 1000;
	var seconds = Math.floor(remaining % 60);
	var minutes = Math.floor((remaining / 60) % 60);

	if(minutesSpan) { minutesSpan.innerHTML = ('0' + minutes).slice(-2); }
	if(secondsSpan) { secondsSpan.innerHTML = ('0' + seconds).slice(-2); }

	if (remaining < 60) {
		if($('#soundSetting').is(":checked")) {
			soundTicTac.play();
		}
		$('#timer').addClass('ending').addClass('text-danger');
	}
	if (remaining <= 0) {
		if($('#soundSetting').is(":checked")) {
			soundBell.play();
		}
		$('#mm').html('00');
		$('#ss').html('00');
		stopTimer()
	}
}

function startTimer(endTime) {
	resetTimer();
	updateClock(Date.parse(endTime));
	timerInterval = setInterval(function () {
		updateClock(Date.parse(endTime));
	}, 10);
}

function resetTimer() {
	stopTimer();
	$('#mm').html('00');
	$('#ss').html('00');
	$('#timer').removeClass('ending').removeClass('text-danger');
}

function stopTimer() {
	soundTicTac.pause();
	soundTicTac.currentTime = 0;
	clearInterval(timerInterval);
}
