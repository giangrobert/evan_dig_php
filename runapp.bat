#!/bin/bash

docker stop evan-dig
docker rm evan-dig


docker build -t init-php .

# Ejecutando el contenedor
docker run -p 3500:80 -d \
  -v "$(pwd)/core:/var/www/html/core" \
  -v "$(pwd)/public:/var/www/html/public" \
  -v "$(pwd)/app:/var/www/html/app" \
  --name evan-dig init-php

sleep 3

docker exec -it evan-dig bash
```

