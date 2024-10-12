# API appActivitats  
Prova Backend Hackató Saló d'Ocupació oct. 2024. 

## 🖼️ Context  
La lògica d'aquesta API contempla que la persona que hi accedeix és l'administradora i té accés a la creació, edició, eliminació i visualització de les dades de les usuàries i de les activitats sense cap mena de restricció.  

## ⚙️ Requisits
- PHP >= 8.1  
- MySQL
- Composer
- git

>[!CAUTION]
> Tinc pendent empaquetar l'API a un contenidor de docker. Mentrestant, és probable que l'API falli per incompatibilitats amb versions diferents de programari o perquè no pugui connectar-se de forma adequada a la base de dades... 🤡 Espero que no.  

## 🧱 Instal·lació  
1. Clona el repositori i accedeix a la carpeta API-appActivitats.  
- `git clone git@github.com:Kaylen7/API-appActivitats.git`  
- `cd API-appActivitats`  

2. Instal·la les dependencies de PHP:  
`composer install`  

3. Copia `.env.example` amb el nom `.env` i omple les dades per connectar a la base de dades (l.22 a 27).  
- `cp .env.example .env`  
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=appActivitats
DB_USERNAME=nom_usuari
DB_PASSWORD=constrassenya
```  

>[!TIP]
> Assegura't que tens l'arxiu `.gitignore` amb `.env`.  

4. Genera la clau d'encriptació per a l'aplicació per evitar problemes amb Laravel (🤞).  
`php artisan key:generate`  

5. Fes les migracions de la base de dades i afegeix dades de mostra amb `--seed`.  
`php artisan migrate --seed`  

## 🏎️ Activar el servidor

1. Activa el servidor de MySQL al teu ordinador i tingues present el nom d'usuari, la contrassenya per connectar-t'hi i el port. Han de coincidir amb les dades de l'arxiu `.env`.  

**MacOS**
- Amb Homebrew: `brew services start mysql`  
- Sense: `mysql.server start`  

**Windows**
- `net start mysql`  

2. Posa en marxa el servidor de laravel.  
`php artisan serve`  

3. L'API hauria de ser accessible a `http://localhost:8000/`. 

## 🤝 API Endpoints  
Pots trobar la llista d'endpoints a la [documentació de l'API](https://www.postman.com/kaylen/appactivitats/overview) a Postman.  

## Importació i exportació de JSON  
L'API permet importar i exportar arxius en format JSON a les rutes:  
- **POST** `appActivitats/importar-json`. Permet importar usuaris o activitats de forma massiva, des d'un JSON. Cal especificar els paràmetres `arxiu` (ruta de l'arxiu) i `tipus` (usuaris o activitats).  
- **GET** `appActivitats/exportar-json`. Permet obtenir les dades d'activitats. Per tal de descarregar-ho en forma d'arxiu, a postman pots fer clic per desar la resposta en un arxiu. Amb `curl` pots especificar-ho amb l'etiqueta `-o "nom_arxiu.json"`.  

## 🚀 Properes passes  
[ ] _Dockeritzar_.  
[ ] Fer tests 🫠.  