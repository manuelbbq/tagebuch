
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Variablenempfangen</title>
</head>
<body>


<span hidden=true ><?php echo $_REQUEST['id'] ?></span>
<textarea rows="5" cols="50" > <?php echo get_data_by_id($_REQUEST['id'])[3] ?> </textarea>
<button onclick="delete_eintrag()">löschen</button>
<button onclick="save_eintrag()">speichern</button>


<script>
    function delete_eintrag(){
        let id = document.getElementsByTagName('span')[0].innerHTML;
        window.open('index.php?reaction=delete&id='+ id,"_parent")
    }
    function save_eintrag(){
        let str = document.getElementsByTagName("textarea")[0].value;
        let id = document.getElementsByTagName('span')[0].innerHTML;
        window.open('index.php?reaction=change&changetxt='+str+'&id='+id,"_parent")
    }


</script>
</body>
</html>
