DROP TABLE IF EXISTS  Paiement;
DROP TABLE IF EXISTS  PanierProduit;
DROP TABLE IF EXISTS  Produit;
DROP TABLE IF EXISTS  Panier;
DROP TABLE IF EXISTS  Client;

CREATE TABLE Produit
(
    idProduit INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    prix DOUBLE,
    description TEXT
);

CREATE TABLE Client
(
    idClient INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50)
);

CREATE TABLE Panier
(
    idPanier INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idClient INT NOT NULL,
    montant DOUBLE,
    FOREIGN KEY (idClient) REFERENCES Client(idClient)
);
CREATE TABLE Paiement
(
    idPaiement INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    idClient INT NOT NULL ,
    idPanier INT NOT NULL,
    date VARCHAR(10),
    enCours BOOLEAN,
    FOREIGN KEY (idClient) REFERENCES Client(idClient),
    FOREIGN KEY (idPanier) REFERENCES Panier(idPanier)

);
CREATE TABLE PanierProduit
(
    idPanierProduit INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idPanier INT NOT NULL,
    idProduit INT NOT NULL,
    quantite INT,
    FOREIGN KEY (idPanier) REFERENCES Panier(idPanier),
    FOREIGN KEY (idProduit) REFERENCES Produit(idProduit)

);

CREATE TABLE Stock
(
   idStock INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   quantite INT NOT NULL,
   idProduit INT NOT NULL,
   FOREIGN KEY (idProduit) REFERENCES Produit(idProduit)
)



# Jeu de données :
INSERT INTO Produit(nom,prix,description) VALUES
(
    'Chips',5.2,'Les meilleures chips du marché'
),
(
    'Caramel',1.99,'Caramel beurre sale miam'
),(
    'Essence',1.87,'Titol nouveau essence maxiPure 0% d emission de gaz'
),(
    'Batterie',9.99,'Batterie au lithium le plus ecologique au monde'
),(
    'Bouteille d eau',2.00,'Dans 20, 30 ans y en aura plus'
),(
   'Briquet',0.99,'Fumer tue'
),(
   'Hydrocarbure',1.02,'le carburant a base d elements naturels'
),(
    'Bonbons',0.99,'Les premiers bonbons sans sucre ! finit les carries'
),(
   'Cigarette',2.99,'Fumer tue'
),(
   'Caco',1.99,'Le caco c est la vie'
),(
   'Pain',0.99,'Le pain a 1€ !'
),(
   'Pomme',0.99,'J aime beaucoup les pommes'
),(
   'IceTi',1.99,'So Freshhh'
),(
   'BarreChoco',1.99,'La barre de chocolat la moins calorique du monde'
),(
   'RAMDepaner',25.99,'RAM 8Go DDR4, Depanage extreme'
),(
   'Chips Paprika',	2.50,'Sachet de chips saveur paprika, poids net 125g'
),(
   'Kat Kyt',1.20,'Barre chocolatée Kat Kyt, poids net 41,5g'
),(
   'Petit Beurre',1.60,'Boîte de biscuits Petit Beurre, poids net 300g'

),(
   'Jambon Sec',3.80,'Sachet de jambon sec, poids net 100g'

),(
   'M&M',1.80,'Sachet de M&M, poids net 45g'

),(
   'Barre de céréales',1.50,'Barre de céréales aux fruits secs, poids net 40g'

),(
   'Sandwich poulet-crudités',4.20,'Sandwich garni de poulet grillé et de crudités, poids net 250g'


),(
   'Bâtonnets de fromage',3.50,'Sachet de bâtonnets de fromage, poids net 150g'

),(
   'Barre chocolatée Maurs',1.40,'Barre chocolatée Maurs, poids net 51g'

),(
   'Bouteille d eau gazeuse',1.20,'Bouteille d eau gazeuse, contenance 50cl'

),(
   'Cacahuètes grillées',1.90,'Sachet de cacahuètes grillées, poids net 100g'

),(
   'Tartelette aux fraises',2.60,'Tartelette aux fraises, poids net 80g'

),(
    'Barquette de raisin',2.30,'Barquette de raisin, poids net 250g'

),(
   'Sandwich au jambon',4.50,'Sandwich garni de jambon et de salade, poids net 250g'

),(
   'Compote de pommes',1.80,'Compote de pommes, pot de 100g'

),(
   'Pain au chocolat',1.80,'Pain au chocolat, poids net 80g'

),(
   'Bouteille de jus d orange',2.10,'Bouteille de jus d orange, contenance 50cl'

),(
   'Boisson énergisante',2.80,'Canette de boisson énergisante, contenance 25cl'

),(
   'Gâteau au chocolat',2.90,'Gâteau au chocolat, poids net 90g'

),(
   'Bouteille de lait',1.50,'Bouteille de lait demi-écrémé, contenance 50cl'

),(
   'Salade de fruits',2.40,'Salade de fruits frais, poids net 150g'

),(
   'Sandwich au thon',4.50,'Sandwich garni de thon et de crudités, poids net 250g'
),(
   'Barre chocolatée Snyckers', 1.40, 'Barre chocolatée Snyckers, poids net 50g'

),(
   'Bouteille d eau gazeuse citronnée', 1.20, 'Bouteille d eau gazeuse citronnée, contenance 50cl'
),(
   'Cacahuètes enrobées de chocolat', 2.10, 'Sachet de cacahuètes enrobées de chocolat, poids net 120g'

),(
   'Biscuits fourrés au chocolat', 2.30, 'Boîte de biscuits fourrés au chocolat, poids net 200g'

),(
   'Sandwich à la dinde', 4.80, 'Sandwich garni de dinde grillée et de crudités, poids net 250g'

),(
   'Compote de poires', 1.80, 'Compote de poires, pot de 100g'

),(
   'Pain aux raisins', 1.90, 'Pain aux raisins, poids net 80g'

),(
   'Bouteille de jus de pomme', 2.10, 'Bouteille de jus de pomme, contenance 50cl'

),(
   'Barquette de fraises', 2.80, 'Barquette de fraises, poids net 250g'

),(
   'Bouteille de soda au cola', 2.00, 'Bouteille de soda au cola, contenance 50cl'

),(
   'Cookies aux pépites de chocolat', 2.30, 'Boîte de cookies aux pépites de chocolat, poids net 200g'

),(
   'Bouteille de thé glacé', 1.90, 'Bouteille de thé glacé, contenance 50cl'

),(
   'Sachet de bonbons acidulés', 1.60, 'Sachet de bonbons acidulés, poids net 150g'

),(
   'Tartelette au citron', 2.60, 'Tartelette au citron, poids net 80g'

),(
   'Bouteille de jus de raisin', 2.10, 'Bouteille de jus de raisin, contenance 50cl'
),(
   'Salade César', 4.20, 'Salade César avec poulet grillé, poids net 200g'
);







ALTER TABLE ERP.Reapprovisionnement ADD COLUMN etat INT DEFAULT 0;

CREATE TABLE Employe (
    idEmploye INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    identifiant VARCHAR(255),
    motDePasse VARCHAR(255),
    nom VARCHAR(20),
    prenom VARCHAR(20),
    email VARCHAR(20),
    adresse VARCHAR(20),
    salaire VARCHAR(20),
    estGerant BOOLEAN DEFAULT false
);

