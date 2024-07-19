
livre de reference : https://symfony.com/doc/6.4/the-fast-track/fr/index.html
site : https://symfony.com/


**Instal symphony**

    • vérifier : intsall php au moins 8.2
    • vérifier : install composer
    • install l’aragon (serveur local) pour activier une base de donnée en local (phpmyadmin)
    • install phpmyadmin (via laragon)
        ◦ php admin
        ◦ user : root
        ◦ password : chaîne de caractère vide
    • installer scoop :  https://scoop.sh/
      rôle : installeur en ligne de commande
        cmd : 
            Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
            Invoke-RestMethod -Uri https://get.scoop.sh | Invoke-Expression
    • installer symfony CLI : 
        rôle : permet de se servir de symfony en ligne de commande
        cmd : scoop install symfony-cli

***Création d’un projet**
    • dans le terminal se positionner dans c : / laraon / www
    • cmd dans le terminal : symfony new --webapp nomduprojet
 (webapp permet de charger toutes les dépendances)

**Commande terminal en resumé :**
    • cmd créer un projet : symfony new –webapp nomduprojet
    • cmd céer pour demarrer le serveur : symfony server:start 
    • cmd pour arrtere le serveyr : ctl c ou server:stop
    • cmd pour créer le controleur : symfony console make:controller