<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    />
    </head>
    <body>
      <!-- zone de connexion -->
            <footer>
            <form action="index.php" method="POST">
                <h2>Connexion</h2>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                <input type="password" placeholder="Entrer le mot de passe" name="password" >
                <input type="submit" id='submit'value ='Se connecter'> 
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>               
            </form>
            <div id="deuxiemetrait"></div>
        <div id="copyrightandicons">
          <div id="copyright">
            <span>Copyright &copy; Clement - 2021-2022 All Right reserved</span>
          </div>
        
            </footer>
            
    </body>
</html>