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

# CRUD
cmd : symfony console make:crud