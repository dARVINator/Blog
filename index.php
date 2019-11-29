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
        <div>
            <h1>Willkommen bei meinem Blog</h1>
            <div>
            <p>Willkommenstext</p> 
            <p>Herzlich Willkommen auf meinem Blog<br>
                Das ist mein selber Programmierte Blog den ich im Basislehrjahr erstellt habe.<br>
                Er dient als Übung um meine PHP Kentnisse zu schulen.<br>
                Die Repetition fürs HTML und CSS ist auch gewährleistet.<br>
            </p>    
            <p>
                Sie können sich gerne ein bisschen auf im umschauen.<br>
                Sie können die Blog beiträge von anderen anschauen.<br>
                Wenn Sie möchten können sie auch gerne einen Blog verfassen und ihn dann auf dieser Seite veröffentlichen.<br>
                Ich hoffe das Ihnen mein Blog gefällt.<br>
                Wenn Sie etwas über den Blog meiner BLJ-Kollegen erfahren wollen, scrollen sie einfach herunter.<br>
                Sie sind alle verlinkt(momentan noch einige technische Schwierigkeiten). 
            </p>    
            </div>
        </div>
        
    </main>

    <footer id = footer>
    <p>
        Die Blogs meiner BLJ-Kollogen
    </p>   
        <div id="links-kollegen"> 

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