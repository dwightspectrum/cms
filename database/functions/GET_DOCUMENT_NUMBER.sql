CREATE FUNCTION `GET_DOCUMENT_NUMBER`(
    `prefix` VARCHAR(14),
    `document_number` BIGINT,
    `document_date` DATE,
    `document_version` INT,
    `extension` VARCHAR(14)
) RETURNS varchar(125) CHARSET utf8
   NO SQL
   DETERMINISTIC
BEGIN
   DECLARE numberStr VARCHAR(125);

   SET numberStr = CONCAT(prefix, ".", RIGHT(YEAR(document_date), 3), ".", document_number);

   IF (document_version != -1) THEN
       SET numberStr = CONCAT(numberStr, ".", LPAD(document_version, 2, "0"));
   END IF;

   IF (YEAR(document_date) >= 2021) THEN
       SET numberStr = CONCAT(numberStr, ".", extension);
   END IF;

   RETURN numberStr;
END