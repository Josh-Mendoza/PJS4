<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Miesto login</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
</head>
<body>
    <main>
        <div class="background">
            <div class="text">
                <h1>Miesto login</h1>
            </div>
            <div class="box">
                <form action="controle/Vérification_connexion.php" method="POST">
                    <input class="username" name="username" placeholder="Nom utilisateur" type="text" required="required" /><br>
                    <input class="password" name="password" placeholder="Mot de passe" type="password" required="required" /><br>
                    <input class="button" type="submit" value="Login" name="submit">
                </form>
            </div>
        </div>
    </main>
</body>
</html>