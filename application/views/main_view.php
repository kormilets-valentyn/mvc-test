<!doctype html>
<html lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>
<body>
<form  id="form" method="POST">
    <p>
        <label for="full_name">ФИО:
            <input id="full_name" name="full_name" type="text" size="30">
        </label>
    </p>
    <p>
        <label for="email">E-mail:
            <input id="email" name="email" type="text" size="29">
        </label>
    </p>
    <div id="container">
    <p>
        <select id = "main_select" class="chosen-select">
                    <option selected>Select an option</option>
                    <?php
                    foreach ($data as $item):?>
                        <option value="<?= $item['ter_id']?>"><?=$item['ter_address']?></option>
                    <?php endforeach;?>
        </select>
    </p>
    </div>
    <div id="container2"></div>
    <br/>
    <div id="container3" ></div>
</form>
<p><button id="send">Send</button></p>
<div id="container4" style="color: green"></div>
</body>
</html>

<script type="text/javascript">
    $(function() {
        $(".chosen-select").chosen();
    })
</script>
<script src = "application/views/js/custom.js"></script>