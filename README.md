# MQ Prop Laravel

### v2 updates:

ALTER TABLE listings ADD COLUMN city_id int(11) unsigned;
ALTER TABLE listings ADD COLUMN room_qty int(11) unsigned not null default '1';
ALTER TABLE listings ADD COLUMN ambience_qty int(11) unsigned not null default '1';
ALTER TABLE listings ADD COLUMN bath_qty int(11) unsigned not null default '1';
ALTER TABLE listings ADD COLUMN has_poster tinyint(1) unsigned not null default '0';
ALTER TABLE listings ADD COLUMN is_favorite tinyint(1) unsigned not null default '0';
ALTER TABLE listings ADD COLUMN seller_info varchar(200);
ALTER TABLE listings ADD COLUMN published_in_mercadolibre tinyint(1) unsigned not null default '0';
ALTER TABLE listings ADD COLUMN published_in_zonaprop tinyint(1) unsigned not null default '0';
ALTER TABLE listings ADD COLUMN published_in_argenprop tinyint(1) unsigned not null default '0';
CREATE TABLE cities (id int unsigned not null primary key auto_increment, name varchar(50) not null);
INSERT INTO cities (name) VALUES 
    ('Ituzaingó Norte'),
    ('Ituzaingó Sur'),
    ('Castelar Norte'),
    ('Castelar Sur'),
    ('Morón Norte'),
    ('Morón Sur'),
    ('Padua'),
    ('Merlo'),
    ('Moreno'),
    ('General Rodríguez'),
    ('Libertad'),
    ('Francisco Alvarez'),
    ('Luján'),
    ('Ramos Mejía'),
    ('Haedo'),
    ('Costa Atlántica'),
    ('Córdoba'),
    ('Entre Ríos');