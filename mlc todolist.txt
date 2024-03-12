#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        Id       Int  Auto_increment  NOT NULL ,
        Nom      Varchar (255) NOT NULL ,
        Prenom   Varchar (255) NOT NULL ,
        Email    Varchar (255) NOT NULL ,
        Password Varchar (255) NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Tache
#------------------------------------------------------------

CREATE TABLE Tache(
        Id      Int  Auto_increment  NOT NULL ,
        Titre   Varchar (50) NOT NULL ,
        Tache   Varchar (255) NOT NULL ,
        Valider Bool NOT NULL ,
        Id_User Int NOT NULL
	,CONSTRAINT Tache_PK PRIMARY KEY (Id)

	,CONSTRAINT Tache_User_FK FOREIGN KEY (Id_User) REFERENCES User(Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Prioriy
#------------------------------------------------------------

CREATE TABLE Prioriy(
        Id       Int  Auto_increment  NOT NULL ,
        Priority Varchar (255) NOT NULL
	,CONSTRAINT Prioriy_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Category
#------------------------------------------------------------

CREATE TABLE Category(
        Id   Int  Auto_increment  NOT NULL ,
        Name Varchar (255) NOT NULL
	,CONSTRAINT Category_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Avoir
#------------------------------------------------------------

CREATE TABLE Avoir(
        Id       Int NOT NULL ,
        Id_Tache Int NOT NULL
	,CONSTRAINT Avoir_PK PRIMARY KEY (Id,Id_Tache)

	,CONSTRAINT Avoir_Category_FK FOREIGN KEY (Id) REFERENCES Category(Id)
	,CONSTRAINT Avoir_Tache0_FK FOREIGN KEY (Id_Tache) REFERENCES Tache(Id)
)ENGINE=InnoDB;

