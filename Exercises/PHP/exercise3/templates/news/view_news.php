<section id="news">
	<article>
		<header>
			<h1><a href="news_item.php?id=<?= $article['id']?>"><?= $article['title']?></a></h1>
		</header>

		<img src="http://picsum.photos/600/300/" alt="">
		
		<p><?= $article['introduction']?></p>
		<p><?= $article['fulltext']?></p>
			<p>
				<a href="edit_news.php?id=<?= $article['id']?>" style="color: black">Edit</a> 
				<a href="delete_news.php?id=<?= $article['id']?>" style="color: black">Delete</a>
			</p>

		<section id="comments">
			<?php include(__DIR__ . '/../comments/list_comments.php')?>

			<form>
				<h2>Add your voice...</h2>
				
				<label>Username 
					<input type="text" name="username">
				</label>
				
				<label>E-mail
					<input type="email" name="email">
				</label>

				<label>Comment
					<textarea name="comment"></textarea>            
				</label>
				
				<input type="submit" value="Reply">
			</form>
		</section>

		<footer>
			<span class="author"><?= $article['author'] ?></span>

			<span class="tags">
				<?php foreach($tags as $tag) {?>
					<a href="list_news.php"><?= $tag?></a>
				<?php }?>
			</span>

			<span class="date"><?= date("F d, Y", $article['published'])?></span>
			
			<a class="comments" href="news_item.php?id=<?= $article['id']?>"><?= count($comments)?></a>
		</footer>

	</article>
</section>