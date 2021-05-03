package interfaces;

import java.lang.*;

import entity.*;

public interface ISellerRepo
{
	public void insertInDB(Seller e);
	public void deleteFromDB(String empId);
	public void updateInDB(Seller e);
	public Seller searchSeller(String empId);
	public String[][] getAllSeller();
}