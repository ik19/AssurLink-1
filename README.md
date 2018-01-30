# AssurLink

## Utilisation
~~~
Désarchiver le projet sur votre ordinateur 

placer vous sur le projet 
- cd AssurLink

Exécutez le fickier docker compose
- docker-compose up -d --build

Exécutez composer
- docker-compose exec php composer install

~~~

Une fois les conteneurs prêts et démarrés, ouvrez l'url http://localhost dans le navigateur. Si tout s'est bien passé une liste de meeting devrais s'afficher.


## Base de donnée
~~~
Pour accéder à la base donnée ouvrez l'url http://localhost:8081
Server = db
Username = admin
Password = admin
database = assur_link
~~~
