package entity;

import java.lang.*;

public class Burger
{
	private int burgerId;
	private String name;
	private int price;
	
	public Burger(){}
	public Burger(int burgerId, String name, int price)
	{
		this.burgerId = burgerId;
		this.name = name;
		this.price = price;
	}
	
	public void setBurgerId(int BurgerId){this.burgerId = BurgerId;}
	public void setName(String name){this.name = name;}
	public void setprice(int price){this.price = price;}
	
	public int getBurgerId(){return burgerId;}
	public String getName(){return name;}
	public int getprice(){return price;}
}