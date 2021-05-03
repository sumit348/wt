package repository;

import java.lang.*;
import java.util.ArrayList;
import entity.*;
import interfaces.*;

public class SellerRepo implements ISellerRepo
{
	DatabaseConnection dbc;
	
	public SellerRepo()
	{
		dbc = new DatabaseConnection();
	}
	
	public void insertInDB(Seller e)
	{
		String query = "INSERT INTO seller VALUES ('"+e.getSellerId()+"','"+e.getName()+"','"+e.getSalary()+"',"+e.getJoiningYear()+");";
		try
		{
			dbc.openConnection();
			dbc.st.execute(query);
			dbc.closeConnection();
		}
		catch(Exception ex){System.out.println(ex.getMessage());}
	}
	public void deleteFromDB(String sellerId)
	{
		String query = "DELETE from seller WHERE id='"+sellerId+"';";
		try
		{
			dbc.openConnection();
			dbc.st.execute(query);
			dbc.closeConnection();
		}
		catch(Exception e){System.out.println(e.getMessage());}
	}
	public void updateInDB(Seller e)
	{
		String query = "UPDATE seller SET name='"+e.getName()+"', joiningYear = '"+e.getJoiningYear()+"', salary = "+e.getSalary()+" WHERE id='"+e.getSellerId()+"'";
		
		try
		{
			dbc.openConnection();
			dbc.st.executeUpdate(query);
			dbc.closeConnection();
		}
		catch(Exception ex){System.out.println(ex.getMessage());}
	}
	public Seller searchSeller(String sellerId)
	{
		Seller emp = null;
		String query = "SELECT `name`, `joiningYear`, `salary` FROM `seller` WHERE `id`='"+sellerId+"';";     
		try
		{
		
			dbc.openConnection();
			dbc.result = dbc.st.executeQuery(query);
		
			while(dbc.result.next())
			{
				
				String name = dbc.result.getString("name");
				String joiningYear = dbc.result.getString("joiningYear");
				double salary = dbc.result.getDouble("salary");
				
				emp = new Seller();
				emp.setSellerId(sellerId);
				emp.setName(name);
				emp.setJoiningYear(joiningYear);
				emp.setSalary(salary);
			}
			
		}
		catch(Exception ex){System.out.println(ex.getMessage());}
		dbc.closeConnection();
		return emp;
	}
	public String[][] getAllSeller()
	{
		ArrayList<Seller> ar = new ArrayList<Seller>();
		String query = "SELECT * FROM seller;";  
		
		try
		{
			dbc.openConnection();
			dbc.result = dbc.st.executeQuery(query);
			
		
			while(dbc.result.next())
			{
				String sellerId = dbc.result.getString("id");
				String name = dbc.result.getString("name");
				String joiningYear = dbc.result.getString("joiningYear");
				double salary = dbc.result.getDouble("salary");
				
				Seller e = new Seller(sellerId,name,joiningYear,salary);
				ar.add(e);
			}
		}
		catch(Exception e){System.out.println(e.getMessage());}
		dbc.closeConnection();
		
		
		Object obj[] = ar.toArray();
		String data[][] = new String [ar.size()][4];
		
		for(int i=0; i<obj.length; i++)
		{
			data[i][0] = ((Seller)obj[i]).getSellerId();
			data[i][1] = ((Seller)obj[i]).getName();
			data[i][2] = ((Seller)obj[i]).getJoiningYear();
			data[i][3] = (((Seller)obj[i]).getSalary())+"";
		}
		return data;
	}
}












































