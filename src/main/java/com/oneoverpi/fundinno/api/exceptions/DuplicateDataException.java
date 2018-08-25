package com.oneoverpi.fundinno.api.exceptions;

public class DuplicateDataException extends DataException {
	
	private static final long serialVersionUID = -8695246778866582843L;

	public DuplicateDataException() {
	}

	public DuplicateDataException(String message) {
		super(message);
	}

	public DuplicateDataException(Throwable cause) {
		super(cause);
	}

	public DuplicateDataException(String message, Throwable cause) {
		super(message, cause);
	}

	public DuplicateDataException(String message, Throwable cause, boolean enableSuppression,
			boolean writableStackTrace) {
		super(message, cause, enableSuppression, writableStackTrace);
	}

}
