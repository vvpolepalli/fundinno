package com.oneoverpi.fundinno.data;

public class RoleRepositoryException extends RuntimeException {

	private static final long serialVersionUID = -6100686408974376229L;

	public RoleRepositoryException() {
	}

	public RoleRepositoryException(String message) {
		super(message);
	}

	public RoleRepositoryException(Throwable cause) {
		super(cause);
	}

	public RoleRepositoryException(String message, Throwable cause) {
		super(message, cause);
	}

	public RoleRepositoryException(String message, Throwable cause, boolean enableSuppression,
			boolean writableStackTrace) {
		super(message, cause, enableSuppression, writableStackTrace);
	}

}