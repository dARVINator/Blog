<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles_blog.css">
    <link href="https://fonts.googleapis.com/css?family=Calistoga&display=swap" rel="stylesheet"> 
    <title>Blog</title>
</head>
<body>
    <div id="container">
    <header id = header> 
        <nav>
            <ul class=menu> 
            <li class="navhome"><a href="http://10.20.18.106/blog_projekt/blog/">Home</a></li>
                <li class="navblog"><a href="http://10.20.18.106/blog_projekt/blog/blog.php">Blog</a></li>
                <li class="naverstellen"><a href="http://10.20.18.106/blog_projekt/blog/blog_schreiben.php">Blog erstellen</a></li>
            </ul> 
        </nav>
    </header>    
    
    <main id = contend>
        <?php 

            
            $pdo = new PDO('mysql:host=localhost;dbname=blog_databank', 'root', '', [
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
                    echo $zeile["post_text"] . '<br>';
                    echo $zeile["picture"];
                    echo '<img src=' . $zeile["picture"] . '<br>';
                    echo '</div>';
                echo '</div>';
            }

        ?>
        </main>

    <footer id = footer>
    <div id="links-kollegen">
        <p>
            Die Blogs meiner BLJ-Kollegen
        </p>
        <?php 
                /*Die Links von der Datenbank zu den Blogs der anderen*/
                $user = 'd041e_gibucher';
                $password = '54321_Db!!!';

                $pdo = new PDO('mysql:host=10.20.18.122;dbname=d041e_gibucher', $user, $password, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                ]);

                $stmt = $pdo->query('SELECT * FROM `ipadressen`');
                foreach($stmt->fetchAll() as $ipadressen) {
                    echo '<li><a href="http://' . $ipadressen ["Ip"] . '" target="_blank">' . $ipadressen ["vorname"] . '</a></li>';
                }
            ?>
    </div>
    </footer>

    </div>

</body>
</html>