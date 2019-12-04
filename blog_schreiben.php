<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles_blog_schreiben.css">
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
         
            $creator = $_POST['created_by'] ?? ''; 
            $title = $_POST['post_title'] ?? '';
            $post = $_POST['post_text'] ?? '';
            $URL =  $_POST['picture'] ?? '';

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $user ="root";
                $password ="";

                $pdo = new PDO('mysql:host=localhost;dbname=blog_databank', $user, $password, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                ]);
                
                //            $stmt = $pdo->prepare("INSERT INTO `blog` ('created_by', 'post_title', 'post_text') VALUES ('$creator', '$title', '$post')");

                if ($creator != '' && $title != '' && $post !='') {

                    $stmt = $pdo->prepare("INSERT INTO `blog` (created_by, post_title, post_text, picture) VALUES (:created, :title, :post, :picture) ");
                    $stmt->execute([':created' => $creator, ':title' => $title, ':post' => $post, ':picture' => $URL]);

                    echo '<p style="font-size: 2em; font-weight: bold;">OK</p>';

                    $creator =  '';
                    $title =  '';
                    $post =  '';
                    $URL = '';

                } else {
                    echo '<p style="font-size: 2em; font-weight: bold;">Formular nicht ausgefüllt, bitte füllen Sie alle Felder aus!</p>';
                }
            }
            
        ?>

        <form action="blog_schreiben.php" method="post">
        <div class="textfelder">
            <div class="name_title">
            <fieldset>
                    <legenden class="legenden">Bitte geben Sie Ihren Namen und Titel des Blogs ein:<br></legenden>

                    <label for="created_by">Ihr Name</label>
                    <input type="text" id="created_by" name="created_by" value="<?= $creator ?>">

                    <label for="post_title">Titel des Blogbeitrag</label>
                    <input type="text" id="post_title" name="post_title" value="<?= $title ?>">
            </fieldset>
            </div>
            <div class="blogbeitrag">
            <fieldset>
            <legenden class="legenden">Was möchten Sie schreiben?<br></legenden>
                <label for="picture">Bild URL<br></label>
                <input type="text" id="picture" name="picture" value="<?= $URL ?>">

                <label for="post_text">Blogbeitrag</label>
                <textarea cols="60%%" rows="15%" id="post_text" name="post_text" value="<?= $post ?>"></textarea>
                <input type="submit" value="Blog veröffentlichen">
            </fieldset>
            </div>
        </div> 
        </form>       
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