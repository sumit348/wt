package frames;

import java.lang.*;
import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.util.*;

import repository.*;
import entity.*;

public class SellerFrame extends JFrame implements ActionListener {
	private JLabel sellerIdLabel, sellerNameLabel, sellerJoiningLable, sellerSalaryLabel;
	private JTextField empIdTF, empNameTF, sellerJoingLabel, empSalaryTF;
	private JButton logoutBtn, loadBtn, insertBtn, updateBtn, deleteBtn, refreshBtn, getAllBtn, backBtn;
	private JPanel panel;
	private JTable sellerTable;
	private JScrollPane sellerTableSP;

	private User user;
	private SellerRepo er;
	private UserRepo ur;

	public SellerFrame(User user) {
		super("SellerFrame");
		this.setSize(800, 450);
		this.setResizable(false);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

		this.user = user;

		er = new SellerRepo();
		ur = new UserRepo();

		panel = new JPanel();
		panel.setLayout(null);

		String data[][] = { { "", "", "", "" } };

		String head[] = { "Id", "Name", "Joining Year", "Salary" };

		sellerTable = new JTable(data, head);
		sellerTableSP = new JScrollPane(sellerTable);
		sellerTableSP.setBounds(350, 100, 400, 150);
		sellerTable.setEnabled(false);
		panel.add(sellerTableSP);

		sellerIdLabel = new JLabel("ID :");
		sellerIdLabel.setBounds(100, 100, 100, 30);
		panel.add(sellerIdLabel);

		logoutBtn = new JButton("Logout");
		logoutBtn.setBounds(30, 30, 150, 30);
		logoutBtn.addActionListener(this);
		panel.add(logoutBtn);

		empIdTF = new JTextField();
		empIdTF.setBounds(220, 100, 100, 30);
		panel.add(empIdTF);

		sellerNameLabel = new JLabel("Name :");
		sellerNameLabel.setBounds(100, 150, 100, 30);
		panel.add(sellerNameLabel);

		empNameTF = new JTextField();
		empNameTF.setBounds(220, 150, 100, 30);
		panel.add(empNameTF);

		sellerJoiningLable = new JLabel("Joinig Year: ");
		sellerJoiningLable.setBounds(100, 200, 100, 30);
		panel.add(sellerJoiningLable);

		sellerJoingLabel = new JTextField();
		sellerJoingLabel.setBounds(220, 200, 100, 30);
		panel.add(sellerJoingLabel);

		sellerSalaryLabel = new JLabel("Salary: ");
		sellerSalaryLabel.setBounds(100, 250, 100, 30);
		panel.add(sellerSalaryLabel);

		empSalaryTF = new JTextField();
		empSalaryTF.setBounds(220, 250, 100, 30);
		panel.add(empSalaryTF);

		loadBtn = new JButton("Load");
		loadBtn.setBounds(100, 300, 80, 30);
		loadBtn.addActionListener(this);
		panel.add(loadBtn);

		insertBtn = new JButton("Insert");
		insertBtn.setBounds(200, 300, 80, 30);
		insertBtn.addActionListener(this);
		panel.add(insertBtn);

		updateBtn = new JButton("Update");
		updateBtn.setBounds(300, 300, 80, 30);
		updateBtn.addActionListener(this);
		updateBtn.setEnabled(false);
		panel.add(updateBtn);

		deleteBtn = new JButton("Delete");
		deleteBtn.setBounds(400, 300, 80, 30);
		deleteBtn.addActionListener(this);
		deleteBtn.setEnabled(false);
		panel.add(deleteBtn);

		refreshBtn = new JButton("Refresh");
		refreshBtn.setBounds(500, 300, 80, 30);
		refreshBtn.addActionListener(this);
		refreshBtn.setEnabled(false);
		panel.add(refreshBtn);

		getAllBtn = new JButton("Get All");
		getAllBtn.setBounds(500, 260, 80, 30);
		getAllBtn.addActionListener(this);
		panel.add(getAllBtn);

		backBtn = new JButton("Back");
		backBtn.setBounds(600, 350, 80, 30);
		backBtn.addActionListener(this);
		panel.add(backBtn);

		this.add(panel);
	}

