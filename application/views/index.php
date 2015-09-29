</head>
<div class = "space_devide">
<?php echo $css; ?>
<h1>News Data</h1>
<table cellpadding="1" cellspacing="1" border="1" align = "center">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Title</th>
						<th>Category</th>
					</tr>
				</thead>
				<tbody>
<?php if(isset($NewsData)) {?>
<?php foreach ($NewsData as $news_item): ?>
<tr>
        <td><?php echo $news_item['title'] ?></td>
        <td><div class="main">
                <?php echo $news_item['text'] ?>
        </div></td>
        <td><?php echo $news_item['slug'] ?></td>

<?php endforeach ?><?php }?>
</tr></tbody></table>
</div>
<div class= "space_devide">
<h1>User Data</h1>
<table cellpadding="1" cellspacing="1" border="1" align = "center">
				<thead>
					<tr>
<!-- 						<th>S.No</th> -->
						<th>Name</th>
						<th>Email Id</th>
						<th>Gender</th>
						<th>phone</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($Userdata as $user_item): ?>
<tr>
        <td><?php echo $user_item['name'] ?></td>
        <td><div class="main">
                <?php echo $user_item['email'] ?>
        </div></td>
        <td><?php echo $user_item['gender'] ?></td>
         <td><?php echo $user_item['phone'] ?></td>
          <td><?php echo $user_item['address'] ?></td>
  
<?php endforeach ?>
</tr></tbody></table>
</div>
<div class= "space_devide">
<h1>Google User Data</h1>
<table cellpadding="1" cellspacing="1" border="1" align = "center">
				<thead>
					<tr>
<!-- 						<th>S.No</th> -->
						<th>Name</th>
						<th>Email Id</th>
						<th>Gender</th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($GoogleUser as $google_user): ?>
<tr>
        <td><?php echo $google_user['name'] ?></td>
        <td><div class="main">
                <?php echo $google_user['email'] ?>
        </div></td>
        <td><?php echo $google_user['gender'] ?></td>
  
<?php endforeach ?>
</tr></tbody></table>
</div>
<div id="footer"> </div>
</html>