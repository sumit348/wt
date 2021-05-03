package entity;

import java.lang.*;

public class Seller
{
	private String sellerId;
	private String name;
	private String joiningYear;
	private double salary;
	
	public Seller(){}
	public Seller(String sellerId, String name, String joiningYear, double salary)
	{
		this.sellerId = sellerId;
		this.name = name;
		this.joiningYear = joiningYear;
		this.salary = salary;
	}
	
	public void setSellerId(String sellerId){this.sellerId = sellerId;}
	public void setName(String name){this.name = name;}
	public void setJoiningYear(String joiningYear){this.joiningYear = joiningYear;}
	public void setSalary(double salary){this.salary = salary;}
	
	public String getSellerId(){return sellerId;}
	public String getName(){return name;}
	public String getJoiningYear(){return joiningYear;}
	public double getSalary(){return salary;}
}