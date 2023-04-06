# Sprint 1 : 


## Liste d'articles

GET : "backend/api/items" 
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

GET "backend/api/item?{idArticle}"
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

GET "backend/api/panier"
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
POST "backend/api/panier/ajouter"
BODY [ [{idArticle},{quantite}],[{idArticle},{quantite}] ] , {montant} -> list
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

## TODO
- Faire toutes les routes du site
- Modifier un produit 
- Faire une réappro

## Modifier un produit :

Request Post, prends en body l'id de l'article, l'attribut a modifier et sa valeur

POST "backend/api/item/modifier"
BODY (idProduit,champ,valeur)
```json

BODY "idProduit=1, champ=nom, valeur=Chips au vinaigre"
"article" :
{
    "idProduit":1,
    "nom" : "Chips au vinaigre",
    "prix": 5.10,
    "description":"craquantes !" 
}
```
## Ajouter un produit
BODY : nom, prix, description, quantite
```json
BODY : "('Vin',12.99,'Domaine DuBouchon',12)"
"article":
{
    "idProduit":53,
    "nom" : "Vin",
    "prix": 12.99,
    "description":"Domaine DuBouchon"
}

```



## Ajouter un fournisseur
POST : "backend/api/fournisseur/ajouter"
BODY : (numeroSiret, nom)
```json 
BODY "(12345678901234,Michel")
"fournisseur":
{
    "idFournisseur":1,
    "numeroSiret":12345678901234,
    "nom":"Kiloutoutou"
}

```

## Voir les fournisseurs 

GET : "backend/api/fournisseur/display"
```json
"fournisseurs":
[
{
    "idFournisseur":1,
    "numeroSiret":12345678901234,
    "nom":"Kiloutoutou"
},
{
    "idFournisseur":2,
    "numeroSiret":12345678901234,
    "nom":"Tatol"
}
]
```

## Voir les produits de tous les fournisseurs

GET : "backend/api/fournisseur/products"

```json
"fournisseurs":
[
{
    "idFournisseur":1,
    "numeroSiret":12345678901234,
    "nom":"Kiloutoutou",
    "articles":[
        {
            "idProduit":1,
            "nom" : "Chips au vinaigre",
            "prix": 5.10,
            "description":"craquantes !" 
        },
        {
            "idProduit":2,
            "nom" : "Sandwich",
            "prix": 3.10,
            "description":"fondant !" 
        }
    ]
},
{
    "idFournisseur":2,
    "numeroSiret":12345678901234,
    "nom":"Tatol",
    "articles":[
        {
            "idProduit":1,
            "nom" : "Chips au vinaigre",
            "prix": 5.10,
            "description":"craquantes !" 
        },
        {
            "idProduit":2,
            "nom" : "Sandwich",
            "prix": 3.10,
            "description":"fondant !" 
        }

    ]
}
]
```

## Faire une réappro

POST : "backend/api/reapprovisionnement/ajouter"
BODY : [idFournisseur,idProduit,quantite,montant]

```json

    BODY: (1,1,23,120.99)

    "return":{
        "state":true
    }

```


# Sprint X 
L'état des pompes. [https://lucid.app/lucidchart/7379f8c8-1c77-49d6-8a02-ba473dc631ba/edit?invitationId=inv_72d74c01-0490-4aeb-825b-23b9efa96747&page=J_txk-1sJeMi#]