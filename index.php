<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Calistoga&display=swap" rel="stylesheet"> 
    <title>Blog</title>
</head>
<body>
    <div id="container">
    <header id = header> 
        <nav>
            <ul class=menu> 
                <li class="navhome"><a href="http://10.20.18.107/blog_projekt/blog/">Home</a></li>
                <li class="navblog"><a href="http://10.20.18.107/blog_projekt/blog/blog.php">Blog</a></li>
                <li class="naverstellen"><a href="http://10.20.18.107/blog_projekt/blog/blog_schreiben.php">Blog erstellen</a></li>
            </ul> 
        </nav>
    </header>    
    
    <main id = contend>
        <h1>Willkommen bei meinem Blog</h1>
        <p>Willkommenstext</p>   

        <?php 
            /*$pdo = new PDO('mysql:host=localhost;dbname=blog_databank', 'root', '', [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]);

            $stmt = $pdo->query('SELECT * FROM `blog`');

            $alleZeilen = $stmt->fetchAll();    

            foreach($alleZeilen as $zeile) {
                echo '<div class="post">';
                echo '<h2>' . $zeile["post_title"] . '</h2>';
                echo 'gepostet von: ' . $zeile["created_by"] . '<br>am: ' . $zeile["created_at"] .  '<br>';
                    echo '<div class="post-text">';
                    echo $zeile["post_text"];
                    echo '</div>';
                echo '</div>';
            } */

        ?>
        
    </main>

        <div id="links-kollegen">
        <ul>
            <li><a href="http://10.20.18.105/blog/" target="_blank">Marvin's scheiss Blog</a></li>    
            <li><a href="http://10.20.18.106" target="_blank">Moritz's Blog</a></li>
            <li><a href="http://10.20.18.112" target="_blank">Erin's Blog</a></li>
            <li><a href="http://10.20.18.110" target="_blank">Luca's Blog</a></li>
            <li><a href="http://10.20.18.109/blog/" target="_blank">Alessio's Blog</a></li>
            <li><a href="http://10.20.18.108" target="_blank">Davide's Blog</a></li>
            <li><a href="http://10.20.18.105:8888/" target="_blank">Joshua's Blog</a></li>
            <li><a href="http://10.20.18.111" target="_blank">Nicola's Blog</a></li>

        </ul>
        </div>

    <footer id = footer>

    </footer>

    </div>

</body>
</html>