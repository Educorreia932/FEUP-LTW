<section id="news">
    <?php
		foreach($articles as $article) {
    ?>

	<article>
		<header>
			<!-- TODO: Change to article link -->
			<h1><a href="list_news.php"><?= $article['title'] ?></a></h1> 
		</header>
		<!-- Illustration -->
		<img src="https://picsum.photos/600/300" alt="Article Illustration">

		<!-- Introduction -->
		<p><?= $article['introduction'] ?></p>

		<!-- Fulltext -->
		<?php
			$paragraphs = explode("\n", $article['fulltext']);

			foreach($paragraphs as $paragraph) 
				echo '<p>' . $paragraph . '</p>' . PHP_EOL;
		?>

		<footer>
			<span class="author"><?= $article['author'] ?></span> 

			<span class="tags">
				<?php
					$tags = explode(',', $article['tags']);

					foreach($tags as $tag) {
				?>

				<a href="list_news.php"><?= "#" . $tag ?></a>

				<?php } ?>
			</span>

			<span class="date">
				<?= date("F d, Y", $article['published']) ?>
			</span>

			<a class="comments" href="news_item.php"><?= $article['comments'] ?></a>
		</footer>

	</article>

	<?php } ?>
</section>