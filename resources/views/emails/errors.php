<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Welcome!</title>
	</head>
	<body>
		<div style="background-color: #0a0a0a; color: #fff; margin: 0 auto; padding: 15px; width: 600px;">
			<h3><?php echo getenv('APP_NAME'); ?> Project</h3>
			<p><?php echo $data; ?></p>
		</div>
	</body>
</html>
