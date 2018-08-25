package com.oneoverpi.fundinno.api.model;

import javax.persistence.CascadeType;
import javax.persistence.Embedded;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;

@Entity
public class UserData {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)	
	private int id;
	private String userName;
	private String firstName;
	private String lastName;	
	@Embedded
	private UserAddress userAddress;
	@ManyToOne(cascade = CascadeType.ALL, fetch = FetchType.LAZY)
	private RoleData role;
	
	public UserData() {
		
	}
	
	public UserData(String userName, String firstName, String lastName, UserAddress userAddress, RoleData role) {
		this.userName = userName;
		this.firstName = firstName;
		this.lastName = lastName;
		this.userAddress = userAddress;
		this.role = role;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getUserName() {
		return userName;
	}

	public void setUserName(String userName) {
		this.userName = userName;
	}

	public String getFirstName() {
		return firstName;
	}

	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}

	public String getLastName() {
		return lastName;
	}

	public void setLastName(String lastName) {
		this.lastName = lastName;
	}

	public UserAddress getAddress() {
		return userAddress;
	}

	public void setAddress(UserAddress userAddress) {
		this.userAddress = userAddress;
	}

	public RoleData getRole() {
		return role;
	}

	public void setRole(RoleData role) {
		this.role = role;
	}
	
}
