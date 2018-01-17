<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cменить статус</title>
</head>
<body>

<form class="status">
    <input type="text" name="cnv_id" id="cnv_id" placeholder="click id">
    <input type="text" name="cnv_status" id="cnv_status" placeholder="status">
    <button class="changeStatus" type="submit">Сменить статус</button>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="">

    var requestUrl = "";
    $(".changeStatus").click(function(){
        var cnv_id = $("#cnv_id").val();
        var cnv_status = $("#cnv_status").val();
        requestUrl = "http://e.losmetas.com/click.php?cnv_id=" + cnv_id + "&cnv_status=" + cnv_status;
    });

    $(".status").submit(function() {
        $.ajax({
            type: "post",
            url: requestUrl,
            data: {
                "api_key": "1600000146dc1cf20a7ec7f225629d9125430b40",
                "action" : "offer_edit",
            }
        });
    });

</script>
</body>
</html>