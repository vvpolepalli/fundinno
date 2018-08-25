package com.oneoverpi.fundinno.service;

import java.util.List;
import java.util.Set;

import javax.transaction.Transactional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.oneoverpi.fundinno.api.RoleInt;
import com.oneoverpi.fundinno.api.exceptions.DataException;
import com.oneoverpi.fundinno.api.exceptions.DuplicateDataException;
import com.oneoverpi.fundinno.api.exceptions.InvalidDataException;
import com.oneoverpi.fundinno.api.model.RoleData;
import com.oneoverpi.fundinno.data.RoleRepository;

@Service
public class RoleService implements RoleInt{
	
	@Autowired
	private RoleRepository roleRepo;

	@Override
	@Transactional
	public RoleData createRole(RoleData role) throws DuplicateDataException, InvalidDataException, DataException {
		if (role == null)
			throw new InvalidDataException("Role Data is null");
		if(role.getRole() == null)
			throw new InvalidDataException("Role name is null");
		if(role.getRole().trim().length() == 0)
			throw new InvalidDataException("Role name is empty");

		/*RoleData existingRole = find(1);
		if(role.getRole().equalsIgnoreCase(existingRole.getRole()))
			throw new DuplicateDataException("Role Already exists");*/
		
		return roleRepo.save(role);
	}

	@Override
	@Transactional
	public RoleData find(int roleId) throws DataException {
		RoleData roleData = roleRepo.findById(roleId).orElse(null);
		return roleData;
	}

	@Override
	@Transactional
	public RoleData findByRole(String roleName) throws DataException {
		// TODO Auto-generated method stub
		return null;
	}
	
	@Override
	@Transactional
	public List<RoleData> findAllRoles() throws DataException {
		List<RoleData> roles = roleRepo.findAll();
		return roles;
	}

	@Override
	@Transactional
	public Set<RoleData> search(String key) throws DataException {
		// TODO Auto-generated method stub
		return null;
	}

}
