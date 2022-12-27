USE `estacionamento`;
SELECT * FROM `veiculos`;
SELECT id FROM veiculos WHERE placa = 'ASD1A23';

SELECT * FROM entrada_saida INNER JOIN veiculos ON veiculos.id = entrada_saida.veiculo;

SELECT * FROM entrada_saida INNER JOIN veiculos 
ON veiculos.id = entrada_saida.veiculo AND 
CAST( now() AS Date ) = CAST( entrada_saida.hr_entrada AS Date )
ORDER BY entrada_saida.hr_entrada;