<!DOCTYPE html>
<html>
<head>
	<title>Lean Coffizz</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="shortcut icon" type="image/png" href="favicon.ico"/>
	<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header">
						<h1>Lean Coffizz</h1>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="container white">
		<div class="row">
			<div class="col">
				<div id="timer" class="text-center">
					<span id='mm'>00</span>:<span id='ss'>00</span>
				</div>
			</div>
		</div>
	</div>
	<div class="container white">
		<div class="form-group row mb-4">
			<div class="col-3 offset-3">
				<select class="form-control" id="endTime">
					<option value="" disabled selected>¿Cuántos minutos?</option>
					<option value="0.1">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="30">30</option>
				</select>
			</div>
			<div class="col-6">
				<a class="btn btn-primary px-4" href="#" id="start">Start</a>
				<!-- <a class="btn btn-secondary px-4" href="#" id="stop">Stop</a> -->
				<a class="btn btn-danger px-4" href="#" id="reset">Reset</a>
			</div>
		</div>
		<div class="row">
			<div class="col mb-4">
				<div class="form-check text-center">
					<input class="form-check-input" type="checkbox" value="" id="soundSetting" checked="checked">
					<label class="form-check-label" for="soundSetting">
						Sound
					</label>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="countdown.js"></script>

	<script type="text/javascript">

		$('#start').on('click', function() {
			startTimer(moment().add($('#endTime').val(), 'minutes'));
		});

		$('#endTime').on('change', function() {
			$('#mm').html(('0' + $('#endTime').val()).slice(-2));
		});

		$('#stop').on('click', function() {
			stopTimer();
		});

		$('#reset').on('click', function() {
			resetTimer();
			$('#mm').html(('0' + $('#endTime').val()).slice(-2));
		});

	</script>
</body>
</html>
