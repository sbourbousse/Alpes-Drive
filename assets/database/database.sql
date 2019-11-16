--Créé par Sylvain Bourbousse le 20/10/2019

--Supprimer la base de donnée
drop database if exists Alpes_Drive;

--Créer la base de données
create database Alpes_Drive;

--Acceder à la base de donnée
use Alpes_Drive;

--Création des tables

create table parametre(
    version float
)engine=innodb charset=utf8;

create table cp(
    codeINSEECP char(5) primary key,
    nomCP varchar(50),
    codePostalCP char(5),
    libAcheminementCP varchar(50),
    ancienneCommuneCP varchar(30),
    coorGPSCP varchar(40)
)engine=innodb charset=utf8;

create table utilisateur(
	utilisateurMail varchar(128),
	utilisateurMotDePasse char(32),
	utilisateurVerifie bool,
	utilisateurcleMail int unsigned
)engine=innodb charset=utf8;

create table localisation(
    localisationId int unsigned,
    localisationLatitude double,
    localisationLongitude double
)engine=innodb charset=utf8;

create table entreprise(
	entrepriseId char(14) primary key,
	entrepriseLibelle varchar(128),
	entrepriseIBAN char(24)
)engine=innodb charset=utf8;

create table jour(
    jourId tinyint unsigned primary key,
    jourLibelle varchar(20)
)engine=innodb charset=utf8;

create table horaire(
	horaireId int unsigned primary key,
	horaireOuvertureMatin time,
	horaireFermeturMatin time,
	horaireOuvertureApresMidi time,
	horaireFermetureApresMidi time,
	pointRelaisId int references point_relais(pointRelaisId),
	jourId tinyint unsigned references jour(jourId)
)engine=innodb charset=utf8;

create table point_relais_type(
	pointRelaisTypeId smallint unsigned primary key,
	pointRelaisLibelle varchar(64)
)engine=innodb charset=utf8;

create table point_relais(
	pointRelaisId int unsigned primary key,
	pointRelaisPrenomGerant varchar(32),
	pointRelaisNomGerant varchar(32),
	pointRelaisTel char(10),
	pointRelaisAdresse varchar(128),
	pointRelaisVille varchar(128),
	pointRelaisCodePostal char(5),
	pointRelaisTypeId smallint unsigned references point_relais_type(pointRelaisTypeId),
	localisationId int unsigned references localisation(localisationId),
	entrepriseId char(14) references entreprise(entrepriseId),
	utilisateurMail varchar(128) references utilisateur(utilisateurMail),
	supprime bool
)engine=innodb charset=utf8;

create table producteur(
	prodId int unsigned primary key,
	prodPrenom varchar(64),
	prodNom varchar(64),
	prodTel char(10),
	prodAdresse varchar(128),
	prodVille varchar(128),
	prodCodePostal char(5),
	localisationId int unsigned references localisation(localisationId),
	entrepriseId char(14) references entreprise(entrepriseId),
	utilisateurMail varchar(128) references utilisateur(utilisateurMail),
	supprime bool
)engine=innodb charset=utf8;

create table client(
	clientId int unsigned primary key,
	clientPrenom varchar(64),
	clientNom varchar(64),
	clientTel char(10),
	clientAdresse varchar(128),
	clientVille varchar(128),
	clientCodePostal char(5),
	localisationId int unsigned references localisation(localisationId),
	utilisateurMail varchar(128) references utilisateur(utilisateurMail),
	supprime bool
)engine=innodb charset=utf8;

create table choisir(
	clientId int unsigned references client(clientId),
	pointRelaisId int unsigned references point_relais(pointRelaisId)
)engine=innodb charset=utf8;

create table proposer(
    pointRelaisId int unsigned references point_relais(pointRelaisId),
    producteurId int unsigned
)engine=innodb charset=utf8;

create table unite(
    uniteId tinyint unsigned primary key,
    uniteLibelle varchar(32),
    uniteLettre varchar(5),
    uniteQuantiteVente smallint
)engine=innodb charset=utf8;

create table categorie(
    categorieId smallint unsigned primary key,
    categorieLibelle varchar(128),
    categorieImage varchar(256)
)engine=innodb charset=utf8;

create table produit(
    produitId smallint unsigned primary key,
    produitLibelle varchar(128),
    produitImage varchar(256),
    uniteId tinyint unsigned references unite(uniteId),
    categorieId smallint unsigned references categorie(categorieId)
)engine=innodb charset=utf8;

create table variete(
    varieteId int unsigned primary key,
    varieteLibelle varchar(128),
    produitId smallint unsigned references produit(produitId)
)engine=innodb charset=utf8;

create table vente(
    venteId int unsigned primary key,
    prodId int unsigned references producteur(prodId),
    varieteId int unsigned references variete(varieteId),
    prix float unsigned,
    quantite smallint unsigned,
    dateAjout datetime,
    dateLimiteVente date,
    valide bool
)engine=innodb charset=utf8;

create table article(
    clientId int unsigned references client(clientId),
    venteId int unsigned references vente(venteId),
    quantite smallint unsigned,
    panierDateAjout datetime,
    pointRelaisId int unsigned references pointRelais(pointRelaisId),
    panierDateRecuperer datetime,
    panierId int unsigned references panier(panierId)
)engine=innodb charset=utf8;

create table panier(
    panierId int unsigned primary key,
    panierRegle bool,
    panierDateRegle datetime
)engine=innodb charset=utf8;














