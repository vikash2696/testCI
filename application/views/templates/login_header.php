<html>
<head>
<title>CodeIgniter Tutorial</title>
</head>
<body>
<?php echo $css; ?>
              <div id="header">
              <h2 class = "left_postion">Learning CodeIgniter</h2>
		<div id=login_div>
		<button onclick="location.href='<?php echo base_url();?>../index.php'">Home</button>
			<button>
				<a href="/index.php/register">Register</a>
			</button>
			<button>
				<a href="/index.php/login">Sign with google</a>
			</button>
		</div>
	</div>