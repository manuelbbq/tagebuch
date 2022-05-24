<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<textarea rows="5" cols="50"></textarea>
<button onclick="create_eintrag()">speichern</button>



<script>
    function create_eintrag(){
        let str = document.getElementsByTagName('textarea')[0].value;
        window.open('index.php?reaction=new&entryText=' + str,"_parent")
    }
</script>
</body>
</html>


<?php
