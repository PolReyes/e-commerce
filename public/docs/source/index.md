---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://192.168.1.26/Cursos/tienda.dev/public/docs/collection.json)

<!-- END_INFO -->

#Carrito de compras

API para carrito de compras
<!-- START_202aeeba9d28471d59eaf483f8f7b195 -->
## Lista

Lista de productos en el carrito de compras

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/carrito/listar" \
    -H "Content-Type: application/json" \
    -d '{"cliente_id":10}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/carrito/listar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "cliente_id": 10
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/carrito/listar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    cliente_id | integer |  required  | Id del cliente

<!-- END_202aeeba9d28471d59eaf483f8f7b195 -->

<!-- START_ecff5b3edf1fd68c812e8844dd5cf904 -->
## Agregar productos

Agregar productos al carrito de compras

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/carrito/agregar" \
    -H "Content-Type: application/json" \
    -d '{"cliente_id":2,"producto_id":7,"cantidad":6,"precio":"et"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/carrito/agregar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "cliente_id": 2,
    "producto_id": 7,
    "cantidad": 6,
    "precio": "et"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/carrito/agregar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    cliente_id | integer |  required  | Id del cliente
    producto_id | integer |  required  | Id del producto
    cantidad | integer |  required  | Cantidad de productos
    precio | decimal |  required  | Precio calculado

<!-- END_ecff5b3edf1fd68c812e8844dd5cf904 -->

<!-- START_ed6ade0986161cc6adae9a31d0f3c828 -->
## Eliminar productos

Eliminar productos del carrito de compras

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/carrito/eliminar" \
    -H "Content-Type: application/json" \
    -d '{"id":20}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/carrito/eliminar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 20
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/carrito/eliminar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | Id del producto

<!-- END_ed6ade0986161cc6adae9a31d0f3c828 -->

#Cliente

API's para el cliente
<!-- START_ea71a2e0bf12e55039c3666b39ec8975 -->
## Login

Inicio de sesión de usuarios

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/login" \
    -H "Content-Type: application/json" \
    -d '{"email":"non","password":"omnis"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/login");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "non",
    "password": "omnis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/cliente/login`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | Email del cliente
    password | string |  required  | Password del cliente

<!-- END_ea71a2e0bf12e55039c3666b39ec8975 -->

<!-- START_ad783baef808c69801cc6def35d30f42 -->
## Registro

