## Installation

Executez les commandes suivantes : 

1 - git clone https://github.com/MichaMegret/J-fly.git

2 - cd j-fly

3 - composer install

4 - cp .env.example .env

5 - php artisan key:generate

6 - php artisan migrate

7 - php artisan db:seed

8 - npm install

9 - npm run -dev

10 - php artisan storage:link

11 - php artisan serve

Vous aurez besoin d'une base de donnée MySql qui tourne sur le port 3306 de votre machine locale

Si vous n'avez pas de base de données MySql sur votre machine locale, installez Docker Desktop et remplacez l'étape 11 par la commande suivante : 

11 - docker-compose up -d

Vous aurez alors un container Docker qui tourne sur l'URL 127.0.0.1.

Ensuite relancez les migrations : 

12 - php artisan migrate

13 - php artisan db:seed

Pour que cela fonctionne vous devrez ensuite modifier votre fichier .env, remplacez la ligne

DB_HOST=1227.0.0.1
 
par

DB_HOST=mysql

Si la connection échoue, essayez de de modifier le mot de passe pour la connection dans le fichier .env avec la valeur 'password'

DB_PASSWORD=password

Et voila, c'est installé!
