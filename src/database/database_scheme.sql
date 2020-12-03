DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS UserFavoritePets;
DROP TABLE IF EXISTS AdoptionPosts;
DROP TABLE IF EXISTS Pets;
DROP TABLE IF EXISTS PetSpecies;
DROP TABLE IF EXISTS Comments;

CREATE TABLE Users (
    UserID INTEGER PRIMARY KEY,
    Username TEXT,  
    Password TEXT,
    Name TEXT,
    ProfilePicture TEXT
);

CREATE TABLE UserFavoritePets (
    UserID INTEGER REFERENCES User(UserID),
    PetID INTEGER REFERENCES Pets(PetID),
    PRIMARY KEY (UserID, PetID)
);

CREATE TABLE Pets (
    PetID INTEGER PRIMARY KEY,
    Name TEXT,
    Gender INTEGER,
    Age INTEGER,
    Photo TEXT, 
    SpeciesID INTEGER REFERENCES PetSpecies(ID),
    AdoptionPostID INTEGER REFERENCES AdoptionPosts(ID)
);

CREATE TABLE PetSpecies (
    PetSpeciesID INTEGER PRIMARY KEY,
    SpeciesName TEXT,
    Symbol TEXT
);

CREATE TABLE AdoptionPosts (
    AdoptionPostID INTEGER PRIMARY KEY,
    Title TEXT,
    Description TEXT,
    Location TEXT
);

CREATE TABLE Comments (
    ID INTEGER PRIMARY KEY,
    Text TEXT,
    AdoptionPostID INTEGER REFERENCES AdoptionPosts(AdoptionPostID),
    AuthorID INTEGER REFERENCES Users(UserID)
);

