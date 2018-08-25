package com.oneoverpi.fundinno.data;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.oneoverpi.fundinno.api.model.RoleData;

@Repository
public interface RoleRepository extends JpaRepository<RoleData, Integer>{

}
