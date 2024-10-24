# Marlon Travel App

## Descripción
Marlon Travel App es una aplicación web que permite a los usuarios consultar el clima actual de diferentes ciudades y calcular su presupuesto de viaje en la moneda local.

## Características
- Consulta del clima actual en ciudades seleccionadas.
- Conversión de presupuesto en pesos colombianos a la moneda local.

## Tecnologías utilizadas
- PHP (Laravel)
- MySQL
- JavaScript (jQuery)
- API de clima (openweathermap) y cambio de moneda (ExchangeRate API)

## Instalación
1. Clona este repositorio.
2. Instala las dependencias utilizando Composer.
3. Configura la base de datos y las variables de entorno.
4. Ejecuta la aplicación.

## Uso
Abre el archivo `index.blade.php` en tu navegador para acceder a la aplicación.


## Licencia
Este proyecto no tiene licencia.

## Diseño de la base de datos ciudades
ciudad: tabla para almacenar las ciudades de destino y sus monedas
id: entero autoincremental
nombre: varchar, nombre de la ciudad (Londres, New York, etc.)
moneda_local: varchar, nombre de la moneda
simbolo_moneda: varchar, símbolo de la moneda
tasa_cambio: float, tasa de cambio de la moneda local respecto al peso colombiano

## script base de datos
CREATE TABLE ciudades (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50),
  moneda_local VARCHAR(50),
  simbolo_moneda VARCHAR(10),
  tasa_cambio FLOAT
);
