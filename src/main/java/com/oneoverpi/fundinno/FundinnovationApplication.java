package com.oneoverpi.fundinno;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.EnableAspectJAutoProxy;

@SpringBootApplication
@EnableAspectJAutoProxy
public class FundinnovationApplication {
	Logger logger = LoggerFactory.getLogger(FundinnovationApplication.class);
	
	public static void main(String[] args) {
		SpringApplication.run(FundinnovationApplication.class, args);
	}
}