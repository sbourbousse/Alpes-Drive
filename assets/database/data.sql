delete from cp;

load data local infile './laposte_hexasmal.csv' into table cp
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './utilisateur.csv' into table utilisateur
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './localisation.csv' into table localisation
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './point_relais_type.csv' into table point_relais_type
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './point_relais.csv' into table point_relais
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './producteur.csv' into table producteur
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './client.csv' into table client
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './choisir.csv' into table choisir
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './proposer.csv' into table proposer
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './unite.csv' into table unite
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './categorie.csv' into table categorie
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './produit.csv' into table produit
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './variete.csv' into table variete
	fields terminated by ';'
	lines terminated by '\n';

load data local infile './vente.csv' into table vente
	fields terminated by ';'
	lines terminated by '\n';

