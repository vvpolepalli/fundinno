package com.oneoverpi.fundinno.api;

import java.util.Set;

import com.oneoverpi.fundinno.api.exceptions.DuplicateDataException;
import com.oneoverpi.fundinno.api.exceptions.InvalidDataException;
import com.oneoverpi.fundinno.api.exceptions.DataException;
import com.oneoverpi.fundinno.api.model.UserData;

public interface UserInt {
	public UserData createAccount(UserData userData) throws DuplicateDataException, InvalidDataException, DataException;	
	public UserData find(int userId) throws DataException;
	public UserData findByPhoneNumber(String phoneNumber) throws DataException;
	public Set<UserData> search(String key) throws DataException;
}