Registro de clientes

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/registro" \
    -H "Content-Type: application/json" \
    -d '{"nombre":"aliquid","apellido":"ad","direccion":"voluptatem","telefono":"ipsum","email":"quibusdam","password":"consequuntur"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/registro");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nombre": "aliquid",
    "apellido": "ad",
    "direccion": "voluptatem",
    "telefono": "ipsum",
    "email": "quibusdam",
    "password": "consequuntur"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/cliente/registro`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nombre | string |  required  | Nombres del cliente
    apellido | string |  required  | Apellidos del cliente
    direccion | string |  required  | Dirección del cliente
    telefono | string |  required  | Teléfono del cliente
    email | string |  required  | Email del cliente
    password | string |  required  | Password del cliente

<!-- END_ad783baef808c69801cc6def35d30f42 -->

<!-- START_369e6182fdb56ab2675b130803d51efe -->
## Recuperar contraseña

Recuperar contraseña

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/recuperar" \
    -H "Content-Type: application/json" \
    -d '{"email":"minima"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/recuperar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "minima"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/cliente/recuperar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | Email del cliente

<!-- END_369e6182fdb56ab2675b130803d51efe -->

<!-- START_363421a2cb5b2463ea954325124b576b -->
## Editar cliente

Editar datos del cliente

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/editar" \
    -H "Content-Type: application/json" \
    -d '{"id":4,"nombre":"adipisci","apellido":"asperiores","direccion":"ut","telefono":"cupiditate","password":"voluptatem"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/editar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 4,
    "nombre": "adipisci",
    "apellido": "asperiores",
    "direccion": "ut",
    "telefono": "cupiditate",
    "password": "voluptatem"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/cliente/editar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | Id del cliente
    nombre | string |  required  | Nombres del cliente
    apellido | string |  required  | Apellidos del cliente
    direccion | string |  required  | Dirección del cliente
    telefono | string |  required  | Teléfono del cliente
    password | string |  optional  | opcional Password del cliente

<!-- END_363421a2cb5b2463ea954325124b576b -->

<!-- START_c745061a7ccca34a25385acc179adf97 -->
## Detalle del cliente

Leer los datos de un cliente

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/1?id=veritatis" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/1");

    let params = {
            "id": "veritatis",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/cliente/{id}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  optional  | int required Id del cliente

<!-- END_c745061a7ccca34a25385acc179adf97 -->

#Dirección

API para direccion del cliente
<!-- START_4f628e4a86e26f6610c1befaa887cc70 -->
## Leer dirección

Leer la dirección de un cliente

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/direccion/1?id=perferendis" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/direccion/1");

    let params = {
            "id": "perferendis",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/direccion/{id}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  optional  | int required Id del cliente

<!-- END_4f628e4a86e26f6610c1befaa887cc70 -->

<!-- START_a03190557027c01f520bdc26815473af -->
## Actualizar

Actualizar la dirección del cliente

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/direccion/actualizar?cliente_id=vel&direccion=voluptas&distrito=autem&direccion_2=quibusdam&referencia=corporis" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/direccion/actualizar");

    let params = {
            "cliente_id": "vel",
            "direccion": "voluptas",
            "distrito": "autem",
            "direccion_2": "quibusdam",
            "referencia": "corporis",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/direccion/actualizar`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    cliente_id |  optional  | int required Id del cliente
    direccion |  optional  | string required Dirección del cliente
    distrito |  optional  | string required Distrito
    direccion_2 |  optional  | string required Segunda linea de dirección del cliente
    referencia |  optional  | string required Referencia de la dirección

<!-- END_a03190557027c01f520bdc26815473af -->

#Otros
<!-- START_0af9db6b17a5b2b04777b097814d8e49 -->
## accion/login
> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/accion/login" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/accion/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST accion/login`


<!-- END_0af9db6b17a5b2b04777b097814d8e49 -->

<!-- START_258da7584359f2059b8d3fe0d92b1f36 -->
## productos
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/productos" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/productos");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET productos`


<!-- END_258da7584359f2059b8d3fe0d92b1f36 -->

<!-- START_305ae4c2c5e7f6b212e6c8658de65456 -->
## productos/create
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/productos/create" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/productos/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET productos/create`


<!-- END_305ae4c2c5e7f6b212e6c8658de65456 -->

<!-- START_63f91e86f6b43bbe011af31d9ce6ed29 -->
## productos
> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/productos" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/productos");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST productos`


<!-- END_63f91e86f6b43bbe011af31d9ce6ed29 -->

<!-- START_72ff3e1bd785851307e73b52c2b509fc -->
## productos/{producto}/edit
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/productos/1/edit" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/productos/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET productos/{producto}/edit`


<!-- END_72ff3e1bd785851307e73b52c2b509fc -->

<!-- START_1a75748a179d5037e8bf6e7f2d849f38 -->
## productos/{producto}
> Example request:

```bash
curl -X DELETE "http://192.168.1.26/Cursos/tienda.dev/public/productos/1" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/productos/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE productos/{producto}`


<!-- END_1a75748a179d5037e8bf6e7f2d849f38 -->

<!-- START_83555366ce3e1201a2e2a6bfc33a0b90 -->
## clientes
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/clientes" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/clientes");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET clientes`


<!-- END_83555366ce3e1201a2e2a6bfc33a0b90 -->

<!-- START_1a165c4a73440c4d43a0cb07489d9c6b -->
## clientes/create
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/clientes/create" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/clientes/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET clientes/create`


<!-- END_1a165c4a73440c4d43a0cb07489d9c6b -->

<!-- START_b52889892caebd8cbbf2aa53024ad054 -->
## clientes/{cliente}/edit
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/clientes/1/edit" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/clientes/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET clientes/{cliente}/edit`


<!-- END_b52889892caebd8cbbf2aa53024ad054 -->

