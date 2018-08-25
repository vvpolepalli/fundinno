package com.oneoverpi.fundinno.aspects;

import org.aspectj.lang.ProceedingJoinPoint;
import org.aspectj.lang.annotation.Around;
import org.aspectj.lang.annotation.Aspect;
import org.springframework.core.annotation.Order;
import org.springframework.stereotype.Component;

@Aspect
@Component
@Order(3)
public class Validator {
	@Around("execution(* com.venkat.spring.bank.service.*.*(..))")
	public Object validate(ProceedingJoinPoint joinPoint) throws Throwable {
		return joinPoint.proceed();
	}
}
