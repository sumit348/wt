using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace FinalTermLabExam
{
    public partial class Login : Form
    {
        private static Login _instance = null;
        public static Login Instance
        {
            get
            {
                if (_instance == null)
                    _instance = new Login();
                return _instance;
            }
        }
        public Login()
        {
            InitializeComponent();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            panel1.Visible = true;
            panel2.Visible = false;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            panel1.Visible = false;
            panel2.Visible = true;
        }

        private void Login_Load(object sender, EventArgs e)
        {
            panel1.Visible = true;
            panel2.Visible = false;
        }

        private void register_Click(object sender, EventArgs e)
        {
            if (textBox3.Text == String.Empty || textBox4.Text == String.Empty || textBox5.Text == String.Empty || textBox6.Text == String.Empty)
            {
                MessageBox.Show("Please Fill all the information","Error",MessageBoxButtons.OK,MessageBoxIcon.Error);
            }
            else if(textBox3.Text != textBox5.Text)
            {
                MessageBox.Show("Password Didn't matched", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
            else
            {
                //Try register User
                if (ResisterUser(textBox6.Text,textBox4.Text,textBox3.Text) == 1)
                {
                    //success
                    MessageBox.Show("Successfully registered user", "Success", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
                }
                else
                {
                    MessageBox.Show("Error registering user", "Something went wrong", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }

            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            //Login Button
            if(textBox1.Text == String.Empty || textBox2.Text == String.Empty)
            {
                MessageBox.Show("Please enter username and password", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
            else
            {
                //Try Login
                if(GetUser(textBox1.Text, textBox2.Text) == null)
                {
                    MessageBox.Show("Incorrect username or password. Please Try again.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
                else
                {
                    Home h = new Home()
                    {
                        UserId = GetUser(textBox1.Text, textBox2.Text).Id,
                        FullName = GetUser(textBox1.Text, textBox2.Text).FullName
                    };
                    if(checkBox1.CheckState == CheckState.Unchecked)
                    {
                        textBox1.Text = "";
                        textBox2.Text = "";
                    }
                    this.Hide();
                    h.Show();
                }
            }
        }

        private void Login_FormClosing(object sender, FormClosingEventArgs e)
        {
            Application.Exit();
        }

        private int ResisterUser(string fullname, string username, string password)
        {
            using(var database = new DatabaseConnection())
            {
                string sql = "INSERT INTO UserList(FullName,UserName,Password) VALUES('"+fullname+"','"+username+"','"+password+"')";
                int result = database.ExecuteQuery(sql);
                return result;
            }
        }

        private User GetUser(string username, string password)
        {
            using (var database = new DatabaseConnection())
            {
                User user = null;
                string sql = "SELECT * FROM UserList WHERE UserName='"+ username + "' AND Password='"+password+"'";
                try
                {
                    using (var reader = database.GetSqlData(sql))
                    {
                        reader.Read();
                        user = new User()
                        {
                            //populate user data from reader object
                            Id = Convert.ToInt32(reader["Id"]),
                            FullName = reader["FullName"].ToString(),
                            UserName = reader["UserName"].ToString(),
                            Password = reader["Password"].ToString()
                        };
                    }
                }
                catch (InvalidOperationException)
                {
                    //user = null;
                }
                return user;
            }
        }

        private void textBox6_TextChanged(object sender, EventArgs e)
        {

        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void label5_Click(object sender, EventArgs e)
        {

        }

        private void label7_Click(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }
    }
}
