# Sprint 1 : 


## Liste d'articles

GET : "/api/items" 
```json
Exemple :
GET "/api/items"
"articles":[
    {
        "idProduit":1,
        "nom":"Chips",
        "prix":10.0,
        "description":"trop bon"
    },
    {
        "idProduit":2.0,
        "nom":"Donuts",
        "prix":5.0,
        "description":"très sucré"
    }
]
```
Retourne la liste des articles présents dans la DB



## Un article

GET "api/item/{idArticle}"
```json
Exemple :
GET "/api/item?idProduit=1"
"article":
    {
        "idProduit":1.0,
        "nom":"Chips",
        "prix":10.0,
        "description":"trop bon"
    }
```
Retourne l'article correspondant à l'ID

## Le panier 

GET "api/panier{idClient}"
```json
Exemple :
GET "/api/panier?idClient=1"
"panier":
    {
        "idProduit":1,
        "idClient":1,
        "montant":120.97,
    }
```
Retourne le pannier correspondant à l'ID du Client

## Ajouter un article

POST "api/panier/ajouter?{idClient}&{idArticle}"
```json
Exemple :
POST "/api/panier/ajouter?idClient=1&idArticle=1"
"article":
    {
        "idProduit":1.0,
        "nom":"Chips",
        "prix":10.0,
        "description":"trop bon"
    }
```
Retourne l'article ajouté

## Retirer un article

DELETE "api/panier/retirer?{idClient}&{idArticle}"
```json
Exemple :
DELETE "/api/panier/retirer?idClient=1&idArticle=1"
"article":
    {
        "idProduit":1.0,
        "nom":"Chips",
        "prix":10.0,
        "description":"trop bon"
    }
```
Retourne l'article retiré


# Sprint 2 
L'état des pompes. [https://lucid.app/lucidchart/7379f8c8-1c77-49d6-8a02-ba473dc631ba/edit?invitationId=inv_72d74c01-0490-4aeb-825b-23b9efa96747&page=J_txk-1sJeMi#]