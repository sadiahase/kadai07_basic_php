INSERT INTO phoform(name,email,person_name,point,comment)VALUES('test1', 'test1@test.jp', 'test', 0, 'test',sysdate());

INSERT INTO phoform(name,email,person_name,point,comment)VALUES('test2', 'test2@test.jp', 'test', 0, 'test',sysdate());

INSERT INTO phoform(name,email,person_name,point,comment)VALUES('test3', 'test3@test.jp', 'test', 0, 'test',sysdate());

INSERT INTO phoform(name,email,person_name,point,comment)VALUES(:name,:email,:personname,:point,:comment,sysdate());

SELECT * FROM `phoform`;
