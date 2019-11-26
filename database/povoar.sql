
INSERT INTO Calendario (
                           idInd,
                           idMoradia
                       )
                       VALUES (
                           1215,
                           455182
                       );

INSERT INTO Comodidade (
                           idComodidade,
                           tipo
                       )
                       VALUES (
                           154557,
                           'Apartamento'
                       );


INSERT INTO Critica (
                        comentario,
                        rating,
                        idUtilizador,
                        idMoradia
                    )
                    VALUES (
                        'Fantástico! 5*',
                        5,
                        1,
                        455182
                    );


INSERT INTO ImagemMoradia (
                              caminho
                          )
                          VALUES (
                              455182
                          );

INSERT INTO ImagemUtilizador (
                                 idImage,
                                 idUtilizador
                             )
                             VALUES (
                                 1521,
                                 1
                             );

INSERT INTO Indisponibilidade (
                                  idInd,
                                  dataInicio,
                                  dataFim
                              )
                              VALUES (
                                  1215,
                                  '2019-05-01',
                                  '2019-05-05'
                              );

INSERT INTO Moradia (
                        idMoradia,
                        nome,
                        preco,
                        localizacao,
                        tipo,
                        cancelamento,
                        rating,
                        idUtilizador
                    )
                    VALUES (
                        455182,
                        'Suite Apartment',
                        120,
                        'Lisboa',
                        'Apartamento',
                        'Sim',
                        '5',
                        1
                    );

INSERT INTO MoradiaComodidade (
                                  idMoradia,
                                  idComodidade
                              )
                              VALUES (
                                  455182,
                                  154557
                              );

INSERT INTO Reserva (
                        idReserva,
                        precoTotal,
                        dataInicio,
                        dataFim,
                        idMoradia,
                        idUtilizador
                    )
                    VALUES (
                        2019152,
                        '587,99',
                        '2019-05-01',
                        '2019-05-05',
                        455182,
                        1
                    );

INSERT INTO Utilizador (
                           idUtilizador,
                           username,
                           nomeCompleto,
						   email,
                           password,
                           dataNasc,
                           cartaoCred,
                           imagem,
                           idImage
                       )
                       VALUES (
                           1,
                           'joaonunes999',
                           'João Paulo Ribeiro Nunes',
						   'joaopaulo_n@hotmail.com',
                           'b013a5c475a3838d8628690e0e89845526912b4eca4ccadd143caa61d8f7b3fd',
                           '1999-09-02',
                           '4714144125892589',
                           'https://bompenteados.com/wp-content/uploads/2018/04/fcf0bf8ef14804fa059853968871d654.jpeg',
                           1521
                       );
