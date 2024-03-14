#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE tdl_User(
        ID        Int  Auto_increment  NOT NULL ,
        NAME_USER Varchar (50) NOT NULL ,
        LASTNAME  Varchar (50) NOT NULL ,
        PASSWORD  Varchar (255) NOT NULL ,
        EMAIL     Varchar (100) NOT NULL
	,CONSTRAINT tdl_User_AK UNIQUE (EMAIL)
	,CONSTRAINT tdl_User_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Priority
#------------------------------------------------------------

CREATE TABLE tdl_Priority(
        ID       Int  Auto_increment  NOT NULL ,
        PRIORITY Varchar (255) NOT NULL
	,CONSTRAINT tdl_Priority_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Task
#------------------------------------------------------------

CREATE TABLE tdl_Task(
        ID         Int  Auto_increment  NOT NULL ,
        TITLE      Varchar (50) NOT NULL ,
        TASK       Varchar (255) NOT NULL ,
        VALID      tinyint NOT NULL ,
        ID_USER    Int NOT NULL ,
        ID_PRIORITY Int NOT NULL
	,CONSTRAINT tdl_Task_PK PRIMARY KEY (ID)

	,CONSTRAINT tdl_Task_tdl_User_FK FOREIGN KEY (ID_USER) REFERENCES tdl_User(ID)
	,CONSTRAINT tdl_Task_tdl_Priority0_FK FOREIGN KEY (ID_PRIORITY) REFERENCES tdl_Priority(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Category
#------------------------------------------------------------

CREATE TABLE tdl_Category(
        ID   Int  Auto_increment  NOT NULL ,
        NAME Varchar (255) NOT NULL
	,CONSTRAINT tdl_Category_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Avoir
#------------------------------------------------------------

CREATE TABLE tdl_AVOIR(
        ID      Int NOT NULL ,
        ID_TASK Int NOT NULL
	,CONSTRAINT AVOIR_PK PRIMARY KEY (ID,ID_TASK)

	,CONSTRAINT AVOIR_tdl_Category_FK FOREIGN KEY (ID) REFERENCES tdl_Category(ID)
	,CONSTRAINT AVOIR_tdl_Task0_FK FOREIGN KEY (ID_TASK) REFERENCES tdl_Task(ID)
)ENGINE=InnoDB;

