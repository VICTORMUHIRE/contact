<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact</title>
</head>
<body>
    
    <?php include_once "../controllers/getListeContact.php"?>
    
    <div class="menu">
       
    </div>
    <div class="container">
        <div class="head">
            <p>Gestion des Contact</p>
        </div>
        <div class="container-child1">
            <div class="ajouter">
                <a href="ajouterContact.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                <p>Ajouter Contact</p></a></div>
                               
            
            <div class="contact">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                        </tr>
                    </thead>
                    <tbody id='tableBody'>
                        <?php
                            $Contacts = getListeContacts();
                            for ($i = 0; $i < count($Contacts); $i++) {
                                echo "<tr onclick='displayDetails(" . $Contacts[$i]->getContactId() . ")'>";
                                echo "<td scope='row'>" . ($i + 1) . "</td>";
                                echo "<td scope='row'>" . $Contacts[$i]->getNom() . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <div id='div2'>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        function displayDetails(contactId) {
            // Utilisation d'AJAX pour récupérer les détails du contact depuis le serveur
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Le serveur a renvoyé les détails du contact
                    var details = JSON.parse(xhr.responseText);

                    // Construction du contenu HTML détaillé
                    var content = "<div>";
                    content += "<div><p class='detailp'>Details</div></p>";
                    content += "<p>Nom : " + details.nom + "</p>";
                    content += "<p>Adresse : " + details.adresse + "</p>";
                    content += "<p>Mail : " + details.mail + "</p>";
                    content += "<p>Description : " + details.info + "</p>";
                    content += "</div>";

                    // Affichage du contenu dans le div2
                    var div2 = document.getElementById('div2');
                    div2.innerHTML = content;
                }
            };

            // Envoi de la requête au serveur
            xhr.open("GET", "getContactDetails.php?id=" + contactId, true);
            xhr.send();
        }
    </script>

        </div>
    </div>

</body>
</html>