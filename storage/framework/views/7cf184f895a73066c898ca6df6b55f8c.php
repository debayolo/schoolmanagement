<html>
	<head>
		<title><?php echo app('translator')->get('admin.view_certificate'); ?></title>
		<style>
			.certificate_box_wrapper {
				background-image: url(./img/bg.jpg);
				width: <?php echo $certificate->background_width?? 164?>mm;
				min-height: <?php echo $certificate->background_height?? 145?>mm;
				/* display: flex; */
				justify-content: center;
				margin: auto;
				background-repeat: no-repeat;
				background-size: cover;
				background-position: center center;
				padding-top: <?php echo $certificate->padding_top?? 5?>mm;
				padding-left: <?php echo $certificate->pading_left?? 5?>mm;
				padding-right: <?php echo $certificate->padding_right?? 5?>mm;
				padding-bottom: <?php echo $certificate->padding_bottom?? 5?>mm;
			}
    	</style>
	</head>
	<body class="certificate_box_wrapper" style="background-image: url('<?php echo e(isset($certificate)? asset($certificate->background_image): ''); ?>');">
		<?php echo $certificate->body; ?>

	</body>
</html>
<?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\admin\certificate\view_certificate.blade.php ENDPATH**/ ?>