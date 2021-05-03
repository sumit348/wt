package frames;
import java.lang.*;
import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.util.*;
import repository.*;
import entity.*;


public class HomeFrame extends JFrame implements ActionListener
{
	JButton logoutBtn, manageEmpBtn, saleBurgerBtn;
	JPanel panel;
	
	User user;
	
	public HomeFrame(User user)
	{
		super("Home");
		this.setSize(800,450);
		this.setResizable(false);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		this.user = user;
		
		panel = new JPanel();
		panel.setLayout(null);
		
		logoutBtn = new JButton("Logout");
		logoutBtn.setBounds(600, 50, 150, 30);
		logoutBtn.addActionListener(this);
		panel.add(logoutBtn);
		

		manageEmpBtn = new JButton("Manage Sellers");
		manageEmpBtn.setBounds(200, 150, 150, 60);
		manageEmpBtn.addActionListener(this);
		panel.add(manageEmpBtn);
		
		saleBurgerBtn = new JButton("Sell Burgers");
		saleBurgerBtn.setBounds(450, 150, 150, 60);
		saleBurgerBtn.addActionListener(this);
		panel.add(saleBurgerBtn);

		this.add(panel);
	
		
	}
	public void actionPerformed(ActionEvent ae)
	{
		String command = ae.getActionCommand();
		
		if(command.equals(logoutBtn.getText()))
		{
			LoginFrame lf = new LoginFrame();
			lf.setVisible(true);
			this.setVisible(false);
		}
		
		else if(command.equals(saleBurgerBtn.getText()))
		{
			BurgerSell lf = new BurgerSell(user);
			lf.setVisible(true);
			this.setVisible(false);
		}
		else if(command.equals(manageEmpBtn.getText()))
		{
			if(user.getUserType()==0)
			{
				SellerFrame ef = new SellerFrame(user);
				ef.setVisible(true);
				this.setVisible(false);
			}
			else
			{
				JOptionPane.showMessageDialog(this, "Access Denied");
			}
		}
		
		else{}
	}
}































