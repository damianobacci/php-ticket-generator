DROP TABLE IF EXISTS events;

CREATE TABLE events (
	id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	name VARCHAR NOT NULL,
	date VARCHAR NOT NULL,
	location VARCHAR NOT NULL
);

INSERT INTO
	events
	(
		name, date, location
	)
	VALUES
	(
		"Tech Conference 2024", datetime('now', '+3 months'), "Silicon Valley Arena"
	)
;

INSERT INTO
	events
	(
		name, date, location
	)
	VALUES
	(
		"Tech Conference 2025", datetime('now', '+15 months'), "Silicon Valley Arena"
	)
;

INSERT INTO
	events
	(
		name, date, location
	)
	VALUES
	(
		"Tech Conference 2026", datetime('now', '+27 months'), "Silicon Valley Arena"
	)
;