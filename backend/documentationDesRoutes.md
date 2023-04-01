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

GET "api/panier"
```json
Exemple :
GET "/api/panier"
"panier":
    {
        "idProduit":1,
        "idClient":1,
        "montant":120.97,
    }
```
Retourne le panier en cours 

## Ajouter un panier
La méthode ajoute une liste d'element au panier, et définit le panier comme terminé.
Elle en créé un nouveau.
POST "api/panier/ajouter"
BODY [ [{idArticle},{quantite}],[{idArticle},{quantite}] ]
```json
Exemple :
POST "/api/panier/ajouter"
BODY [ [1,1],[2,1] ]

"panier":
    {
        "idProduit":1,
        "idClient":1,
        "montant":120.97,
    }
```
Retourne le panier en cours 

# Sprint 2 
L'état des pompes. [https://lucid.app/lucidchart/7379f8c8-1c77-49d6-8a02-ba473dc631ba/edit?invitationId=inv_72d74c01-0490-4aeb-825b-23b9efa96747&page=J_txk-1sJeMi#]