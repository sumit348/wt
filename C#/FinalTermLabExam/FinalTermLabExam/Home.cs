using FinalTermLabExam.Enums;
using System;
using System.Collections.Generic;
using System.Windows.Forms;

namespace FinalTermLabExam
{
    public partial class Home : Form
    {
        public int UserId
        {
            set;
            get;
        }
        public string FullName
        {
            set;
            get;
        }
        public Home()
        {
            InitializeComponent();
        }
        private bool addNew = true;
        private void Home_FormClosing(object sender, FormClosingEventArgs e)
        {
            Application.Exit();
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            try
            {
                addNew = false;
                UserIdLabel.Text = dataGridView1.Rows[e.RowIndex].Cells[0].Value.ToString();
                CreateDate.Text = dataGridView1.Rows[e.RowIndex].Cells[2].Value.ToString();
                LastModified.Text = dataGridView1.Rows[e.RowIndex].Cells[4].Value.ToString();
                comboBox1.SelectedIndex = GetImportance.FromString(dataGridView1.Rows[e.RowIndex].Cells[5].Value.ToString());
                descriptions.Text = dataGridView1.Rows[e.RowIndex].Cells[3].Value.ToString();
                button1.Text = "Update";
            }
            catch (ArgumentOutOfRangeException)
            {

            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (addNew)
            {
                // add new event
                DialogResult dr;
                dr = MessageBox.Show("Do you really want to add new Event?", "Warning", MessageBoxButtons.YesNo, MessageBoxIcon.Warning);
                if(dr == DialogResult.Yes)
                {
                    if (AddEvent(descriptions.Text, GetImportance.FromString(comboBox1.SelectedItem.ToString())) == 1)
                    {
                        //success
                        dataGridView1.DataSource = GetAllEvents(UserId);
                        ClearFields();
                        MessageBox.Show("Successfully Added Event", "Success", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);

                    }
                    else
                    {
                        //failed
                        MessageBox.Show("Failed to Add Event", "Something went wrong", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
            }
            else
            {
                //update event
                DialogResult dr;
                dr = MessageBox.Show("Do you really want to update the Event?", "Warning", MessageBoxButtons.YesNo, MessageBoxIcon.Warning);
                if (dr == DialogResult.Yes)
                {
                    if (UpdateEvent(Convert.ToInt32(UserIdLabel.Text),CreateDate.Text, descriptions.Text, GetImportance.FromString(comboBox1.Text)) == 1)
                    {
                        //success
                        dataGridView1.DataSource = GetAllEvents(UserId);
                        ClearFields();
                        MessageBox.Show("Successfully updated user", "Success", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
                    }
                    else
                    {
                        //failed
                        MessageBox.Show("Failed to update", "Something went wrong", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
            }
        }

        private void Home_Load(object sender, EventArgs e)
        {
            label6.Text = FullName + "'s Digital Diary";
            dataGridView1.DataSource = GetAllEvents(UserId);
            ClearFields();
        }

        private List<Events> GetAllEvents(int id)
        {
            using (var database = new DatabaseConnection())
            {
                List<Events> events = new List<Events>();
                string sql = "SELECT * FROM EventsList WHERE UserId="+id;
                using(var reader = database.GetSqlData(sql))
                {
                    while (reader.Read())
                    {
                        events.Add(new Events()
                        {
                            Id = Convert.ToInt32(reader["Id"]),
                            UserId = Convert.ToInt32(reader["UserId"]),
                            CreateDate = DateTime.Parse(reader["CreateDate"].ToString()),
                            LastModified = DateTime.Parse(reader["LastModified"].ToString()),
                            Description = reader["Description"].ToString(),
                            EventImportance = GetImportance.FromInt(Convert.ToInt32(reader["Importance"]))
                        });
                    }
                }
                return events;
            }
        }

        private int AddEvent(string description, int importance)
        {
            using (var database = new DatabaseConnection())
            {
                string sql = "INSERT INTO EventsList(UserId,CreateDate,LastModified,Description,Importance) VALUES('" + UserId + "','" + DateTime.Now.ToString() + "','" + DateTime.Now.ToString() + "','"+ description + "','"+importance+"')";
                int result = database.ExecuteQuery(sql);
                return result;
            }
        }

        private int DeleteEvent(int id)
        {
            using (var database = new DatabaseConnection())
            {
                string sql = "DELETE FROM EventsList WHERE Id=" + id; //sql command
                int result = database.ExecuteQuery(sql);
                return result;
            }
        }

        private int UpdateEvent(int Id, string createDate, string description, int importance)
        {
            using (var database = new DatabaseConnection())
            {
                string sql = "UPDATE EventsList SET UserId='"+ UserId + "',CreateDate='"+ createDate + "',LastModified='"+ DateTime.Now.ToString() + "',Description='"+description+"',Importance='"+importance+"' WHERE Id="+ Id;
                int result = database.ExecuteQuery(sql);
                return result;
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            ClearFields();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            dataGridView1.DataSource = GetAllEvents(UserId);
            ClearFields();
        }

        private void ClearFields()
        {
            addNew = true;
            UserIdLabel.Text = "";
            CreateDate.Text = DateTime.Now.ToString();
            LastModified.Text = DateTime.Now.ToString();
            comboBox1.SelectedIndex = GetImportance.FromString("Moderate");
            descriptions.Text = "";
            button1.Text = "Add New";
        }

        private void Logout_Click(object sender, EventArgs e)
        {
            Login login = Login.Instance;
            this.Hide();
            login.Show();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            DialogResult dr;
            dr = MessageBox.Show("Do you really want to Delete this Event?", "Warning", MessageBoxButtons.YesNo, MessageBoxIcon.Warning);
            if (dr == DialogResult.Yes)
            {
                if (DeleteEvent(Convert.ToInt32(UserIdLabel.Text)) == 1)
                {
                    //success
                    dataGridView1.DataSource = GetAllEvents(UserId);
                    ClearFields();
                    MessageBox.Show("Event successfully Deleted", "Success", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);

                }
                else
                {
                    //failed
                    MessageBox.Show("Failed to Delete this Event", "Something went wrong", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
            }
        }

        private void label5_Click(object sender, EventArgs e)
        {

        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void CreateDate_Click(object sender, EventArgs e)
        {

        }

        private void UserIdLabel_Click(object sender, EventArgs e)
        {

        }
    }
}
