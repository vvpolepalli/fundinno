package com.oneoverpi.fundinno.data;

public class UserRepositoryException extends RuntimeException {

	private static final long serialVersionUID = -6100686408974376229L;

	public UserRepositoryException() {
	}

	public UserRepositoryException(String message) {
		super(message);
	}

	public UserRepositoryException(Throwable cause) {
		super(cause);
	}

	public UserRepositoryException(String message, Throwable cause) {
		super(message, cause);
	}

	public UserRepositoryException(String message, Throwable cause, boolean enableSuppression,
			boolean writableStackTrace) {
		super(message, cause, enableSuppression, writableStackTrace);
	}

}