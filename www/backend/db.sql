CREATE DATABASE banqueDB;
use banqueDB;
CREATE TABLE client(
    id INT AUTO_INCREMENT,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    nomCompte VARCHAR(255),
    solde INT,
    code VARCHAR(255),
PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=1082 DEFAULT CHARSET=latin1 ;
INSERT INTO client (prenom,nom,nomCompte,solde,code) VALUES ('Ibrahima','Fall','CompeIFALL',50000,'1234'),('Ibrahima','NGOM','CompeINGOM',50000,'4321');

CREATE DATABASE banqueDB;
use banqueDB;
CREATE TABLE gestionaire_compte(
    id INT AUTO_INCREMENT,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    username VARCHAR(255),
    password VARCHAR(255),
PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=1082 DEFAULT CHARSET=latin1 ;
INSERT INTO client (prenom,nom,username,password) VALUES ('Haby','Dianka','habibatou','passer123'),('Hassime','sy','hassimou','passer321');