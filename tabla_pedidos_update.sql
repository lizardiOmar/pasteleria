ALTER TABLE `pasteleria_bd`.`pedidos` 
ADD COLUMN `usuario` INT(11) NOT NULL AFTER `estado`;


ALTER TABLE `pasteleria_bd`.`pedidos` 
ADD CONSTRAINT `pedidos_usuarios`
  FOREIGN KEY (`usuario`)
  REFERENCES `pasteleria_bd`.`usuarios` (`ID`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