	public void actionPerformed(ActionEvent ae) {
		String command = ae.getActionCommand();

		if (command.equals(loadBtn.getText())) {
			if (!empIdTF.getText().equals("") || !empIdTF.getText().equals(null)) {
				Seller e = er.searchSeller(empIdTF.getText());
				if (e != null) {
					empNameTF.setText(e.getName());
					sellerJoingLabel.setText(e.getJoiningYear());
					empSalaryTF.setText(e.getSalary() + "");

					empIdTF.setEnabled(false);
					empNameTF.setEnabled(true);
					sellerJoingLabel.setEnabled(true);
					empSalaryTF.setEnabled(true);

					updateBtn.setEnabled(true);
					deleteBtn.setEnabled(true);
					refreshBtn.setEnabled(true);
					insertBtn.setEnabled(false);
					loadBtn.setEnabled(false);
				} else {
					JOptionPane.showMessageDialog(this, "Invaild ID");
				}
			}
		} else if (command.equals(insertBtn.getText())) {
			Seller e = new Seller();
			User u = new User();
			Random rd = new Random();
			int x = rd.nextInt(9999999) + 10000000;

			e.setSellerId(empIdTF.getText());
			e.setName(empNameTF.getText());
			e.setJoiningYear(sellerJoingLabel.getText());
			e.setSalary(Double.parseDouble(empSalaryTF.getText()));

			u.setUserId(empIdTF.getText());
			u.setPassword(x + "");
			u.setUserType(1);

			er.insertInDB(e);
			ur.insertUser(u);

			JOptionPane.showMessageDialog(this, "Inserted, Id: " + empIdTF.getText() + " and Password: " + x);

			empIdTF.setText("");
			empNameTF.setText("");
			sellerJoingLabel.setText("");
			empSalaryTF.setText("");

			loadBtn.setEnabled(true);
			insertBtn.setEnabled(true);
			updateBtn.setEnabled(false);
			deleteBtn.setEnabled(false);
			refreshBtn.setEnabled(false);

		} else if (command.equals(refreshBtn.getText())) {
			empIdTF.setText("");
			empNameTF.setText("");
			sellerJoingLabel.setText("");
			empSalaryTF.setText("");

			empIdTF.setEnabled(true);
			loadBtn.setEnabled(true);
			insertBtn.setEnabled(true);
			updateBtn.setEnabled(false);
			deleteBtn.setEnabled(false);
			refreshBtn.setEnabled(false);
		} else if (command.equals(updateBtn.getText())) {
			Seller e = new Seller();

			e.setSellerId(empIdTF.getText());
			e.setName(empNameTF.getText());
			e.setJoiningYear(sellerJoingLabel.getText());
			e.setSalary(Double.parseDouble(empSalaryTF.getText()));

			er.updateInDB(e);

			JOptionPane.showMessageDialog(this, "Updated");

			empIdTF.setText("");
			empNameTF.setText("");
			sellerJoingLabel.setText("");
			empSalaryTF.setText("");

			loadBtn.setEnabled(true);
			insertBtn.setEnabled(true);
			updateBtn.setEnabled(false);
			deleteBtn.setEnabled(false);
			refreshBtn.setEnabled(false);

			empIdTF.setEnabled(true);
			empNameTF.setEnabled(true);
			sellerJoingLabel.setEnabled(true);
			empSalaryTF.setEnabled(true);
		} else if (command.equals(deleteBtn.getText())) {
			er.deleteFromDB(empIdTF.getText());
			ur.deleteUser(empIdTF.getText());

			JOptionPane.showMessageDialog(this, "Deleted");

			empIdTF.setText("");
			empNameTF.setText("");
			sellerJoingLabel.setText("");
			empSalaryTF.setText("");

			empIdTF.setEnabled(true);
			empNameTF.setEnabled(true);
			sellerJoingLabel.setEnabled(true);
			empSalaryTF.setEnabled(true);

			loadBtn.setEnabled(true);
			insertBtn.setEnabled(true);
			updateBtn.setEnabled(false);
			deleteBtn.setEnabled(false);
			refreshBtn.setEnabled(false);
		} else if (command.equals(logoutBtn.getText())) {
			LoginFrame lf = new LoginFrame();
			lf.setVisible(true);
			this.setVisible(false);
		} else if (command.equals(getAllBtn.getText())) {
			String data[][] = er.getAllSeller();
			String head[] = { "Id", "Name", "Joining Year", "Salary" };

			panel.remove(sellerTableSP);

			sellerTable = new JTable(data, head);
			sellerTable.setEnabled(false);
			sellerTableSP = new JScrollPane(sellerTable);
			sellerTableSP.setBounds(350, 100, 400, 150);
			panel.add(sellerTableSP);

			panel.revalidate();
			panel.repaint();

		} else if (command.equals(backBtn.getText())) {
			HomeFrame eh = new HomeFrame(user);
			eh.setVisible(true);
			this.setVisible(false);
		} else {
		}

	}
}