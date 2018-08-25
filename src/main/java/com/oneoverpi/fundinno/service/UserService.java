package com.oneoverpi.fundinno.service;

import java.util.Set;

import javax.transaction.Transactional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.oneoverpi.fundinno.api.UserInt;
import com.oneoverpi.fundinno.api.exceptions.DataException;
import com.oneoverpi.fundinno.api.exceptions.DuplicateDataException;
import com.oneoverpi.fundinno.api.exceptions.InvalidDataException;
import com.oneoverpi.fundinno.api.model.UserData;
import com.oneoverpi.fundinno.data.UserRepository;
import com.oneoverpi.fundinno.data.UserRepositoryException;

@Service
public class UserService implements UserInt{
	
	@Autowired
	private UserRepository userRepo;

	@Override
	@Transactional
	public UserData createAccount(UserData user) throws InvalidDataException, DataException {
		if (user == null)
			throw new InvalidDataException("User Data is null");
		if(user.getUserName() == null)
			throw new InvalidDataException("User name is null");
		if(user.getUserName().trim().length() == 0)
			throw new InvalidDataException("User name is empty");
		if(user.getAddress() == null)
			throw new InvalidDataException("User address is null");
		if(user.getAddress().getAddress() == null)
			throw new InvalidDataException("User address field is null");
		if(user.getAddress().getAddress().trim().length() == 0)
			throw new InvalidDataException("User address field is empty");
		if(user.getAddress().getPhoneNumber() == null)
			throw new InvalidDataException("User Phone number field is null");
		if(user.getAddress().getPhoneNumber().trim().length() == 0)
			throw new DuplicateDataException("User Phone number field is empty");
		
		UserData existingUser = find(123);
		
		if(user.getAddress().getPhoneNumber().equalsIgnoreCase(existingUser.getAddress().getPhoneNumber()))
			throw new UserRepositoryException("User Phone number field is empty");
		
		return userRepo.save(user);
		
	}

	@Override
	@Transactional
	public UserData find(int userId) throws DataException {
		UserData userData = userRepo.findById(userId).orElse(null);
		return userData;
	}

	@Override
	@Transactional
	public Set<UserData> search(String key) throws DataException {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public UserData findByPhoneNumber(String phoneNumber) throws DataException {
		// TODO Auto-generated method stub
		return null;
	}
}
