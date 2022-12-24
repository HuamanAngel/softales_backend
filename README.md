# Softales Backend


## OPCION 1 : Para pruebas en produccion
### APIS

* Para tener las apis, instalar Postman e importar el siguiente archivo : 

SoftalesProd.postman_collection.json

Nota : Actualmente las APIS apuntan al APIGATEWAY de produccion

<br />
<br />

## OPCION 2 : Localmente sin infraestructura, por separado

* Poner a produccion una base de datos SQL Server.

Correr el sql de /Autenticacion/
Correr la migraciones de /CreateTale/

Nota : Los dockerfile solo construyen las aplicaciones, la base de datos debe estar en produccion

Microservicio : Autenticacion
Ubicarse en la ruta Autenticacion y ejecutar los siguientes comandos
````
docker build -t auth
docker run -e BD_NAME=NombreBD -e SERVER=ServidorProd -e USER=Usuario -e PASSWORD="Password" -e SERVER_PORT=4000 -e SECRET_JWT="softales-ArquitecturaDeSoftware" -p 9899:4000 auth
````
La url que se abre es : http://localhost:9899/

Microservicio : CreateTale
Ubicarse en la ruta CreateTale y ejecutar los siguientes comandos
````
docker build -t create-tale
docker run -e APP_ENV=local -e DB_HOST=ServidorProd -e DB_DATABASE=NombreBD -e DB_USERNAME=Usuario -e DB_PASSWORD="Password" -p 9898:8000 create-tale
````
La url que se abre es : http://localhost:9898/

Microservicio : VerHistoria
Ubicarse en la ruta VerHistoria y ejecutar los siguientes comandos
````
docker build -t ver-historia
docker run -e APP_ENV=local -e DB_HOST=ServidorProd -e DB_DATABASE=NombreBD -e DB_USERNAME=Usuario -e DB_PASSWORD="Password" -p 9897:8000 ver-historia
````
La url que se abre es : http://localhost:9897/


*** Nota : El microservicio ApiGate es opcional, se puede usar directamente los demas.


Microservicio(opcional) : ApiGate

Modificar los sgt archivos en ApiGate/Routes/
````
ocelot.autenticacion.json
ocelot.createtale.api.json
ocelot.verhistoria.json
````
Por ejemplo 
````
    "Routes": [
        {
            "UpstreamPathTemplate": "/api/login",
            "UpstreamHttpMethod": [ "POST" ],
            "DownstreamPathTemplate": "/api/auth/login",
            "DownstreamScheme": "http",
            "DownstreamHostAndPorts": [
                {
                    "Host": "localhost", // Para redireccionar al microservicio de Autenticacion
                    "Port": 9899 // Puerto del microservicio de Autenticacion
                }
            ],
            "SwaggerKey": "login_user"
        },
````


Ubicarse en la ruta ApiGate y ejecutar los siguientes comandos
````
docker build -t ver-historia
docker run -p 9896:80 apigate
````
La url que se abre es : http://localhost:9896/

<br />
<br />
<br />
<br />

## OPCION 3 : Levantar en Google Cloud Plataform con Infraestructura

* Poner a produccion una base de datos SQL Server.

Correr el sql de /Autenticacion/
Correr la migraciones de /CreateTale/

* Instalar Terraform
* Instalar Google Cloud SDK

* Ubicarse en la raiz del proyecto
* gcloud auth login // Para autenticacion con gcloud
* gcloud components install gke-gcloud-auth-plugin // Herramienta para manejar gke en GCD
* gcloud container clusters get-credentials CLUSTER_NAME
* Ahora configuramos los nodos que se crearan : 
Terraform/gke.tf : 
````
```
  node_config {
    disk_size_gb    = "50"
    disk_type       = "pd-balanced"
    image_type      = "COS_CONTAINERD"
    local_ssd_count = "0"
    machine_type    = "e2-medium" // cambiar a e2-medium, con micro puede faltar espacio para los microservicios
```
````

Terraform/terraform.tfvars : 


````
```
project_id = "encoded-aspect-371604" // Insertar el ID del proyecto
region     = "us-central1" // Colocar la region del cluster
```
````

* Ejecutar el siguiente comando "terraform init"
* Ejecutar el siguiente comando "terraform apply" // Con esto se crearan los nodos 




