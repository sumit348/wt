using System;
using System.Data;
using System.Data.SqlClient;

namespace FinalTermLabExam
{
    public class DatabaseConnection: IDisposable
    {
        public DatabaseConnection()
        {
            try
            {
                if (SqlConnection.State == ConnectionState.Open)
                {
                    SqlConnection.Close();
                }
                SqlConnection.Open();
            }
            catch (Exception e)
            {
                Console.WriteLine(e.Message);
            }
        }
        private static SqlConnection _sqlConnection = null;
        private SqlCommand sqlCommand;
        private static SqlConnection SqlConnection
        {
            get
            {
                if (_sqlConnection == null)
                    _sqlConnection = new SqlConnection(@"Data Source=.\sqlExpress;Initial Catalog=DigitalDiary2020;Integrated Security=True");
                return _sqlConnection;
            }
        }
        public SqlDataReader GetSqlData(string sql)
        {
            this.sqlCommand = new SqlCommand(sql, SqlConnection);
            return this.sqlCommand.ExecuteReader();
        }
        public int ExecuteQuery(string sql)
        {
            this.sqlCommand = new SqlCommand(sql, SqlConnection);
            return this.sqlCommand.ExecuteNonQuery();
        }
        public void Dispose()
        {
            if (SqlConnection.State == ConnectionState.Open)
            {
                SqlConnection.Close();
            }
        }
    }
}
