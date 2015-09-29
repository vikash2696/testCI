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
<?php if(isset($news)) {?>
<?php foreach ($news as $news_item): ?>
<tr>
        <td><h3><?php echo $news_item['title'] ?></h3></td>
        <td><div class="main">
                <?php echo $news_item['text'] ?>
        </div></td>
        <td><p><a href="<?php echo $news_item['slug'] ?>">View article</a></p></td>

<?php endforeach ?><?php }?>
</tr></tbody></table>
</div>
<div class= "space_devide">
<h1>User Data</h1>
<table cellpadding="1" cellspacing="1" border="1" align = "center">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Title</th>
						<th>Category</th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($news as $news_item): ?>
<tr>
        <td><h3><?php echo $news_item['title'] ?></h3></td>
        <td><div class="main">
                <?php echo $news_item['text'] ?>
        </div></td>
        <td><p><a href="<?php echo $news_item['slug'] ?>">View article</a></p></td>

<?php endforeach ?>
</tr></tbody></table>
</div>
<div id="footer"> </div>
</html>