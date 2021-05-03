using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Developer_bank
{
    class  Account
    {
        private string accountName, accountNumber;
        private double balance;
        private int transaction;

        public Account()
        {

        }

        public Account(string accountName, string accountNumber, double balance)
        {
            this.accountName = accountName;
            this.accountNumber = accountNumber;
            this.balance = balance;
            this.transaction = 0;
            Console.WriteLine("----------------Account Created--------------");
            PrintAccountDetails();
    

        }

        public string AccountName
        {
            set { this.accountName = value; }
            get { return this.accountName; }
        }
        public string AccountNumber
        {
            set { this.accountNumber = value; }
            get { return this.accountNumber; }
        }
        public double Balance
        {
            set { this.balance = value; }
            get { return this.balance; }
        }

        public void increase()
        {
            this.transaction++;
        }

        public virtual void Withdraw(double amount)
        {
            if (amount < balance && amount > 0) 
            {
                this.Balance -= amount;
               
    }
        }
        public void Deposit(double amount)
        {
            if (amount > 0)
            {
                this.Balance += amount;
                this.transaction++;

                Console.WriteLine("Operation Successful");
            }
        }

        public void Transfer(Account receiver, double amount) 
        {
            this.Withdraw(amount);
            receiver.Deposit(amount);
            this.transaction++;
        }

        public void PrintAccountDetails()
        {
            Console.WriteLine("Account Name:{0}\nAccount Number:{1}\nBalance:{2}\nTotal transaction:{3}", this.accountName, this.accountNumber, this.balance, this.transaction);
        }
    }
}
