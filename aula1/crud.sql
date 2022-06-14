USE db_escola;


INSERT INTO tb_professor (nome, email, cpf)
VALUES ('Marcelo','marcelo@email.com','12345678912');


INSERT INTO tb_professor (nome, email, cpf) VALUES
('Ricardo','ricardo@email.com','12345678914'),
('Osvaldo','osvaldo@email.com','12345678915'),
('Lucas','lucas@email.com','12345678916');


DELETE FROM tb_professor WHERE id='1';


DELETE FROM tb_professor;


UPDATE tb_professor SET nome='Miqueias' WHERE cpf='14312311128';


UPDATE tb_professor SET nome='Marcos';


SELECT * FROM tb_professor;


SELECT * FROM tb_professor WHERE id='2';

SELECT nome, cpf FROM tb_professor;