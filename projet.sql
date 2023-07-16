CREATE TABLE projet (
    id INT,
    nom VARCHAR(50),
    Lebele VARCHAR(50),
    dated date,
    datef date,
    chefP VARCHAR(50)
);
/
INSERT INTO projet
VALUES (1, "Mohammed", "ASMA",'2022-01-02','2023-01-02',"Mehdi");
/
ALTER TABLE projet
ADD PRIMARY KEY (id);
/
DELETE FROM projet
WHERE id =1;
/
CREATE TABLE employe (
    id INT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    dateN date,
    poste VARCHAR(50),
    Bureau INT,
    tel int
);
/ 
INSERT INTO employe
VALUES (1, "OMEIRI", "ABDELLAH",'2004-01-02','Directeur',200,0657271942);
/
ALTER TABLE employe
ADD PRIMARY KEY (id);
/
ALTER TABLE projet
ADD COLUMN lieu VARCHAR(50);
/CREATE TABLE login (
    username VARCHAR(50),
    password VARCHAR(50),
    firstname VARCHAR(50),
    lastname VARCHAR(50)
    
);

ALTER TABLE login
ADD PRIMARY KEY (username);
/
ALTER TABLE login
DROP COLUMN id;
/
ALTER TABLE login
ADD COLUMN etat VARCHAR(50);
/ALTER TABLE employe
ADD COLUMN username VARCHAR(50);
/

CREATE TABLE estAffecté (
    id int,
    username VARCHAR(50),
    date date,
    PRIMARY KEY (id, username)
);
    
/
ALTER TABLE estAffecté
ADD CONSTRAINT fk_id_estAffecté
FOREIGN KEY (id)
REFERENCES projet (id);
/
ALTER TABLE estAffecté
ADD CONSTRAINT fk_username_estAffecté
FOREIGN KEY (username)
REFERENCES employe (username);
/
CREATE TABLE projet (
    id INT,
    nom VARCHAR(50),
    Lebele VARCHAR(50),
    
    dated date,
    datef date,
    chefP VARCHAR(50)
);


Wilaya VARCHAR(50),
M_ouvrage {SKTM,SPE},
Programme VARCHAR(50),
TypeProjet VARCHAR(50),
Phase VARCHAR(50),
Etat {EnCours,En Cloture,},
Objectif VARCHAR(50),
DateObjectif date,


CREATE TABLE projet (
    id INT,
    nom VARCHAR(50),
    Lebele VARCHAR(50),
    dated date,
    datef date,
    chefP VARCHAR(50)
);

CREATE TABLE contrat (
    contrat int PRIMARY KEY,
    id INT,
    Designation VARCHAR(50),
    Montant int,
    dateSignature date,
    Delai VARCHAR(50),
    CONSTRAINT fk_contrat_projet FOREIGN KEY (id)
        REFERENCES projet(id)
);
/
ALTER TABLE projet
ADD COLUMN wilaya VARCHAR(50);
/
ALTER TABLE projet
ADD COLUMN mouvrage VARCHAR(50);

ALTER TABLE projet
ADD COLUMN programme VARCHAR(50);

ALTER TABLE projet
ADD COLUMN etat VARCHAR(50);

ALTER TABLE projet
ADD COLUMN objectif VARCHAR(50);

ALTER TABLE projet
ADD COLUMN dateobjectif date;

ALTER TABLE projet
ADD COLUMN performance VARCHAR(50);

ALTER TABLE projet
ADD COLUMN datemes date;
 
ALTER TABLE projet
ADD COLUMN anneemesprevue VARCHAR(50);

ALTER TABLE projet
ADD COLUMN puissance int;

ALTER TABLE projet
ADD COLUMN nbtranches int;

ALTER TABLE projet
ADD COLUMN ouverture date;