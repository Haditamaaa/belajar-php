<?php 
// pengulangan pada array
// for atau foreach (khuus array)

$angka = [3, 2, 15, 20, 11, 77, 89, 8];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengulangan Array</title>
    <style>
        .kotak {
            width: 50px;
            height: 50;
            background-color: #bada55;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
            transition: 0.5s;
        }
        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }
        .clear {clear: both;}
    </style>
</head>
<body>
    <?php for($i = 0; $i < count($angka); $i++) { ?>
        <div class="kotak">
            <?php echo $angka[$i];?>
        </div>
<?php } ?>  


<div class="clear"></div>


<?php foreach( $angka as $a ) { ?>
    <div class="kotak">
        <?php echo $a;?>
    </div>
<?php } ?>

<div class="clear"></div>

<?php foreach($angka as $a) : ?>
    <div class="kotak">
        <?= $a; ?>
    </div>
<?php endforeach?>
</body>
</html>