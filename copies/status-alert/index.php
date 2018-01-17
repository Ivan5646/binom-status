<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cменить статус</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="wrapper">
    <form class="status">
    <textarea  type="text" name="cnv_id" id="cnv_id" class="status_click" placeholder="click id" rows="4" cols="70"></textarea>
    <input type="text" name="cnv_status" id="cnv_status" class="status_new" placeholder="status">
    <button class="status_change btn" type="submit">Сменить статус</button>
</form>

<div class="status_instruction">
    В поле click id введите один или несколько click id через пробел.
    В поле status введите новый статус.
</div>

</div>


<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="">

    $(".status_change").click(function(){
        var cnv_status = $("#cnv_status").val();
        idList = $("#cnv_id").val();
        idList = idList.split(" "); // becomes an array

        // create urls with input idclicks and statuses
        urls = [];
        for (var i = idList.length - 1; i >= 0; i--) {
            urls.push("http://e.losmetas.com/click.php?cnv_id=" + idList[i] + "&cnv_status=" + cnv_status)
        }
    });

    $(".status").submit(function(e) {
        e.preventDefault();
        $.when(
            $.each(urls, function(index, value){
                $.ajax({
                    type: "post",
                    url: value,
                    data: {
                        "api_key": "1600000146dc1cf20a7ec7f225629d9125430b40",
                        "action" : "offer_edit",
                    }
                });
            })
        ).then(function(){
            alert("статус изменен");
        });
    });

</script>
</body>
</html>