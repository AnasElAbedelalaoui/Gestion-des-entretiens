drop table IF EXISTS Etudiant;
drop table IF EXISTS Enseignant;
drop table IF EXISTS Salle;
drop table IF EXISTS Horraire;
drop table IF EXISTS Entretien;
drop table IF EXISTS Surveillance;
drop table IF EXISTS PasseEntretien;
drop table IF EXISTS HchoisitparEns;

 


create table Etudiant(
    idEtu integer not null,
    nomEtu varchar (20) not null,
    prenomEtu varchar (20) not null,
    photoEtu BLOB NOT NULL,
    emailEtu varchar (40) not null,
    telEtu varchar (14) not null,
    noAdrEtu varchar (10) not null,
    rueAdrETu varchar (50) not null,
    cpAdrEtu varchar (6) not null,
    villeETu varchar (30) not null,
    constraint pk_idEtu primary key (idEtu)
);

 

create table Enseignant(
    idEns integer not null,
    nomEns varchar (20) not null,
    prenomEns varchar (20) not null,
    emailEns varchar (40) not null,
    telEns integer not null,
    constraint pk_idEns primary key (idEns)
);
create table Salle(
    idsal varchar (14) not null,
    constraint pk_idsal primary key (idsal)
);

 

create table Horraire(
    idH varchar(14) not null,
    dates date not null,
    horraire time not null,
    constraint pk_idH primary key (idH)

 

);

 


create table Entretien(
    idEn varchar(14) not null,
    typee varchar (14) not null,
    idsal varchar (14) not null,
    idH varchar(14) not null,

 

    constraint pk_idEn primary key (idEn),
    constraint fk_Salle_to_Entretien foreign key (idsal) references Salle(idsal),
    constraint fk_Horraire_to_Entretien foreign key (idH) references Horraire(idH)
);

 


create table Surveillance(
    idEn varchar(14) not null,
    idEns integer not null,
    constraint fk_Entretien_to_Surveillance foreign key (idEn) references Entretien (idEn),
    constraint fk_Enseignant_to_Surveillance foreign key (idEns) references Enseignant(idEns)
);

 

create table HchoisitparEns(
    idEns integer not null,
    idH varchar(14) not null,
    constraint pk_Enseignant_to_HchoisitparEns foreign key (idEns) references Enseignant (idEns),
    constraint fk_Horraire_to_HchoisitparEns foreign key (idH) references Horraire(idH)
);

 

create table PasseEntretien(
    idEn varchar(14) not null,
    idEtu integer not null,
    Note integer null,
    Commentaire Varchar(100) null,
    constraint fk_Entretien_to_PasseEntretien foreign key (idEn) references Entretien (idEn),
    constraint fk_Etudiant_to_PasseEntretien foreign key (idEtu) references Etudiant (idEtu)
);

 


INSERT INTO `Salle` (`idsal`) VALUES
('A-201'),
('A-202'),
('A-203'),
('A-204'),
('B-205'),
('B-206'),
('B-207'),
('B-208');

 

INSERT INTO `Enseignant` (`idEns`, `nomEns`, `prenomEns`, `emailEns`, `telEns`) VALUES
(1000, 'Jacob', 'Philippe', 'abdoul-majid.barry@etu.univ-smb.fr', 797868785),
(1001, 'Ange', 'Safarel', 'richardn@etu.univ-savoie.fr', 797868780),
(1002, 'Moubarak', 'Sani', 'zakari-yaou.abdou-mahamadou@etu.univ-smb', 797868781),
(1003, 'Kader', 'Keita', 'alaaeddine.besbes@etu.univ-smb.fr', 797868788),
(1004, 'Marco', 'Verrati', 'ayoub.rafii@etu.univ-smb.fr', 677654387);

 

 

INSERT INTO `Etudiant` (`idEtu`, `nomEtu`, `prenomEtu`, `photoEtu`, `emailEtu`, `telEtu`, `noAdrEtu`, `rueAdrETu`, `cpAdrEtu`, `villeETu`) VALUES
(2000, 'Zakari', 'Yaou', 0x61316565653831352d633566632d346264372d623862352d3636326365393564386263322e4a5047, 'zakari-yaou.abdou-mahamadou@etu.univ-smb', '0797868790', '13', 'Andre', '74000', 'Annecy'),
(2001, 'Ayoub', 'Raffi', 0x31613831393064372d383362342d346233612d393933612d6539373564666330326566622e4a5047, 'ayoub.rafii@etu.univ-smb.fr', '0788990088', '13', 'Bernad', '74001', 'Annecy'),
(2002, 'ALaadine', 'BEBESS', 0x34663230373935612d656135642d343534632d616465342d3862333464356139396565642e4a5047, 'alaaeddine.besbes@etu.univ-smb.fr', '0655467896', '43', 'Monparnasse', '75000', 'Paris'),
(2003, 'Richard', 'Ange', 0x50484f544f2d323032302d31322d31302d31342d35312d33352e6a7067, 'richardn@etu.univ-savoie.fr', '0677665543', '32', 'Eiffel', '38000', 'Grenoble'),
(2004, 'Barry', 'Majid', 0x63633435613261352d303762302d343763652d623831662d3538393365643339623039642e4a5047, 'abdoul-majid.barry@etu.univ-smb.fr', '0655443322', '10', 'Parmelan', '74000', 'Anncey'),
(2005, 'Anass', 'Abedela', 0x33363631373739662d623563642d343233622d383166382d6265626439623735393866392e4a5047, 'anas.el-abedelalaoui@etu.univ-smb.fr', '0711223344', '12', 'Gustave', '95000', 'Annecy');

 

 


INSERT INTO `Horraire` (`idH`, `dates`, `horraire`) VALUES
('H-100', '2021-06-01', '08:00:00'),
('H-101', '2021-06-01', '13:00:00'),
('H-200', '2021-06-02', '08:30:00'),
('H-201', '2021-06-02', '13:30:00'),
('H-300', '2021-06-03', '09:00:00'),
('H-301', '2021-06-03', '13:30:00'),
('H-400', '2021-06-04', '09:30:00'),
('H-401', '2021-06-04', '14:00:00');

 

INSERT INTO `Entretien` (`idEn`, `typee`, `idsal`, `idH`) VALUES
('E-P001', 'APP', 'A-201', 'H-100'),
('E-P002', 'PROJET', 'A-203', 'H-101'),
('E-I001', 'STAGE', 'B-205', 'H-100'),
('E-I002', 'APP', 'B-206', 'H-101'),
('E-P003', 'PROJET', 'A-203', 'H-200'),
('E-I003', 'STAGE', 'B-206', 'H-200');