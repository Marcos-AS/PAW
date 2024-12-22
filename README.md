# PAW
Repositorio para la asignatura Programación en Ambiente Web

Para ejecutar:
1. dentro de mysql/ ejecutar: `docker compose up -d`
2. entrar a adminer y crear una base de datos con el nombre 'proyecto_paw'
3. ejecutar desde la raíz del proyecto: `vendor/bin/phinx migrate -t 20230531133151` para crear las tablas
4. ejecutar index.php desde la raíz: `php -S localhost:8888 -t public` (puerto al azar)