<!-- START_553d5e58e38bf7b140475cd806bd91b4 -->
## clientes/{cliente}
> Example request:

```bash
curl -X DELETE "http://192.168.1.26/Cursos/tienda.dev/public/clientes/1" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/clientes/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE clientes/{cliente}`


<!-- END_553d5e58e38bf7b140475cd806bd91b4 -->

<!-- START_0b7077d16b0b6ffabe5eaf66a78be536 -->
## usuarios
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/usuarios" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/usuarios");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET usuarios`


<!-- END_0b7077d16b0b6ffabe5eaf66a78be536 -->

<!-- START_23e6a8fd7499686b79ad9dbb173d2e60 -->
## usuarios/create
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/usuarios/create" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/usuarios/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET usuarios/create`


<!-- END_23e6a8fd7499686b79ad9dbb173d2e60 -->

<!-- START_79a7a78331f88705f4f0f6433c10acdd -->
## usuarios
> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/usuarios" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/usuarios");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST usuarios`


<!-- END_79a7a78331f88705f4f0f6433c10acdd -->

<!-- START_d48cbcde1b92a0568776b086ec58f9d5 -->
## usuarios/{usuario}/edit
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/usuarios/1/edit" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/usuarios/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET usuarios/{usuario}/edit`


<!-- END_d48cbcde1b92a0568776b086ec58f9d5 -->

<!-- START_017a803a69b8554443df8f81cc45188c -->
## usuarios/{usuario}
> Example request:

```bash
curl -X DELETE "http://192.168.1.26/Cursos/tienda.dev/public/usuarios/1" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/usuarios/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE usuarios/{usuario}`


<!-- END_017a803a69b8554443df8f81cc45188c -->

<!-- START_5cfd2910abd183426bd3fba3fee8dc69 -->
## ventas
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/ventas" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/ventas");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET ventas`


<!-- END_5cfd2910abd183426bd3fba3fee8dc69 -->

<!-- START_0e625a89ef5ddd296e49e35863f8aaf3 -->
## ventas/create
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/ventas/create" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/ventas/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET ventas/create`


<!-- END_0e625a89ef5ddd296e49e35863f8aaf3 -->

<!-- START_5794da7ca934037f225e972756941844 -->
## ventas/{venta}/edit
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/ventas/1/edit" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/ventas/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET ventas/{venta}/edit`


<!-- END_5794da7ca934037f225e972756941844 -->

<!-- START_609fd60e2b0000779abafdedad8dc21a -->
## ventas/{venta}
> Example request:

```bash
curl -X DELETE "http://192.168.1.26/Cursos/tienda.dev/public/ventas/1" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/ventas/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE ventas/{venta}`


<!-- END_609fd60e2b0000779abafdedad8dc21a -->

<!-- START_6c187eaa09c1f0d6bcea9867f2b74b80 -->
## reporte/venta
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/reporte/venta" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/reporte/venta");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET reporte/venta`


<!-- END_6c187eaa09c1f0d6bcea9867f2b74b80 -->

<!-- START_cfcec53e8218aef52b2e9daffa7ebad4 -->
## reporte/cliente
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/reporte/cliente" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/reporte/cliente");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET reporte/cliente`


<!-- END_cfcec53e8218aef52b2e9daffa7ebad4 -->

<!-- START_04536d97c3ffdb470eecfda58afd4958 -->
## accion/logout
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/accion/logout" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/accion/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET accion/logout`


<!-- END_04536d97c3ffdb470eecfda58afd4958 -->

#Producto

API para productos
<!-- START_b8ae75e8490bb4b5d7b5a74048517747 -->
## Lista

Lista de productos

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/producto/listar" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/producto/listar");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/producto/listar`


<!-- END_b8ae75e8490bb4b5d7b5a74048517747 -->

<!-- START_dee856aece8ab6b7fadb207e8245681c -->
## Detalle

Detalle del producto

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/producto/detalle/1?id=perferendis" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/producto/detalle/1");

    let params = {
            "id": "perferendis",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/producto/detalle/{id}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  optional  | int required Id del producto

<!-- END_dee856aece8ab6b7fadb207e8245681c -->

<!-- START_4fc46f94e24ba4d9a823482db33e94d2 -->
## Buscar

Buscar un producto por alguna coincidencia

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/producto/buscar?query=voluptatem" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/producto/buscar");

    let params = {
            "query": "voluptatem",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/producto/buscar`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    query |  optional  | string required Texto a buscar

