<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo $page_title;?> | <?php echo SYSTEM_TITLE;?></title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="<?php echo SYSTEM_TITLE; ?>" name="description" />
	<meta content="<?php echo AUTHOR;?>" name="author" />
	
	<?php include 'front/common/top.php'; ?>
</head>
<body>
    <!-- BEGIN #page-container -->
    <div id="page-container" class="fade">
        
		<?php include 'front/common/header.php'; ?>
    
        <?php include 'front/'.$page_name.'.php'; ?>
		
		<?php include 'front/common/footer.php'; ?>
        
    </div>
    <!-- END #page-container -->
    
	<?php include 'front/common/bottom.php'; ?>
	
	<script>
	    $(document).ready(function() {
	        App.init();
	    });
	</script>
</body>
</html>
