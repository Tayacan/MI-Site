<?php if($isAdmin == 1){
	?>
	<td>
        <?php
        if($row['isAdmin'] != 1) {
        ?>
        	<form action="users.php" method="post">
                	<input type="hidden" name="userId" 
                        	value="<?php echo $row['userID']; ?>"/>
                        <input type="submit" value="Gør til admin"/>
                </form>
         <? } ?>
         </td>
         <?php
 }?>
