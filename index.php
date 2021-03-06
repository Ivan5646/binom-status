<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cменить статус</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
    <div class="progress hideLoader">
        <p>Статусов изменено:</p>
        <span class="progress_current"></span>
        <span>из</span>
        <span class="progress_total"></span>
    </div>
</div>

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
        <input type="text" name="cnv_status" id="cnv_status" class="status_new" placeholder="status">
        <input type="text" name="event1" id="event1" class="status_event1" placeholder="event1">
        <button class="status_change btn" type="submit">Сменить статус</button>
    </form>

    <div class="status_instruction">
        В поле click id введите один или несколько click id через пробел.
        В поле status введите новый статус.
    </div>

</div>

<script src="//code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="">

    // $(".status_change").click(function(){

    // });

    var failed = false;
    var idQuantity = 0;
    //    var idTotal = idList.length;


    $(".status").submit(function(){
        var country = $(".status_country").val();
        var cnv_status = $("#cnv_status").val();
        var event1 = "&event1=" + $("#event1").val();

        idList = $("#cnv_id").val();
        idList = idList.trim(); // remove surrounding spaces
        idList = idList.split(" "); // becomes an array

        // create urls with input idclicks and statuses
        urls = [];
        if  ( $("#event1").val() == "" ) {
            for (var i = idList.length - 1; i >= 0; i--) {
                urls.push("http://" + country + ".losmetas.com/click.php?cnv_id=" + idList[i] + "&cnv_status=" + cnv_status)
                console.log("event1 has no value: " + urls);
            }
        }else if ( $("#cnv_status").val() == "") {
            for (var i = idList.length - 1; i >= 0; i--) {
                urls.push("http://" + country + ".losmetas.com/click.php?cnv_id=" + idList[i] + event1)
                console.log("event1 has value: " + urls);
            }
        }
        else if ( $("#event1").val() != "" && $("#cnv_status").val() != "") {
            for (var i = idList.length - 1; i >= 0; i--) {
                urls.push("http://" + country + ".losmetas.com/click.php?cnv_id=" + idList[i] + "&cnv_status=" + cnv_status + event1)
                console.log("event and staus: " + urls);
            }
        }else if ( $("#event1").val() == "" && $("#cnv_status").val() == "" ) {
            alert("Заполните одно из следующих полей: status, event1");
            return
        }

        $(".progress_total").html(idList.length);
        $(".progress").toggleClass("hideLoader");
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
                        $(".wrapper").toggleClass("opacity");
                    },
                    complete: function(){
//                        setTimeout(function(){
                        $(".loader").toggleClass("hideLoader");
                        $(".wrapper").toggleClass("opacity");
                        idQuantity++;
                        $(".progress_current").html(idQuantity);
//                        }, 2000);
                    },
                    data: {
                        "api_key": "1600000146dc1cf20a7ec7f225629d9125430b40",
                        "action" : "offer_edit",
                    }
                }).done(function(data) {
                    //alert("done " + data.status);
                }).fail(function(data){
                    var myJSON = JSON.stringify(data);
                    //alert("myJSON: " + myJSON);
                    if (data.status != 200) {
                        alert("fail " + data.status);
                        failed = true;
                    }
                });
            })
        ).then(function(){
            $("#cnv_id").val("");
            $("#cnv_status").val("");
            $(".status").trigger("reset");
            idQuantity = 0;
            //$(".progress_current").innerHTML = idQuantity;
//            if (failed == false) {
//                alert("статус(ы) изменен(ы)");
//            }
        });
        return false;
    });

</script>
</body>
</html>