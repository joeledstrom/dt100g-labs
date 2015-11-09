
CREATE TABLE messages (
  id 					BIGSERIAL PRIMARY KEY,
  name        VARCHAR(40) NOT NULL,
  message     TEXT NOT NULL,
  image       BYTEA,
  created     TIMESTAMP DEFAULT now()
);

INSERT INTO messages(name, message) VALUES ('Joel', 'Hejsan');
