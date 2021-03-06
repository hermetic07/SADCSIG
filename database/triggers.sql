DELIMITER //
CREATE TRIGGER after_guardreplc_insert AFTER INSERT 
ON guard_replacement_requests FOR EACH ROW
	BEGIN
		INSERT INTO client_sent_requests(requestID, changeType, changeTime, requestType,trans_status,clientID)
		VALUES(NEW.requestID,'NEW',NOW(),'GUARD REPLACEMENT','SENT',NEW.clients_id);
	END //

DELIMITER ;

DELIMITER //
CREATE TRIGGER after_servreq_insert AFTER INSERT 
ON service_requests FOR EACH ROW
	BEGIN
		INSERT INTO client_sent_requests(requestID, changeType, changeTime, requestType,trans_status,clientID)
		VALUES(NEW.id,'NEW',NOW(),'SERVICE REQUEST','SENT',NEW.client_id);
	END //

DELIMITER ;
DELIMITER //
CREATE TRIGGER after_addguard_insert AFTER INSERT 
ON add_guard_requests FOR EACH ROW
	BEGIN
		INSERT INTO client_sent_requests(requestID, changeType, changeTime, requestType,trans_status,clientID)
		VALUES(NEW.id,'NEW',NOW(),'ADDGUARD REQUEST','SENT',NEW.client_id);
	END //

DELIMITER ;

DELIMITER //
CREATE TRIGGER after_gunreq_insert AFTER INSERT 
ON tblgunrequests FOR EACH ROW
	BEGIN
		INSERT INTO client_sent_requests(requestID, changeType, changeTime, requestType,trans_status,clientID)
		VALUES(NEW.strGunReqID,'NEW',NOW(),'ADDGUN REQUEST','SENT',NEW.strClientID);
	END //

DELIMITER ;

DELIMITER //
CREATE TRIGGER after_guardreplc_update AFTER UPDATE 
ON guard_replacement_requests FOR EACH ROW
	BEGIN
		IF NEW.status = "done" THEN 
			SET @trans_status = "done";
		ELSEIF NEW.status = "c_cancel" THEN
			SET @trans_status = "canceled";
		ELSEIF NEW.status = "a_cancel" THEN
			SET @trans_status = "canceled";
        END IF;    
		INSERT INTO client_sent_requests(requestID, changeType, changeTime, requestType,trans_status,clientID)
		VALUES(NEW.requestID,'EDIT',NOW(),'GUARD REPLACEMENT',@trans_status,NEW.clients_id);
	END //

DELIMITER ;

DELIMITER //
CREATE TRIGGER after_addguardrequest_update AFTER UPDATE 
ON add_guard_requests FOR EACH ROW
	BEGIN
		IF NEW.status = "done" THEN 
			SET @trans_status = "done";
		ELSEIF NEW.status = "c_cancel" THEN
			SET @trans_status = "canceled";
		ELSEIF NEW.status = "a_cancel" THEN
			SET @trans_status = "canceled";
        END IF;    
		INSERT INTO client_sent_requests(requestID, changeType, changeTime, requestType,trans_status,clientID)
		VALUES(NEW.id,'EDIT',NOW(),'ADDGUARD REQUEST',@trans_status,NEW.client_id);
	END //

DELIMITER ;
DELIMITER //
CREATE TRIGGER after_servicerequest_update AFTER UPDATE 
ON service_requests FOR EACH ROW
	BEGIN
		IF NEW.status = "done" THEN 
			SET @trans_status = "done";
		ELSEIF NEW.status = "c_cancel" THEN
			SET @trans_status = "canceled";
		ELSEIF NEW.status = "a_cancel" THEN
			SET @trans_status = "canceled";
        END IF;    
		INSERT INTO client_sent_requests(requestID, changeType, changeTime, requestType,trans_status,clientID)
		VALUES(NEW.id,'EDIT',NOW(),'SERVICE REQUEST',@trans_status,NEW.client_id);
	END //

DELIMITER ;
DELIMITER //
CREATE TRIGGER after_addgunrequest_update AFTER UPDATE 
ON tblgunrequests FOR EACH ROW
	BEGIN
		IF NEW.status = "done" THEN 
			SET @trans_status = "done";
		ELSEIF NEW.status = "c_cancel" THEN
			SET @trans_status = "canceled";
		ELSEIF NEW.status = "a_cancel" THEN
			SET @trans_status = "canceled";
        END IF;    
		INSERT INTO client_sent_requests(requestID, changeType, changeTime, requestType,trans_status,clientID)
		VALUES(NEW.strGunReqID,'EDIT',NOW(),'ADDGUN REQUEST',@trans_status,NEW.strClientID);
	END //

DELIMITER ;
