<?php
   require APPROOT . '/views/includes/head.php';
?>

<?php
    require APPROOT . '/views/includes/navigation.php';
?>

<div class="container">
	<div class="news-content">
		<h1 class="news-title">Latest Digital News</h1>
		<div>
			<?php
			$url = 'https://newsapi.org/v2/everything?q=bitcoin&apiKey=6f34289ddcd44d5e8d845eb2fcb9b638';
			$respone = file_get_contents($url);
			$NewsData = json_decode($respone);
			?>
		</div>

		<?php 
			foreach($NewsData->articles as $News)
			{
		?>
		<div class="card">
			<div>
				<img src="<?php echo $News->urlToImage ?>" class="news-img" alt="News image">
			</div>
			<div>
				<h3><?php echo $News->title ?></h3>
				<p><?php echo $News->description ?></p>
				<p><?php echo $News->content ?></p> 
				<h6><?php echo $News->author ?></h6>
				<h6><?php echo $News->publishedAt ?></h6>
			</div>
		</div>
		<?php
			}
		?>
	</div>
</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>