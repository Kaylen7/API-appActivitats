# API appActivitats  
Prova Backend Hackató Saló d'Ocupació oct. 2024. 

## Context  
La lògica d'aquesta API contempla que la persona que hi accedeix és l'administradora i té accés a la creació, edició, eliminació i visualització de les dades de les usuàries i de les activitats sense cap mena de restricció.  

## Requisits
- php 8.3.12  
- servidor mysql local  

>[!CAUTION]
> Tinc pendent empaquetar l'API a un contenidor de docker. Mentrestant, és probable que l'API falli per incompatibilitats amb versions diferents de programari o perquè no pugui connectar-se de forma adequada a la base de dades... 🤡 Espero que no.  

## Instalació  
1. Clona el repositori i accedeix a la carpeta API-appActivitats.  
`git clone git@github.com:Kaylen7/API-appActivitats.git`  

2. Activa el servidor de `mysql` al teu ordinador i tingues present el nom d'usuari, la contrassenya per connectar-t'hi i el port (si és diferent del que s'assigna per defecte, 3306).  

3. Canvia el nom de l'arxiu `.env.example` a `.env` i omple les dades per connectar a la base de dades (l.22 a 27).  
- En principi, pots deixar els valors que hi ha per defecte a `DB_HOST`, `DB_PORT` i `DB_DATABASE`.
- `DB_USERNAME`: nom_usuari (sense cometes).  
- `DB_PASSWORD`: contrassenya (sense cometes).  

>[!TIP]
> Assegura't que tens l'arxiu `.gitignore` amb `.env`.  

4. Fes servir `php artisan serve` per aixecar el servidor.  
5. Accedeix als endpoints amb `curl` o una eina com [Postman](https://www.postman.com/). 

## API Endpoints  
Pots trobar un exemple d'ús dels endpoints a la [documentació de l'API](https://www.postman.com/kaylen/appactivitats/overview) a Postman.  

## Importació i exportació de JSON  
L'API permet importar i exportar arxius en format JSON a les rutes:  
- **POST** `appActivitats/importar-json`. Permet importar usuaris o activitats de forma massiva, des d'un JSON. Cal especificar els paràmetres `arxiu` (ruta de l'arxiu) i `tipus` (usuaris o activitats).  
- **GET** `appActivitats/exportar-json`. Permet obtenir les dades d'activitats. Per tal de descarregar-ho en forma d'arxiu, a postman pots fer clic per desar la resposta en un arxiu. Amb `curl` pots especificar-ho amb l'etiqueta `-o "nom_arxiu.json"`.  