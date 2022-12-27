USE `estacionamento`;
SELECT * FROM entrada_saida; -- INNER JOIN veiculos ON veiculos.id = entrada_saida.veiculo;
SELECT * FROM entrada_saida INNER JOIN veiculos ON veiculos.id = entrada_saida.id AND CAST( now() AS Date ) = CAST(entrada_saida.hr_entrada AS Date) ORDER BY entrada_saida.hr_entrada;
SELECT * FROM entrada_saida INNER JOIN veiculos ON veiculos.id = entrada_saida.veiculo AND CAST( now() AS Date ) = CAST( entrada_saida.hr_entrada AS Date ) ORDER BY entrada_saida.hr_entrada;
SET SQL_SAFE_UPDATES = 0;
DELETE FROM entrada_saida WHERE 1 = 1;
SELECT now();