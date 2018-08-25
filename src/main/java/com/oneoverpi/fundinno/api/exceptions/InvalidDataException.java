package com.oneoverpi.fundinno.api.exceptions;

public class InvalidDataException extends DataException {
	
	private static final long serialVersionUID = -8695246778866582843L;

	public InvalidDataException() {
	}

	public InvalidDataException(String message) {
		super(message);
	}

	public InvalidDataException(Throwable cause) {
		super(cause);
	}

	public InvalidDataException(String message, Throwable cause) {
		super(message, cause);
	}

	public InvalidDataException(String message, Throwable cause, boolean enableSuppression,
			boolean writableStackTrace) {
		super(message, cause, enableSuppression, writableStackTrace);
	}

}
