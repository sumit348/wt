package repository;

import java.lang.*;

import entity.*;
import interfaces.*;

public class UserRepo implements IUserRepo
{
	DatabaseConnection dbc;
	
	public UserRepo()
	{
		dbc = new DatabaseConnection();
	}
	public User getUser(String userId, String pass)
	{
		User user = null;
		String query = "Select * from login where userId = '"+userId+"' and password = '"+pass+"';";
		try
		{
			System.out.println(query);
			dbc.openConnection();
			dbc.result = dbc.st.executeQuery(query);
		
			while(dbc.result.next())
			{
				user = new User();
				/*String uid = dbc.result.getString("userId");
				user.setUserId(uid);*/
				user.setUserId(dbc.result.getString("userId"));
				user.setPassword(dbc.result.getString("password"));
				user.setUserType(dbc.result.getInt("userType"));
			}
		}
        catch(Exception ex)
		{
			System.out.println("Exception : " +ex.getMessage());
        }
		dbc.closeConnection();
		return user;
	}
	public void insertUser(User u)
	{
		String query = "INSERT INTO login VALUES ('"+u.getUserId()+"','"+u.getPassword()+"',"+u.getUserType()+");";
		try
		{
			dbc.openConnection();
			dbc.st.execute(query);
			dbc.closeConnection();
		}
		catch(Exception ex){System.out.println(ex.getMessage());}
	}
	public void updateUser(User u){}
	public void deleteUser(String userId)
	{
		String query = "DELETE from login  WHERE userId='"+userId+"';";
		try
		{
			dbc.openConnection();
			dbc.st.execute(query);
			dbc.closeConnection();
		}
		catch(Exception e){System.out.println(e.getMessage());}
	}
}