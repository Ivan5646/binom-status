<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cменить статус</title>
</head>


<body>

<form class="status">
    <input type="text" name="clickid" id="cnv_id">
    <input type="text" name="status" id="cnv_status">
    <button type="submit">Сменить статус</button>
</form>


<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>

<script type="">
    $(".status").submit(function() {
        $.ajax({
            type:"post",
            url:"http://e.losmetas.com/index.php",
            data: {
                "api_key": "1600000146dc1cf20a7ec7f225629d9125430b40",
//                "action" : "offer_edit",
                "cnv_id": $("#cnv_id").val(),
                "cnv_status": $("#cnv_status").val()
            }
        });
    });


</script>
</body>
</html>