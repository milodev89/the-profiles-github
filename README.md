
<h2>The Profiles Github Project</h2>

<p>
Este proyecto esta realizado con el Framework Laravel de PHP, así mismo utilicé el Framework de Javascript Vuejs, dos frameworks que trabajan de la mano para optimizar y mejorar procesos al momento de desarrollar proyectos.

PASOS A SEGUIR:

Al descargar el proyecto desde el repositorio, tendrán que hacer una serie de pasos para que funcione correctamente la app. Aqui se describen los pasos a pasos con sus respetivos comandos:

- Desde la terminal de comandos debe estar en la carpeta del proyecto para poder realizar las siguientes ejecuciones.

- Se deberá ejecutar y actualizar los paquetes que tenga por ello se sugiere ejecutar: "composer install" y "npm install"

- En el archivo .env.example debe modificarse a .env y se ejecuta "php artisan key:generate" para generar la key de Laravel.

- Despues de esto, Es probable que deba ejecutar el comando "npm run build" para que sus archivos js y css queden listos para utilizar.

- Como se está utilizando el framework Laravel, se sugiere que se ejecute el comando "php artisan serve" con ello arrancará el servidor que monta la aplicación en Laravel.

- Con estos pasos anteriores debería quedar funcionando la app.

USO DE LA APP:

- El usuario deberá ingresar un usuario de busqueda de github , al darle click en "Search", el sistema hace unas validaciones y luego muestra en una tabla los 10 primeros y una grafica con sus respectivos seguidores.

- En la tabla se tiene un link que al darle click redirecciona a una nueva pantalla donde se ve el perfil de github en una tarjeta con sus datos.

</p>
