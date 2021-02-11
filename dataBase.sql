create database if not exists vipCcroft;

use vipCcroft;

create table if not exists Moderateur
(
    idModerateur integer not null AUTO_INCREMENT,
    pseudoModerateur varchar(255) not null,
    mail varchar(255) not null,
    mdp varchar(255) not null,
    lien varchar(255),
    superModo boolean not null,

    PRIMARY KEY (idModerateur)
);

create table if not exists Vips
(
    idVip integer not null AUTO_INCREMENT,
    pseudoVips varchar(255) not null,
    superVip integer not null,
    dateofVip date not null,
    duree int not null,

    PRIMARY KEY (idVip)
);

INSERT INTO Moderateur (pseudoModerateur,mail,mdp,superModo) VALUE ("ccroft","cinedy@live.fr","test",true);
