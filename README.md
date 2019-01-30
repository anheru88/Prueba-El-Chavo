# Prueba-El-Chavo

Para esta prueba decidí tomar el un camino algo largo y mostrar alguna de las cosas que se pueden hacer.

Para la instalacion de este proyecto debe tener nginx, composer, php 7.2+, y mariadb o mysql, como motor de base de datos.

```bash
git clone https://github.com/anheru88/Prueba-El-Chavo.git prueba_chavo
cd pruebachavo
composer install
# asigna valores a las variables de entorno  (base de datos)
cp .env.example .env
# corre las migraciones y un seed por defecto 
php artisan migrate --seed
```

Para ejecutar el proyectos, estando en la carpeta raíz:


```bash
php aritsan serve
```

Ahora abre la dirección [localhost:8000](http://localhost:800) en el navegador.

Algunas Imagenes

![img_1](https://github.com/anheru88/Prueba-El-Chavo/blob/master/images/captura1.png?raw=true)
![img_2](https://github.com/anheru88/Prueba-El-Chavo/blob/master/images/captura2.png?raw=true)
![img_3](https://github.com/anheru88/Prueba-El-Chavo/blob/master/images/captura3.png?raw=true)
![img_4](https://github.com/anheru88/Prueba-El-Chavo/blob/master/images/captura4.png?raw=true)

