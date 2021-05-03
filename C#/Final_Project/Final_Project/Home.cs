using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

using System.Data.SqlClient;

namespace Final_Project
{
    public partial class Home : Form

        
    {
        public Home()
        {
            InitializeComponent();
        }

        private void Home_Load(object sender, EventArgs e)
        {
            panel1.BackColor = Color.FromArgb(100, 0, 0, 0);
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Form1 f = new Form1();
            f.Show();

            this.Close();
        }

      

      

        private void ManageButton_Click(object sender, EventArgs e)
        {








            Seller b = new Seller();
            b.Show();
            this.Hide();

            
        }

        private void SellBurgerButton_Click(object sender, EventArgs e)
        {
            BurgerList d = new BurgerList();
            d.Show();
            this.Hide();
           
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void Home_FormClosing(object sender, FormClosingEventArgs e)
        {
            
        }
    }
}
