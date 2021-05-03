package entity;

import java.lang.*;


public class Order
{
	private int orderId;
    private int price;

	public Order(int orderId, int price)
	{
		this.orderId = orderId;
		this.price = price;
	}
	
	public void setorderId(int orderId){this.orderId = orderId;}
	public void setPrice(int price){this.price = price;}

	public int getorderId(){return this.orderId;}
	public int getPrice(){return this.price;}

}