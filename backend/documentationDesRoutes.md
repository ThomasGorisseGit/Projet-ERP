
# GET 
## items : 
Renvoie la liste des Produits

Route : {GET} http://64.225.109.223/backend/api/items

ARGS : 

Retour : 
```json
[
	{
		"idProduit": 1,
		"nom": "Chips au vinaigre",
		"prix": 5.2,
		"description": "Les meilleures chips du marché",
		"idStock": 2,
		"quantite": 135
	},
	{
		"idProduit": 2,
		"nom": "Caramel",
		"prix": 1.99,
		"description": "Caramel beurre sale miam",
		"idStock": 3,
		"quantite": 274
	}
]
```

## item : 
Renvoie un produit

Route : {GET} http://64.225.109.223/backend/api/item?idProduit=1

ARGS : 

Retour : 
```json
[
	{
		"idProduit": 1,
		"nom": "Chips au vinaigre",
		"prix": 5.2,
		"description": "Les meilleures chips du marché",
		"idStock": 2,
		"quantite": 135
	}
]
```

## panier : 
Renvoie le panier en cours

Route : {GET} http://64.225.109.223/backend/api/panier

ARGS : 

Retour : 
```json
[
	{
		"idProduit": 1,
		"nom": "Chips au vinaigre",
		"prix": 5.2,
		"description": "Les meilleures chips du marché",
		"idStock": 2,
		"quantite": 1
	}
]
```
## afficher les fournisseur: 
Renvoie la liste des fournisseurs

Route : {GET} http://64.225.109.223/backend/api/fournisseur/display

ARGS : 

Retour : 
```json
[
	{
		"idFournisseur": 1,
		"numeroSiret": "Jean",
		"nom": "123123123"
	}
]
```

## Liste produit fournisseur 
Renvoie la liste des produits d'un fournisseurs

Route : {GET} http://64.225.109.223/backend/api/fournisseur/products

ARGS : 

Retour : 
```json
[
	{
		"idFournisseur": 1,
		"numeroSiret": "Jean",
		"nom": "123123123",
        "articles" : [
            {
                "idProduit": 1,
		        "nom": "Chips au vinaigre",
		        "prix": 5.2,
		        "description": "Les meilleures chips du marché",
		        "idStock": 2,
		        "quantite": 1
            }
        ]
	}
]
```

## Liste des réappros
Renvoie la liste des réappros

Route : {GET} http://64.225.109.223/backend/api/reapprovisionnement/display
ARGS : 

Retour : 
```json
[
	{
		"idReapprovisionnement": 8,
		"idFournisseur": 1,
		"idStock": 24,
		"idProduit": 23,
		"dateCommande": "2023-04-06",
		"dateReception": "2023-05-15",
		"quantite": 100,
		"montant": 300
	}
]
```
# POST

## Ajouter Panier
Ajoute une liste de produits au panier et en créé un nouveau.

Route : {POST} http://64.225.109.223/backend/api/panier/ajouter

ARGS : MultiPart

"list" [ [{idProduit},{quantite}] , [{idProduit},{quantite}] ]


Retour : 
```json
[
	{
        "status":true
	}
]
```


## Ajouter produit
Ajoute un produit a la liste des produits

Route : {POST} http://64.225.109.223/backend/api/item/ajouter

ARGS : MultiPart

"nom" : "Tarte"
"prix" : 4.99
"description" : "Miam"
"quantite" : 1


Retour : 
```json
[
	{
        "status":true
	}
]
```

## Modifier produit
Modifie un produit 

Route : {POST} http://64.225.109.223/backend/api/item/modifier

ARGS : MultiPart

"idProduit" : "3"
"champ" : "nom"
"valeur" : "Essence SP94"


Retour : 
```json
[
	{
        "status":true
	}
]
```

## Ajouter un fournisseur
Ajoute un fournisseur

Route : {POST} http://64.225.109.223/backend/api/fournisseur/ajouter

ARGS : MultiPart

"nom" : "John"
"numeroSiret" : 4561213


Retour : 
```json
[
	{
        "status":true
	}
]
```



## Ajouter un reapprovisionnement
Ajoute un reapprovisionnement

Route : {POST} http://64.225.109.223/backend/api/reapprovisionnement/ajouter

ARGS : MultiPart

"idFournisseur" : 1
"idProduit" : 32
"quantite" : 100
"montant" : 160.99


Retour : 
```json
[
	{
        "status":true
	}
]
```