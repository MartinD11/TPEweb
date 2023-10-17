INTEGRANTES:
Lautaro Coppini
Martin Dentaro

MAIL:
marti110801@gmail.com
lautarocoppini@gmail.com

TEMATICA:
Ecommerce

DESCRIPCION:
sitio web ideado para la venta de diferentes productos relacionado con el ambito del armado de pc y venta de componentes, como por ejemplo CompraGamer o ese estilo de pagina web.

ACLARACION IMPORTANTE SOBRE EL DEPLOY DE LAS TABLAS:

en el archivo model.php que es donde se crean las tablas si estan no existen, tenemos un problema en la parte de la tabla usuarios en la columna password donde aparece la contraseña hasheada y por lo tanto al crearse las tablas, es necesario ir a la base de datos y editar esa columna poner la contraseña que aparece en el visual y que vamos a dejar a manoe n este archivo de texto, ya que como vas a ver en la screen que voy a subir a este archivo, no sabemos por que toma una parte de la contraseña como una variable php y no encontramos forma de solucionarlo y dado ese problema, la contraseña se crea incompleta y por lo tanto no funcionaria el iniciar sesion a menos que se edite la columna password de la tabla usuarios.

adjunto foto a continuacion->

![image](https://github.com/MartinD11/TPEweb/assets/137624161/615fe4a5-a5fa-43dd-890f-c957b0cec9d5)

CONTRASEÑA HASHEADA COMPLETA: $2y$10$n0D.dUcjJaSZYCkdniqt9.BdoUosl72UOKjs.r23bkqaB9kI2QMzy


