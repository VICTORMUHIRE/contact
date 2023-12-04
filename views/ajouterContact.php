<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tarif</title>
</head>
<body>
    
    <div class="container">
        <div class="head">
            <p>Ajouter un contact</p>
        </div>
        <div class="container-child1 container-child">
            <form action="../controllers/enregistrerContact.php" method="POST">                                 
                <div class="div2 div3">
                    <div>
                        <input class="input2" type="text" name="nom" required>
                        <span  class="span1">Nom</span>
                    </div>
                    <div>
                        <input class="input2" type="text" name="adresse" required>
                        <span  class="span1">Adresse</span>
                    </div>
                    <div>
                        <input class="input2" type="mail" name="mail" required>
                        <span  class="span1">Mail</span>
                    </div>
                    <div>
                        <textarea name="info" id="" cols="80" rows="10"> Description</textarea>
                    </div>
                    <div>
                        <button type="submit" value="Envoyer">Enregistrer</button>
                    </div>
                    
                </div>
                           
            </form>            
        </div>
    </div>


  
</body>
</html>