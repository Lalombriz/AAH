DELIMITER !!

create trigger nuevo_recepcion
before insert on recepcion
for each row
begin
	set new.fecha = current_date();
end;!!

DELIMITER ;
