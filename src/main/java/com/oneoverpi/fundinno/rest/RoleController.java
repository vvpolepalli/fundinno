package com.oneoverpi.fundinno.rest;

import java.util.List;

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

import com.oneoverpi.fundinno.api.RoleInt;
import com.oneoverpi.fundinno.api.exceptions.DataException;
import com.oneoverpi.fundinno.api.exceptions.InvalidDataException;
import com.oneoverpi.fundinno.api.model.RoleData;

@RestController
@RequestMapping("/fundinno")
public class RoleController {
	Logger logger = LoggerFactory.getLogger(RoleController.class);
	
	@Autowired
	private RoleInt roleService;
	
	@RequestMapping(value="/role", method=RequestMethod.POST)
	public ResponseEntity<RoleData> add(@RequestBody RoleData role, UriComponentsBuilder builder) {
		logger.debug("Creating role for: "+role);
		
		try {
			RoleData roleData = roleService.createRole(role);
			HttpHeaders headers = new HttpHeaders();
			headers.setLocation(builder.path("/fundinno/role/{id}").buildAndExpand(roleData.getId()).toUri());
			return new ResponseEntity<RoleData>(roleData, headers, HttpStatus.CREATED);
		} catch(InvalidDataException ice) {
			return new ResponseEntity<>(HttpStatus.BAD_REQUEST);
		} catch (DataException be) {
			return new ResponseEntity<>(HttpStatus.BAD_REQUEST);
		}
	}
	
	@RequestMapping(value="/role/{id}", method=RequestMethod.GET)
	public ResponseEntity<RoleData> get(@PathVariable("id") int id) {
		logger.debug("Finding role for id: "+id);
		try {
			RoleData roleData = roleService.find(id);
			return new ResponseEntity<>(roleData, HttpStatus.OK);
		} catch (DataException be) {
			return new ResponseEntity<>(HttpStatus.BAD_REQUEST);
		}
		
	}
	
	@RequestMapping(value="/roles", method=RequestMethod.GET) 
	public ResponseEntity<List<RoleData>> getAll() {
		logger.debug("Finding all roles");
		try {
			List<RoleData> roles = roleService.findAllRoles();
			return new ResponseEntity<>(roles, HttpStatus.OK);
		} catch (DataException be) {
			return new ResponseEntity<>(HttpStatus.BAD_REQUEST);
		}
		
	}
}
