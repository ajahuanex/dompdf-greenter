# dompdf-greenter
[![N|Solid](https://cldup.com/dTxpPi9lDf.thumb.png)](https://megadatum.com/)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

### Features

- Support Greenter;
- No necesita la funcionalidad `exec()` en php;
- Funciona de `Shared Hosting`(Hosting compartido);


### Instalar librería

`composer require webmaster/dompdf-greenter`

#### Editar el archivo `config/services.wml`
 
`Webmaster\Report\DompdfReport:`
        `rguments: ['@App\Service\HtmlReportDecorator']`
        

