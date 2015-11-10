
CREATE TABLE messages (
  id 					BIGSERIAL PRIMARY KEY,
  name        VARCHAR(40) NOT NULL,
  message     TEXT NOT NULL,
  image       TEXT,
  created     TIMESTAMP DEFAULT now()
);
