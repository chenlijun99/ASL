CREATE TABLE Profiles (
	cf CHAR(16) NOT NULL PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	surname VARCHAR(64) NOT NULL,
	account INTEGER,

	FOREIGN KEY (account) REFERENCES Users(id)
		ON UPDATE CASCADE
		ON DELETE CASCADE
);