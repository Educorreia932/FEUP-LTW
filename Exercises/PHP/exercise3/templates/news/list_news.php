<section id="news">
    <?php
        include_once('database/connection.php');
        include_once('database/news.php');
        $articles = getAllNews();
        
        foreach($articles as $article) {
            echo '<article>' . PHP_EOL;
            echo '<header><h1><a href="item.html">' . $article['title'] . '</a></h1></header>' . PHP_EOL;
            echo '<img src="https://picsum.photos/600/300" alt="">' . PHP_EOL;
            echo '<p>' . $article['introduction'] . '</p>' . PHP_EOL;

            $paragraphs = explode("\n", $article['fulltext']);

            foreach($paragraphs as $paragraph)
                echo '<p>' . $paragraph . '</p>' . PHP_EOL;

            echo '<footer>' . PHP_EOL;
            echo '<span class="author">' . $article['username'] . '</span>' . PHP_EOL;
            echo '<span class="tags">';

            $tags = explode(",", $article['tags']);

            foreach($tags as $tag)
                echo '<a href="index.html">#' . $tag. '</a>';
            
            echo '</span>' . PHP_EOL;
            echo '</footer>' . PHP_EOL;
            echo '</article>' . PHP_EOL;
        }
    ?>
</section>