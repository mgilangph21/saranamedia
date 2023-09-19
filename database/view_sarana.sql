DROP PROCEDURE IF EXISTS getAgregate;
DELIMITER $$

CREATE PROCEDURE getAgregate(
	tbl INTEGER
) 
BEGIN
IF tbl = 1 THEN
	SELECT 
		COUNT(CASE WHEN b.status = 'Y' THEN 1 ELSE NULL END) AS tersedia,
		COUNT(CASE WHEN b.status = 'N' THEN 1 ELSE NULL END) AS tdk_tersedia,
		COUNT(*) AS total
	FROM billboard AS b;
ELSEIF tbl = 2 THEN
	SELECT 
		COUNT(CASE WHEN b.status = 'Y' THEN 1 ELSE NULL END) AS tersedia,
		COUNT(CASE WHEN b.status = 'N' THEN 1 ELSE NULL END) AS tdk_tersedia,
		COUNT(*) AS total
	FROM led AS b;
ELSE 
	SELECT 
		COUNT(CASE WHEN b.status = 'Y' THEN 1 ELSE NULL END) AS tersedia,
		COUNT(CASE WHEN b.status = 'N' THEN 1 ELSE NULL END) AS tdk_tersedia,
		COUNT(*) AS total
	FROM jpo AS b;
END IF;
END$$
DELIMITER ;


-- view
CREATE OR REPLACE VIEW v_all
AS
(SELECT *, (SELECT 'bill') AS tipe
FROM billboard)
UNION
(SELECT *, (SELECT 'led') AS tipe
FROM led)
UNION
(SELECT *, (SELECT 'jpo') AS tipe
FROM jpo);