delete from cp;

load data local infile './laposte_hexasmal.csv' into table cp
	fields terminated by ';'
	lines terminated by '\n';
