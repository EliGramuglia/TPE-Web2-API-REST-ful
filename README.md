# API-REST de la Selección Argentina

¡Bienvenido a la documentación de nuestra API REST para Jugadores y Clubes de la Selección Argentina!

Esta API posibilita la creación de sitios web o aplicaciones de fútbol con el mejor contenido.

Se trata de una API deportiva confiable, rápida, y fácil de implementar, que ofrece servicios para acceder a información detallada sobre jugadores y clubes de la Selección.

---------

## Integrantes del grupo:
- Alvarez, Franco Nahuel (miembro A)
- Gramuglia Eliana (miembro B)

### E-mails:
- frannn.alvarez.17@gmail.com
- eliana.gramuglia@gmail.com


API REST desarrollada en el marco de la materia Web2, de la Tecnicatura Universitaria en Desarrollo de Aplicaciones Informáticas(TUDAI), UNICEN, Ciudad de Tandil.


---------

## Endpoints

Aclaración: las solicitudes y respuestas están en formato JSON.

Los endpoint disponibles son los siguientes:



## Listar Jugadores

### GET

GET /jugadores : Obtiene una lista de los jugadores actuales de la Selección Argentina, limitada por los parámetros de paginación.

Posibles parámetros de consulta:
- page: nuúmero de página. 
Ejemplo de uso: /jugadores?page=5
- club (filtro): permite escoger un club(por su id) y retorna todos los jugadores pertenecientes a dicho club.
Ejemplo de uso: /jugadores?club=7
- sort: campo por el cual se va a ordenar la lista (Nombre, Edad, Posición, etc.)
Ejemplo: de uso: /jugadores?sort=Nombre

Posibles respuestas:
- 400 Bad Request: 
- 200 OK = la solicitud fue exitosa. Se visualiza la lista correspondiente según lo pedido.

---------

## Obtener jugador por ID

### GET/:ID

GET /jugadores/id : Se utiliza para obtener toda la información detallada de un jugador.

Ejemplo:

    -Request: /jugadores/1

    -Response: (200 OK)
        {
        "id": 1,
        "Nombre": "Lionel Messi",
        "Edad": 36,
        "Posicion": "Delantero",
        "Cantidad_de_goles": 819,
        "id_club": 1,
        "Nombre_club": "Inter de Miami"
        }

Posibles respuestas:
- 200 OK = la solicitud fue exitosa. Se visualiza la información del jugador como en el ejemplo anterior.
- 404 Not Found = no existe en la base de datos, un jugador con el :id solicitado. 

---------

## Agregar jugador

### POST

PARA PODER LLEVAR A CABO ESTA FUNCIÓN SE REQUIERE DE UN TOKEN DE AUTENTICACIÓN.

POST /jugadores : se utiliza para crear un nuevo jugador. Los nuevos datos se deben proporcionar en el cuerpo de la solicitud.
    
¡IMPORTANTE! --->  el campo id_club debe coincidir con el id de un Club existente.
Algunos de los datos son obligatorios de completar.

Posibles respuestas:
- 201 Created = El jugador ha sido creado con éxito! Retorna el recurso creado.
- 401 Unauthorized = el usuario no tiene autorización para crear un nuevo recurso.
- 400 Bad Request = No se han completado todos los datos que son obligatorios*.
- 404 Not Found = hubo un error al crear un nuevo jugador.


---------

## Modificar jugador

### PUT

PARA PODER LLEVAR A CABO ESTA FUNCIÓN SE REQUIERE DE UN TOKEN DE AUTENTICACIÓN.

PUT /jugadores/:id : posibilita la modificación de un jugador mediante un :id. Los nuevos datos se deben actualizar en el cuerpo de la solicitud.

¡IMPORTANTE! --->  el campo id_club debe coincidir con el id de un Club existente.


Posibles respuestas:
- 200 OK = El jugador ha sido modificado con éxito.
- 401 Unauthorized = el usuario no tiene autorización para crear un nuevo recurso.
- 404 Not Found = el jugador no se puede modificar, ya que no existe.


---------

## Eliminar jugador

### DELETE

PARA PODER LLEVAR A CABO ESTA FUNCIÓN SE REQUIERE DE UN TOKEN DE AUTENTICACIÓN.

DELETE /jugadores/:id : permite eliminar el jugador indicado mediante un :id.


Posibles respuestas:
- 200 OK = El jugador ha sido eliminado con éxito.
- 401 Unauthorized = el usuario no tiene autorización para crear un nuevo recurso.
- 404 Not Found = el jugador no existe.



