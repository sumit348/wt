package frames;

import java.lang.*;
import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.util.*;
import java.util.ArrayList;
import java.text.SimpleDateFormat;
import java.util.Date;
import repository.*;
import entity.*;

public class BurgerSell extends JFrame implements ActionListener {
	JButton logoutBtn, b1, b2, b3, b4, b5, b6, b7, or, ext, backBtn, clr;
	JButton five, ten, twenty;
	JLabel tp, dis, pay;
	JPanel panel;

	User user;
	BurgerRepo br;

	ArrayList<Burger> allBurgers = new ArrayList<Burger>();

	String[] burgerNames;
	int[] burgerPrices;

	int totalPrice;
	int payablePrice;

	public BurgerSell(User u) {

		super("BurgerSell");
		this.setSize(700, 450);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		this.user = u;
		panel = new JPanel();
		panel.setLayout(null);

		logoutBtn = new JButton("Logout");
		logoutBtn.setBounds(550, 30, 90, 30);
		logoutBtn.addActionListener(this);
		panel.add(logoutBtn);

		br = new BurgerRepo();
		allBurgers = br.GetAllBurgers();

		burgerNames = new String[allBurgers.size()];
		burgerPrices = new int[allBurgers.size()];

		for (int i = 0; i < allBurgers.size(); i++) {
			Burger s = (Burger) br.GetAllBurgers().get(i);
			burgerNames[i] = s.getName();
			burgerPrices[i] = s.getprice();
		}

		b1 = new JButton(burgerNames[0]);
		b1.setBounds(15, 30, 140, 40);
		b1.addActionListener(this);
		panel.add(b1);

		b2 = new JButton(burgerNames[1]);
		b2.setBounds(160, 30, 150, 40);
		b2.addActionListener(this);
		panel.add(b2);

		b3 = new JButton(burgerNames[2]);
		b3.addActionListener(this);
		b3.setBounds(315, 30, 140, 40);
		panel.add(b3);

		b4 = new JButton(burgerNames[3]);
		b4.setBounds(15, 90, 140, 40);
		b4.addActionListener(this);
		panel.add(b4);

		b5 = new JButton(burgerNames[4]);
		b5.setBounds(160, 90, 140, 40);
		b5.addActionListener(this);
		panel.add(b5);

		b6 = new JButton(burgerNames[5]);
		b6.setBounds(305, 90, 140, 40);
		b6.addActionListener(this);
		panel.add(b6);

		b7 = new JButton(burgerNames[6]);
		b7.addActionListener(this);
		b7.setBounds(450, 90, 140, 40);
		panel.add(b7);

		tp = new JLabel("Total Price :");
		tp.setBounds(120, 190, 90, 30);
		panel.add(tp);

		tp = new JLabel("00");
		tp.setBounds(210, 190, 90, 30);
		panel.add(tp);

		clr = new JButton("Clear");
		clr.setBounds(330, 350, 90, 30);
		clr.addActionListener(this);
		panel.add(clr);

		dis = new JLabel("Discount :");
		dis.setBounds(120, 240, 90, 30);
		panel.add(dis);

		five = new JButton("5%");
		five.setBounds(220, 240, 65, 20);
		five.addActionListener(this);
		panel.add(five);

		ten = new JButton("10%");
		ten.setBounds(300, 240, 65, 20);
		ten.addActionListener(this);
		panel.add(ten);

		twenty = new JButton("20%");
		twenty.setBounds(380, 240, 65, 20);
		twenty.addActionListener(this);
		panel.add(twenty);

		pay = new JLabel("Payable p :");
		pay.setBounds(120, 290, 90, 30);
		panel.add(pay);

		pay = new JLabel("00");
		pay.setBounds(210, 290, 90, 30);
		panel.add(pay);

		or = new JButton("Order");
		or.setBounds(220, 350, 90, 30);
		or.addActionListener(this);
		panel.add(or);

		ext = new JButton("Exit");
		ext.setBounds(500, 370, 90, 30);
		ext.addActionListener(this);
		panel.add(ext);

		backBtn = new JButton("Back");
		backBtn.setBounds(50, 370, 90, 30);
		backBtn.addActionListener(this);
		panel.add(backBtn);

		this.add(panel);

	}

	public void actionPerformed(ActionEvent ae) {
		String command = ae.getActionCommand();

		if (command.equals(backBtn.getText())) {
			HomeFrame lf = new HomeFrame(user);
			lf.setVisible(true);
			this.setVisible(false);
		} else if (command.equals(or.getText())) {

			Random rd = new Random();
			int x = rd.nextInt(9999999) + 10000000;

			Order o = new Order(x, totalPrice);

			br.insertOrder(o);

			JOptionPane.showMessageDialog(this, "Order added Successfully!! order ID: " + x);

			tp.setText("0.0");
			pay.setText("0.0");

			totalPrice = 0;
			payablePrice = 0;

		} else if (command.equals(ext.getText())) {
			HomeFrame lf = new HomeFrame(user);
			lf.setVisible(true);
			this.setVisible(false);
		}

		else if (command.equals(clr.getText())) {
			totalPrice = 0;
			payablePrice = 0;
			tp.setText("0.0");
			pay.setText("0.0");
		}

		else if (command.equals(five.getText())) {
			System.out.print("five clicked");

		} else if (command.equals(ten.getText())) {
			System.out.print(" Ten clicked");
		} else if (command.equals(twenty.getText())) {
			System.out.print(" Tweenty clicked");
		} else if (command.equals(logoutBtn.getText())) {
			LoginFrame lf = new LoginFrame();
			lf.setVisible(true);
			this.setVisible(false);
		}

		else {

			int selectedPrice = GetPriceFromName(command);
			int totalPrice = GetTotalPrice(selectedPrice);
			tp.setText(Integer.toString(totalPrice));
			pay.setText(Integer.toString(totalPrice));

		}
	}

	public int GetPriceFromName(String name) {
		for (int i = 0; i <= burgerNames.length; i++) {
			if (burgerNames[i] == name) {
				return burgerPrices[i];
			}
		}
		return -1;
	}

	public int GetTotalPrice(int price) {

		totalPrice = totalPrice + price;

		return totalPrice;
	}

}