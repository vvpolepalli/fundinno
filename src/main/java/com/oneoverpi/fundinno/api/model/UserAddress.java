package com.oneoverpi.fundinno.api.model;

import javax.persistence.Embeddable;

@Embeddable
public class UserAddress {
	
	private String address;
	private String phoneNumber;
	
	public UserAddress() {
		
	}
	
	public UserAddress(String address, String phoneNumber) {
		this.address = address;
		this.phoneNumber = phoneNumber;
	}

	public String getAddress() {
		return address;
	}

	public void setAddress(String address) {
		this.address = address;
	}

	public String getPhoneNumber() {
		return phoneNumber;
	}

	public void setPhoneNumber(String phoneNumber) {
		this.phoneNumber = phoneNumber;
	}
	
}
