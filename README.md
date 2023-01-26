# Bloeg_OC

guide Instalation

1. cloner le projet
2. lancer sur un server apache
3. importer la db via le fichier config/db.sql dans une base mysql
4. configurer le fichier config.php pour donner les infos de votre server apache et base mysql 
```
 <?php
    DEFINE('MAIN_NAMESPACE','APP/Blog');

    DEFINE('MAIL_HOST','smtp.mailtrap.io');
    DEFINE('MAIL_USERNAME','c4d3ce30bd27b9');
    DEFINE('MAIL_PASSWORD','0a1ecac36989c3');
    DEFINE('MAIL_PORT', 2525);

    DEFINE('DB_HOST','127.0.0.1:8889');
    DEFINE('DB_NAME','Blog_oc');
    DEFINE('DB_USER','root');
    DEFINE('DB_PASS','root');

    DEFINE('URI','http://blog_oc.fr');

    DEFINE('IMAGE_DEFAULT', 'https://cdn.emk.dev/templates/post-img.png');
 ``` 
 5. connection 
      admin => email: ths.rousse@gmail.com; pass => dev
      user => email: thomas.rousse@gmail.com pass => devdev
      
