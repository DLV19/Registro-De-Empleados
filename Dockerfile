FROM php:8.2-cli

# Instala extensiones PHP necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia el código de la app
COPY . /var/www/html
WORKDIR /var/www/html

# Puerto requerido por Render
EXPOSE 10000

# Comando para iniciar servidor embebido PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]

# Chequeo de salud para Render
HEALTHCHECK CMD curl --fail http://localhost:10000 || exit 1
