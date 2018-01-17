<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cменить статус</title>
</head>	


<body>

	<form action="status.php" method="post">
		<input type="text" name="clickId">
		<input type="text" name="status">
		<button type="submit">Сменить статус</button>
	</form>
	

<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>

<script type="">
	
	$.ajax({
		type:"post",
		url:"http://e.losmetas.com/click.php?cnv_id=25621b4a99la0c&cnv_status=mystatus",
		data: {
			"api_key" : "12345678qwertyu",
			"action" : "offer_edit",
			"id" : "10",
			"name" : "BornByBinomAPI"
		}
	});
</script>
</body>
</html>	