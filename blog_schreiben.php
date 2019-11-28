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
            <li class="navhome"><a href="http://10.20.18.107/blog_projekt/blog/">Home</a></li>
                <li class="navblog"><a href="http://10.20.18.107/blog_projekt/blog/blog.php">Blog</a></li>
                <li class="naverstellen"><a href="http://10.20.18.107/blog_projekt/blog/blog_schreiben.php">Blog erstellen</a></li>
            </ul> 
        </nav>
    </header>    
    
    <main id = contend>
        <?php 
         
            $creator = $_POST['created_by'] ?? ''; 
            $title = $_POST['post_title'] ?? '';
            $post = $_POST['post_text'] ?? '';

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $user ="root";
                $password ="";

                $pdo = new PDO('mysql:host=localhost;dbname=blog_databank', $user, $password, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                ]);
                
                //            $stmt = $pdo->prepare("INSERT INTO `blog` ('created_by', 'post_title', 'post_text') VALUES ('$creator', '$title', '$post')");

                if ($creator != '' && $title != '' && $post !='') {

                    $stmt = $pdo->prepare("INSERT INTO `blog` (created_by, post_title, post_text) VALUES (:created, :title, :post) ");
                    $stmt->execute([':created' => $creator, ':title' => $title, ':post' => $post ]);

                    echo '<p style="font-size: 2em; font-weight: bold;">OK</p>';

                    $creator =  '';
                    $title =  '';
                    $post =  '';

                } else {
                    echo '<p style="font-size: 2em; font-weight: bold;">Formular nicht ausgefüllt, bitte füllen Sie alle Felder aus!</p>';
                }
            }
        ?>

        <form action="blog_schreiben.php" method="post">
        <div class="textfelder">
            <div class="name_title">
            <fieldset>
                    <legenden>Bitte geben Sie Ihren Namen und Titel des Blogs ein</legenden>

                    <label for="created_by">Name</label>
                    <input type="text" id="created_by" name="created_by" value="<?= $creator ?>">

                    <label for="post_title">Titel des Blogbeitrag</label>
                    <input type="text" id="post_title" name="post_title" value="<?= $title ?>">
            </fieldset>
            </div>
            <div class="blogbeitrag">
            <fieldset>
            <legenden>Was möchten Sie schreiben?</legenden>
                <label for="post_text">Blogbeitrag</label>
                <input type="text" id="post_text" name="post_text" value="<?= $post ?>">
                <input type="submit" value="Formular absenden">
            </fieldset>
            </div>
        </div> 
        </form>       
    </main>

    <footer id = footer>
    <div id="links-kollegen">
        <ul>
            <li><a href="http://10.20.18.105/blog/" target="_blank">Marvin's "minderwertiger" Blog</a></li>    
            <li><a href="http://10.20.18.106" target="_blank">Moritz's Blog</a></li>
            <li><a href="http://10.20.18.112" target="_blank">Erin's Blog</a></li>
            <li><a href="http://10.20.18.110" target="_blank">Luca's Blog</a></li>
            <li><a href="http://10.20.18.109/blog/" target="_blank">Alessio's Blog</a></li>
            <li><a href="http://10.20.18.108" target="_blank">Davide's Blog</a></li>
            <li><a href="http://10.20.18.105:8888/" target="_blank">Joshua's Blog</a></li>
            <li><a href="http://10.20.18.111" target="_blank">Nicola's Blog</a></li>
        </ul>
    </div>    
    </footer>

    </div>

</body>
</html>