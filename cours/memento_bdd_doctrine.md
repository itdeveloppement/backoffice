# connexion à la base de donnée
dans .en
identifiant à la base : exemple root
password : xxxx
nom : de la base

il faut commenter :(ligne 29) 
DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"

ajouter et renseignier (en ligne 30). Verifier le port dans le serveur (wamp ou laragon) et la version mysql
DATABASE_URL="mysql://identifiant:passeword@127.0.0.1:3306/nomdelabase?serverVersion=8.0.32&charset=utf8mb4"

# DOCTRINE

# creation d'une base et des tables

# 1. creation d'une base
cmd : sympfony console doctrine:database:create

# 2. creation d'une table ou de plusieurs table
cmd : symfony console make:entity

# 3. preparer la migration (creation du fichier migrations qui contien les requettes sql de creation des tables)
cmd : symfony.exe console make:migration
ou cmd : symfony console make:migration

# 4. valider la migration des tables dans php admin
cmd : symfony console doctrine:migrations:migrate
ou en mode racoursi cmd :symfony console d:m:m


