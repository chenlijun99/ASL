CREATE TABLE StudentClassMemberships (
	studentClass INTEGER  NOT NULL,
	student CHAR(16) NOT NULL,
	startDate DATE NOT NULL,
	endDate DATE NOT NULL,

	PRIMARY KEY(studentClass, student),
	FOREIGN KEY (studentClass) REFERENCES StudentClasses(id)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY (student) REFERENCES Students(cf)
		ON UPDATE CASCADE
		ON DELETE CASCADE
);
