USE smart_wallet;

--
-- insert into table categorias
--
INSERT INTO categorias VALUES(null, 'Trizer');
INSERT INTO categorias VALUES(null, 'Cold Card');
INSERT INTO categorias VALUES(null, 'Lidger Nano');

--
-- insert into table productos
--
INSERT INTO productos VALUES(NULL, 1, 'Trizer Model T', 'Entrada de claves solamente en la pantalla de tu Trizer Model T', 149, 100, 'no', CURDATE(), 'trezor1.jpg'  );
INSERT INTO productos VALUES(NULL, 2, 'Cold Card', 'La única billetera de hardware con opción de nunca estar conectada a un ordenador, para un modo completamente off-line: Desde la generación de semillas hasta la firma de transacciones. !Utiliza PSBT (BIP174) de forma nativa!', 109.97, 100, 'no', CURDATE(), 'coldcard1.jpg'  );
INSERT INTO productos VALUES(NULL, 3, 'Lidger Nano X', 'El Lidger Nano X es un dispositivo seguro con Bluethoth que almacena sus claves privadas. Asegúrese de que todos sus activos de cifrado estén seguros,donde quiera que vaya', 119, 100, 'no', CURDATE(), 'lidgernano1.jpg'  );

--
-- insert into table usuarios
--
INSERT INTO usuarios VALUES(null, 'Sergio', 'Díaz', 'admin@admin.com', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', 'admin', null);

