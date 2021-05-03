using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Final_Project
{
    public partial class Form1 : Form
    {

        public static string settext = "";
        public Form1()
        {
            InitializeComponent();
        }

      
        private void Form1_Load(object sender, EventArgs e)
        {
            panel1.BackColor = Color.FromArgb(100, 0, 0, 0);
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Register r = new Register();
            r.Show();

            this.Hide();
        }

        private void LoginButton_Click(object sender, EventArgs e)
        {

           

            SqlConnection con = new SqlConnection(@"Data Source =.\sqlExpress;Initial Catalog=BRG1;Integrated Security=True");

            con.Open();

            string newcon = "select username from BRG1 where username='" +textBox1.Text + "'and password='" + textBox2.Text + "'";


            SqlDataAdapter adp = new SqlDataAdapter(newcon, con);
            DataSet ds = new DataSet();

            adp.Fill(ds);

            DataTable dt = ds.Tables[0];

            if (dt.Rows.Count >= 1)
            {
                settext = textBox1.Text;



                Home r = new Home();
                r.Show();

                this.Hide();
            }
            else
            {
                MessageBox.Show("Invalid");

            }











        }

        private void Form1_FormClosing(object sender, FormClosingEventArgs e)
        {
            Application.Exit();
        }
    }
}
