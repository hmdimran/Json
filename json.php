<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalog</title>

    <style type="text/css">
        .catalog_image img{
            max-width:50px;
            max-height: 80px;
        }
    </style>
</head>
<body>


<?php
$connect = mysqli_connect("localhost", "root", "", "rozalia");
$sql = "SELECT * FROM sma_products";
$result = mysqli_query($connect, $sql);
$json_array = array();
while($row = mysqli_fetch_assoc($result))
{
    $json_array[] = $row;
}
json_encode($json_array);
$arrs = count($json_array);



for($i = 0 ; $i< $arrs; $i++){ ?>

    <table style="width:100%;" border="1">
        <tr>
            <td width="20%"><?= $i ; ?></td>
            <td width="20%"><?php $nm = json_encode($json_array[$i]['name']); echo json_decode($nm); ?></td>
            <td width="20%">
                <?php
                    $mmm = json_encode($json_array[$i]['category_id']);
                    $final =  json_decode($mmm);

                    $cat = "SELECT `name` FROM sma_categories WHERE `id`  = $final";
                    $query = mysqli_query($connect,$cat);
                    $row = mysqli_fetch_array($query);
                    echo $row['name'];

                ?>
            </td>
            <td width="20%"><?php $nm = json_encode($json_array[$i]['code']); echo json_decode($nm); ?></td>
            <td width="20%"><?php $mm = json_encode($json_array[$i]['price']); echo json_decode($mm); ?></td>
            <td width="20%" class="catalog_image">
                <img src="<?= base_url();?>/assets/uploads/thumbs/<?php $nm = json_encode($json_array[$i]['image']); echo json_decode($nm); ?>" alt="">


            </td>
        </tr>
    </table>
<?php }


?>
</body>
</html>
