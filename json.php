<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Catalog</title>
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



   for($i = 0 ; $i<= 50; $i++){ ?> 
   		<table style="width:100%;" border="1">
    		<tr>
    			<td width="50%">Code : <?= $i ; ?></td>
    			<td width="50%"><?php $nm = json_encode($json_array[$i]['code']); echo json_decode($nm); ?></td>
    			<td width="50%">

    				<img src="<?= base_url();?>/assets/uploads/<?php $nm = json_encode($json_array[$i]['image']); echo json_decode($nm); ?>" alt="">
    				
    					
    			</td>
    		</tr>
    	</table>
   <?php }
    

?>  
</body>
</html>
