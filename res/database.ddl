DROP TABLE IF EXISTS metric;

CREATE TABLE metric (
  unit_id INT NOT NULL,
  ts TIMESTAMP NOT NULL,
  download INT,
  upload INT,
  latency INT,
  packet_loss FLOAT
);

CREATE UNIQUE INDEX metric_idx ON metric (
  unit_id,
  ts
);