CREATE TABLE 'produtos' (

    'id' int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    'nome' varchar(100),
    'quantidade' varchar(100),
    'valor' decimal(10,2),
    'modelo' varchar(100)


)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE 'atores' (

    'id' int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    'nome' varchar(10),
    'datanascimento' datatime DEFAULT NULL
    


)ENGINE=InnoDB DEFAULT CHARSET=utf8;
