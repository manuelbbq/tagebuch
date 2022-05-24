
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tagebuch</title>
</head>
<body>

<?php
$start = $_REQUEST['start'] ?? 0;
$showitems = 3;
foreach (get_file_array(get_files(),$start, $showitems) as $eintrag) {
    ?>
    <div><span hidden=true><?php echo $eintrag[0] ?></span> <span>Erstellt am: <?php echo $eintrag[1] ?></span> <span> Geändert am: <?php echo $eintrag[2]; ?></span>
        <div><?php echo $eintrag[3] ?></div>
        <input type="button" value="ändern" onclick="change(this)">
    </div>
<?php } ?>
<button onclick="neuer_eintrag()">Neuer Eintrag
</button>

 <?php if (count(get_files())>$showitems){

        ?>
        <div>
        <button onclick="select_page(<?php echo $start ?>)" ><</button>
        <?php

        for($i = 1; $i <=intdiv(count(get_files()),$showitems); $i++) {


                ?>
                <span onclick="select_page(<?php echo $i ?>)" <?php if($start+1== $i){echo 'style="background-color: lightblue"';} ?>><?php echo  $i ?></span>
                <?php
            if ($i == intdiv(count(get_files()),$showitems) and count(get_files()) % $showitems != 0){
                ?>
                <span onclick="select_page(<?php echo $i+1 ?>)" <?php if($start+1== $i+1){echo 'style="background-color: lightblue"';} ?>><?php echo  $i+1 ?></span>
                <?php
            }

        }
 ?><button onclick="select_page(<?php echo ($start+2) ?>)" >></button></div>
<?php } ?>











<script>
    function change(ele) {
        let div = ele.parentElement.firstElementChild.innerHTML;
        console.log(div);
        window.open('index.php?action=change_delete&id=' + div, "_parent");
    }

    function build_get(html_col) {
        let zeit = html_col[0].firstChild.innerHTML
        let aend = html_col[0].lastChild.innerHTML
        let text = html_col[1].innerHTML
        let str = "erstellt=" + zeit + "&" + 'geaendert=' + aend + "&" + "text=" + text
        console.log(str)
        return str
    }

    function neuer_eintrag() {
        window.open('index.php?action=new_entry', "_parent")
    }
    function select_page(page){
        if (page-1 < 0 || page >
        <?php
            if (count(get_files()) % $showitems ==0){
            echo (count(get_files()) / $showitems);
            }
            else {echo ((count(get_files()) / $showitems)+1);
            }?>


        ){
            return
        }
        window.open('index.php?action=liste&start='+(page-1), "_parent")

    }


</script>
</body>
</html>


