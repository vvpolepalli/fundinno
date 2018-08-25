package com.oneoverpi.fundinno.api.model;

import java.util.Date;
import java.util.HashSet;
import java.util.Set;

import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;

@Entity
public class RoleData {
	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private int id;
	private String role;
	private String roleDescription;
	@OneToMany(cascade = CascadeType.ALL, fetch = FetchType.LAZY)
	private Set<UserData> users = new HashSet<>();;
	
	public RoleData() {
		
	}
	
	public RoleData(String role, String roleDescription) {
		this.role = role;
		this.roleDescription = roleDescription;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getRole() {
		return role;
	}

	public void setRole(String role) {
		this.role = role;
	}

	public String getRoleDescription() {
		return roleDescription;
	}

	public void setRoleDescription(String roleDescription) {
		this.roleDescription = roleDescription;
	}

	public Set<UserData> getUsers() {
		return users;
	}
	
}
