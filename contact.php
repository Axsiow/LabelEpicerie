<!DOCTYPE html>
<html lang="FR" >
<head>
	<meta charset="UTF-8">
	<title>Label Epicerie !</title>
	<link rel="stylesheet" href='https://daneden.github.io/animate.css/animate.min.css'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa|Ubuntu&display=swap"> 
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="media/labelepilogo.png" type="image/x-icon">
	<title>Contact - Label Epicerie !</title>
</head>

<body>
	<header class="containernav">
		<div class="navnav">
			<ul>
				<li><a href="index.html">Accueil</a></li>
				<li><a href="reserver.html">Réserver</a></li>
				<li><a href="menu.html">Menu</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>!
	</div>
	<div class="button_container" id="toggle">
		<span class="top"></span>
		<span class="middle"></span>
		<span class="bottom"></span>
	</div>
	</header>
	<div class="overlay" id="overlay">
  	<nav class="overlay-menu">
		<ul>
			<li><a href="index.html">Accueil</a></li>
	  		<li><a href="reserver.html">Réserver</a></li>
			<li><a href="menu.html">Menu</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
  	</nav>
    </div>
    <section class="sectionCenterContact">
        <?php
        if(isset($_POST['mailform']))
        {
            $ok = false;
            $color = "red";
	        if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message'])) //Vérifie si tout les champs sont remplis
	        {
                $header="MIME-Version: 1.0\r\n";
                $header.='From:"Name Email"<email@example.com>'."\n";
                $header.='Content-Type:text/html; charset="utf-8"'."\n";
                $header.='Content-Transfer-Encoding: 8bit';

                $message='
                <html>
                    <body>
                        <div style="display: flex; flex-direction: row; justify-content: space-around;">
                            <div style="width: 70%;">
                                <p style="font-size: 20px;">Nom de l\'expéditeur : '.htmlspecialchars($_POST['nom']).'
                                <br> Mail de l\'expéditeur : '.htmlspecialchars($_POST['mail']).'</p>
                            </div>
                            <div style="width: 30%;">
                                <img src="https://cdn.discordapp.com/attachments/455791465734602782/590901740837273600/Aw.png" style="height: 100px; margin-right: auto; margin-left: auto;"/>
                            </div>
                        </div>  
                            <p style="font-size: 20px;">Message : <br>'.nl2br(htmlspecialchars($_POST['message'])).'</p>
                    </body>
                </html>
                ';

                mail("supertheo3900@gmail.com", "AuphysWorks - Message de ".htmlspecialchars($_POST['nom']), $message, $header);
                $msg="Votre message a bien été envoyé ! ✅";
                $ok = true;
                $color = "green";
	        }
            else
            {
                $msg="Tous les champs doivent être complétés ! ❌";
                $ok = false;
                $color = "red";
            }
        }
    ?>
     <header id="headercontact">
        <h2>Vous avez une question ? Contactez nous ici !</h2>
            <form method="POST" action="">
                <input type="text" name="nom" placeholder="Nom*" value="<?php if(isset($_POST['nom']) && $ok==false) { echo $_POST['nom']; } ?>" /><br /><br />
                <input type="email" name="mail" placeholder="Email*" value="<?php if(isset($_POST['mail']) && $ok==false) { echo $_POST['mail']; } ?>" /><br /><br />
                <textarea name="message" placeholder="Message*"><?php if(isset($_POST['message']) && $ok==false) { echo $_POST['message']; } ?></textarea><br /><br />
                <input type="submit" id="bouton" value="Envoyer !" name="mailform"/>
            </form>
                <?php if(isset($msg)): ?>
                        <h2 style="color:<?php echo $color; ?>;"><?php echo $msg; ?></h2>
                <?php endif; ?>
     </header>
	</section>
	<footer class="footerIndex">
		<p id="footerPlus"><b>Label Epicerie</b>
			<br>
			175 avenue Thiers
			<br>
			69006 Lyon
			</p>
			<p id="footerCopy">Label Epicerie© 2019 tous droits réservés.</p>
	</footer>
  	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js'></script>
	<script  src="script.js"></script>
</body>
</html>