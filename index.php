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
        <p>Herzlich Willkommen auf meinem   

        <?php 
            /*Die Links von der Datenbank zu den Blogs der anderen*/
            $user = 'blj';
            $password = '123';


            $pdo = new PDO('mysql:host=10.20.18.111;dbname=ipadressen', "$user", "$password", [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]);

            $stmt = $pdo->query('SELECT * FROM `ipadressen`');

            $alle_ips = $stmt->fetchAll();
            
            echo ("$alle_ips")

            //foreach($alle_ips as $link_kollegen) {
                
            //}

        ?>
        
    </main>

    <footer id = footer>
    <p>
        Die Blogs meiner BLJ-Kollogen
    </p>   
        <!--<div id="links-kollegen"> 
        <ul>
            <li><a href="http://10.20.18.104/blog/" target="_blank">Marvin's scheiss Blog</a></li>    
            <li><a href="http://10.20.18.106" target="_blank">Moritz's Blog</a></li>
            <li><a href="http://10.20.18.112" target="_blank">Erin's Blog</a></li>
            <li><a href="http://10.20.18.110" target="_blank">Luca's Blog</a></li>
            <li><a href="http://10.20.18.109/blog/" target="_blank">Alessio's Blog</a></li>
            <li><a href="http://10.20.18.108" target="_blank">Davide's Blog</a></li>
            <li><a href="http://10.20.18.105:8888/" target="_blank">Joshua's Blog</a></li>
            <li><a href="http://10.20.18.111" target="_blank">Nicola's Blog</a></li>

        </ul>
        </div>-->
    </footer>

    </div>

</body>
</html>