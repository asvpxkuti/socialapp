<?php require_once('header.php');?>
<?php include("headder.php"); ?>

	<div class="container text-center">
		<?php 

			 $result = queryMysql("SELECT url FROM myimages");
        		$num    = $result->num_rows;
       
	          if($result->num_rows > 0){

	            while($row = $result->fetch_assoc()){

	          
				echo "<img width=200 height=200 class = img-responsive src='". $row['url'] ."' >";
		 
		 	 } ?>
		 	
		 <?php } 
		 else
		 	echo "empty image table";
		  ?>
	</div>


<?php include("footer.php"); ?>