package com.oneoverpi.fundinno.rest;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.util.UriComponentsBuilder;

import com.oneoverpi.fundinno.api.UserInt;
import com.oneoverpi.fundinno.api.exceptions.DataException;
import com.oneoverpi.fundinno.api.exceptions.InvalidDataException;
import com.oneoverpi.fundinno.api.model.UserData;

@RestController
@RequestMapping("/fundinno")
public class UserController {
	Logger logger = LoggerFactory.getLogger(UserController.class);
	
	@Autowired
	private UserInt userService;
	
	@RequestMapping(value="/user", method=RequestMethod.POST)
	public ResponseEntity<UserData> add(@RequestBody UserData user, UriComponentsBuilder builder) {
		logger.debug("Creating account for: "+user);
		
		try {
			UserData userData = userService.createAccount(user);
			HttpHeaders headers = new HttpHeaders();
			headers.setLocation(builder.path("/fundinno/user/{id}").buildAndExpand(userData.getId()).toUri());
			return new ResponseEntity<UserData>(userData, headers, HttpStatus.CREATED);
		} catch(InvalidDataException ice) {
			return new ResponseEntity<>(HttpStatus.BAD_REQUEST);
		} catch (DataException be) {
			return new ResponseEntity<>(HttpStatus.BAD_REQUEST);
		}
	}
	
	@RequestMapping(value="/user/{id}", method=RequestMethod.GET) 
	public ResponseEntity<UserData> get(@PathVariable("id") int id) {
		logger.debug("Finding account for id: "+id);
		try {
			UserData userData = userService.find(id);
			return new ResponseEntity<>(userData, HttpStatus.OK);
		} catch (DataException be) {
			return new ResponseEntity<>(HttpStatus.BAD_REQUEST);
		}
		
	}
}