<!-- END_4fc46f94e24ba4d9a823482db33e94d2 -->

#Tarjetas

API para tarjetas
<!-- START_267d767ba5bc725b6b38e7e362afe9c1 -->
## Listar

Listar las tarjetas de un cliente

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/tarjeta/listar?cliente_id=dicta" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/tarjeta/listar");

    let params = {
            "cliente_id": "dicta",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/tarjeta/listar`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    cliente_id |  optional  | int required Id del cliente

<!-- END_267d767ba5bc725b6b38e7e362afe9c1 -->

<!-- START_8016137207c2cf08488ba59850177a7f -->
## Agregar

Agregar nuevas tarjetas

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/tarjeta/agregar" \
    -H "Content-Type: application/json" \
    -d '{"cliente_id":10,"titular":"qui","numero_final":"provident","tipo":"ipsam"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/tarjeta/agregar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "cliente_id": 10,
    "titular": "qui",
    "numero_final": "provident",
    "tipo": "ipsam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/tarjeta/agregar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    cliente_id | integer |  required  | Id del cliente
    titular | string |  required  | Nombre del dueño de la tarjeta
    numero_final | string |  required  | Cuatro últimos dígitos de la tarjeta
    tipo | string |  required  | Marca de la tarjeta (Ej. Visa, Mastercard)

<!-- END_8016137207c2cf08488ba59850177a7f -->

<!-- START_a407600e2bc6381d0a16d870d3aae15a -->
## Eliminar

Eliminar tarjetas del cliente

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/tarjeta/eliminar" \
    -H "Content-Type: application/json" \
    -d '{"id":9}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/tarjeta/eliminar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 9
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/tarjeta/eliminar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | Id de la tarjeta

<!-- END_a407600e2bc6381d0a16d870d3aae15a -->

#Ventas

API para ventas
<!-- START_8661847ddb0a6eb6fda402c5292b5b13 -->
## Agregar

Crear nueva venta

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/venta/crear" \
    -H "Content-Type: application/json" \
    -d '{"cliente_id":8,"tarjeta_id":4,"total":"vero"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/venta/crear");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "cliente_id": 8,
    "tarjeta_id": 4,
    "total": "vero"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/venta/crear`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    cliente_id | integer |  required  | Id del cliente
    tarjeta_id | integer |  required  | Id de la tarjeta
    total | decimal |  required  | Precio total de venta realizada

<!-- END_8661847ddb0a6eb6fda402c5292b5b13 -->

<!-- START_e2db751a4f60acadb047fb26122858e5 -->
## Listar

Listar las ventas de un cliente

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/venta/listar?cliente_id=sit" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/venta/listar");

    let params = {
            "cliente_id": "sit",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/venta/listar`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    cliente_id |  optional  | int required Id del cliente

<!-- END_e2db751a4f60acadb047fb26122858e5 -->

<!-- START_aab8d2a6d03a640a7ec166a5a00eb89f -->
## Detalle

Detalle de una venta

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/venta/detalle/1?id=voluptatibus" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/venta/detalle/1");

    let params = {
            "id": "voluptatibus",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/venta/detalle/{id}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  optional  | int required Id de la venta

<!-- END_aab8d2a6d03a640a7ec166a5a00eb89f -->

<!-- START_0922dae03fc84b7b90a5e32d58ed260d -->
## Modificar estado

Modificar estado de una venta

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/venta/modificarEstado" \
    -H "Content-Type: application/json" \
    -d '{"id":9,"estado":"cum"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/venta/modificarEstado");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 9,
    "estado": "cum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/venta/modificarEstado`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | Id de la venta
    estado | string |  required  | Nombre del estado (Comprado,Enviado,Entregado)

<!-- END_0922dae03fc84b7b90a5e32d58ed260d -->


