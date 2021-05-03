package repository;

import java.lang.*;
import java.util.ArrayList;
import entity.*;
import interfaces.*;

public class BurgerRepo
{
	DatabaseConnection dbc;
	
	public BurgerRepo()
	{
		dbc = new DatabaseConnection();
	}
	
	public ArrayList<Burger> GetAllBurgers()
	{
		ArrayList<Burger> ar = new ArrayList<Burger>();
		String query = "SELECT * FROM burger;";  
		
		try
		{
			dbc.openConnection();
			dbc.result = dbc.st.executeQuery(query);
			
		
			while(dbc.result.next())
			{
				int id = dbc.result.getInt("id");
				String name = dbc.result.getString("name");
				int price = dbc.result.getInt("price");
			
				Burger e = new Burger(id,name,price);
				ar.add(e);
			}
		}
		catch(Exception e){System.out.println(e.getMessage());}
		dbc.closeConnection();
		
        return ar;
    
	}

	
	public void insertOrder(Order o)
	{
		String query = "INSERT INTO `order` (`id`, `totalPrice`) VALUES ('"+o.getorderId()+"',"+o.getPrice()+");";
		try
		{
			dbc.openConnection();
			dbc.st.execute(query);
			dbc.closeConnection();
		}
		catch(Exception ex){System.out.println(ex.getMessage());}
	}
}


 
 
 
 
 
 
 
 
 
 

































