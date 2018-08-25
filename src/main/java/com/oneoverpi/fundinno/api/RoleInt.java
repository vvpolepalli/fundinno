package com.oneoverpi.fundinno.api;

import java.util.List;
import java.util.Set;

import com.oneoverpi.fundinno.api.exceptions.DataException;
import com.oneoverpi.fundinno.api.exceptions.DuplicateDataException;
import com.oneoverpi.fundinno.api.exceptions.InvalidDataException;
import com.oneoverpi.fundinno.api.model.RoleData;

public interface RoleInt {	
	public RoleData createRole(RoleData userRole) throws DuplicateDataException, InvalidDataException, DataException;
	public RoleData find(int userId) throws DataException;
	public RoleData findByRole(String roleName) throws DataException;
	public List<RoleData> findAllRoles() throws DataException;
	public Set<RoleData> search(String key) throws DataException;
}
