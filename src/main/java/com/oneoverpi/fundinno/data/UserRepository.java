package com.oneoverpi.fundinno.data;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.oneoverpi.fundinno.api.model.UserData;

@Repository
public interface UserRepository extends JpaRepository<UserData, Integer>{
	
}