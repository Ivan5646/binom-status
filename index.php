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
    <div class="loader hideLoader"></div>
    <form class="status">
        <div class="status_label">Выберите страну для Бинома</div>
        <select class="status_country">
            <option value="e">Европа</option>
            <option value="r">Россия</option>
            <option value="a">Азия</option>
        </select>
        <textarea  type="text" name="cnv_id" id="cnv_id" class="status_click" placeholder="click id" rows="4" cols="70" required></textarea>
        <input type="text" name="cnv_status" id="cnv_status" class="status_new" placeholder="status" required>
        <input type="text" name="event1" class="status_event1" placeholder="event1">
        <button class="status_change btn" type="submit">Сменить статус</button>
    </form>

    <div class="status_instruction">
        В поле click id введите один или несколько click id через пробел.
        В поле status введите новый статус.
    </div>

</div>

<script src="//code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="">

    $(".status_change").click(function(){
        var country = $(".status_country").val();
        var cnv_status = $("#cnv_status").val();
        idList = $("#cnv_id").val();
        idList = idList.split(" "); // becomes an array

        // create urls with input idclicks and statuses
        urls = [];
        for (var i = idList.length - 1; i >= 0; i--) {
            urls.push("http://" + country + ".losmetas.com/click.php?cnv_id=" + idList[i] + "&cnv_status=" + cnv_status)
            //console.log(urls);
        }
    });

    $(".status").submit(function(){
        $.when(
            $.each(urls, function(index, value){
                $.ajax({
                    type: "post",
                    url: value,
                    dataType: 'jsonp',
                    crossDomain: true,
                    xhrFields: {
                        withCredentials: true
                    },
                    beforeSend: function(){
                        $(".loader").toggleClass("hideLoader");
                    },
                    complete: function(){
                        $(".loader").toggleClass("hideLoader");
                    },
                    data: {
                        "api_key": "1600000146dc1cf20a7ec7f225629d9125430b40",
                        "action" : "offer_edit",
                    }
//                    error: function(xhr, status, error) {
//                        alert(xhr.responseText);
//                    },
//                    success: function(){
//                        alert("статус изменен");
//                    }
                }).done(function(data) {
                    alert("done " + data);
                }).fail(function(data){
                    var myJSON = JSON.stringify(data);
                    alert("done " + myJSON);
                });

            })
        ).then(function(){
            $("#cnv_id").val("");
            $("#cnv_status").val("");
            $(".status").trigger("reset");
//            alert("статус изменен");
        });
        return false;
    });

</script>
</body>
</html>