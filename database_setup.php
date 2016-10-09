<?php


echo <<<_END
<!DOCTYPE html>
<html>
<body>

<h1>Setting up database ...</h1>



</body>
</html>

_END;

require_once 'functions.php';

createTable('members','user VARCHAR(16),pass VARCHAR(16), INDEX(user(6))');

createTable('messages', 
              'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              auth VARCHAR(16),
              recip VARCHAR(16),
              pm CHAR(1),
              time INT UNSIGNED,
              message VARCHAR(4096),
              INDEX(auth(6)),
              INDEX(recip(6))');

createTable('profiles',
              'user VARCHAR(16),
              text VARCHAR(4096),
              INDEX(user(6))');
              
createTable('friends',
              'user VARCHAR(16),
              friend VARCHAR(16),
              INDEX(user(6)),
              INDEX(friend(6))');
              
createTable('events',
                    'id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    email VARCHAR(255)  NOT NULL,
                    lastname    VARCHAR(255),
                    firstname   VARCHAR(255),
                    street  VARCHAR(255),
                    city    VARCHAR(255),
                    province CHAR(2),
                    postal_code CHAR(6),
                    phone VARCHAR(25)');

             
              



?>