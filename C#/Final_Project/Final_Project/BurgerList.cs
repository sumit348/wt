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
    public partial class BurgerList : Form
    {
        int count = 0;
      
        
        public BurgerList()
        {
            InitializeComponent();
        }

        private void btnBack_Click(object sender, EventArgs e)
        {
            this.Hide();
            Home homePage = new Home();
            homePage.ShowDialog();
            this.Close();
        }

        private void btnBurger1_Click(object sender, EventArgs e)
        {
            count = count + 180;
            label4.Text = count.ToString();
            label5.Text = count.ToString();

        }

        private void label4_Click(object sender, EventArgs e)
        {


        }

        private void btnBurger2_Click(object sender, EventArgs e)
        {
            count = count + 200;
            label4.Text = count.ToString();
            label5.Text = count.ToString();
        }

        private void btnBurger3_Click(object sender, EventArgs e)
        {
            count = count + 190;
            label4.Text = count.ToString();
            label5.Text = count.ToString();
        }

        private void btnBurger4_Click(object sender, EventArgs e)
        {
            count = count + 220;
            label4.Text = count.ToString();
            label5.Text = count.ToString();
        }

        private void btnBurger5_Click(object sender, EventArgs e)
        {
            count = count + 230;
            label4.Text = count.ToString();
            label5.Text = count.ToString();
        }

        private void button9_Click(object sender, EventArgs e)
        {

            label4.Text = "00";
            label5.Text = "00";

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void BurgerList_FormClosing(object sender, FormClosingEventArgs e)
        {

        }

        private void btnLogOut_Click(object sender, EventArgs e)
        {

            Form1 f = new Form1();
            f.Show();

            this.Close();
        }

        private void button8_Click(object sender, EventArgs e)
        {
            String total = label4.Text;
            MessageBox.Show(total, " Your-Bill");

            SqlConnection con = new SqlConnection(@"Data Source =.\sqlExpress;Initial Catalog=BRG1;Integrated Security=True");

            con.Open();

            string newcon = "insert into Orders(Totalprice,Amount)VALUES('" + label1.Text + "','" + label4.Text + "')";
            SqlCommand cmd = new SqlCommand(newcon, con);
            cmd.ExecuteNonQuery();
            MessageBox.Show("Order Place Successful");

            label4.Text = "00";
            label5.Text = "00";

        }   
    }
}
  
