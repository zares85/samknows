DROP TABLE IF EXISTS download;
DROP TABLE IF EXISTS upload;
DROP TABLE IF EXISTS latency;
DROP TABLE IF EXISTS packet_loss;

CREATE TABLE download (
  unit_id INT NOT NULL,
  ts TIMESTAMP NOT NULL,
  value INT,
);

CREATE TABLE upload (
  unit_id INT NOT NULL,
  ts TIMESTAMP NOT NULL,
  value INT,
);

CREATE TABLE latency (
  unit_id INT NOT NULL,
  ts TIMESTAMP NOT NULL,
  value INT,
);

CREATE TABLE packet_loss (
  unit_id INT NOT NULL,
  ts TIMESTAMP NOT NULL,
  value FLOAT,
);

CREATE UNIQUE INDEX download_idx ON metric (
  unit_id,
  ts
);

CREATE UNIQUE INDEX upload_idx ON metric (
  unit_id,
  ts
);

CREATE UNIQUE INDEX latency_idx ON metric (
  unit_id,
  ts
);

CREATE UNIQUE INDEX packet_loss_idx ON metric (
  unit_id,
  ts
);