

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Super Legit News</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../CSS/1 - Online Newspaper Design/style.css" rel="stylesheet">
        <link href="../../CSS/1 - Online Newspaper Design/layout.css" rel="stylesheet">
        <link href="../../CSS/1 - Online Newspaper Design/responsive.css" rel="stylesheet">
        <link href="../../CSS/1 - Online Newspaper Design/comments.css" rel="stylesheet">
        <link href="../../CSS/1 - Online Newspaper Design/forms.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <h1><a href="index.html">Super Legit News</a></h1>
            <h2><a href="index.html">Where fake news are born!</a></h2>
            <div id="signup">
                <a href="register.html">Register</a>
                <a href="login.html">Login</a>
            </div>
        </header>
        <nav id="menu">
            <!-- just for the hamburguer menu in responsive layout -->
            <input type="checkbox" id="hamburger">
            <label class="hamburger" for="hamburger"></label>

            <ul>
                <li><a href="index.html">Local</a></li>
                <li><a href="index.html">World</a></li>
                <li><a href="index.html">Politics</a></li>
                <li><a href="index.html">Sports</a></li>
                <li><a href="index.html">Science</a></li>
                <li><a href="index.html">Weather</a></li>
            </ul>
        </nav>
        <aside id="related">
            <article>
                <h1><a href="#">Duis arcu purus</a></h1>
                <p>Etiam mattis convallis orci eu malesuada. Donec odio ex, facilisis ac blandit vel, placerat ut lorem. Ut
                    id sodales purus. Sed ut ex sit amet nisi ultricies malesuada. Phasellus magna diam, molestie nec quam
                    a, suscipit finibus dui. Phasellus a.</p>
            </article>
            <article>
                <h1><a href="#">Sed efficitur interdum</a></h1>
                <p>Integer massa enim, porttitor vitae iaculis id, consequat a tellus. Aliquam sed nibh fringilla, pulvinar
                    neque eu, varius erat. Nam id ornare nunc. Pellentesque varius ipsum vitae lacus ultricies, a dapibus
                    turpis tristique. Sed vehicula tincidunt justo, vitae varius arcu.</p>
            </article>
            <article>
                <h1><a href="#">Vestibulum congue blandit</a></h1>
                <p>Proin lectus felis, fringilla nec magna ut, vestibulum volutpat elit. Suspendisse in quam sed tellus
                    fringilla luctus quis non sem. Aenean varius molestie justo, nec tincidunt massa congue vel. Sed
                    tincidunt interdum laoreet. Vivamus vel odio bibendum, tempus metus vel.</p>
            </article>
        </aside>
        <section id="news">
            <?php
            session_start();    
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
        <footer>
            <p>&copy; Fake News, 2017</p>
        </footer>
    </body>
</html>