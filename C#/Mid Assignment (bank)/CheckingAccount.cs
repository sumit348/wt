using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Developer_bank
{
    class CheckingAccount:Account
    {

        private double minAmmount=0;
        private string dob, address;
        public CheckingAccount()
        {

        }
        public CheckingAccount(string accountName, string accountNumber, double balance, string dob, string address) : base(accountName, accountNumber, balance)
        {
            this.dob = dob;
            this.address = address;
        }

        public double MinAmmount
        {
            set { this.minAmmount = value; }
            get { return this.minAmmount; }
        }
        public override void Withdraw(double amount)
        {
            if (this.Balance - amount > this.minAmmount) // balance-amount>0 and amount<0
            {
                this.Balance -= amount;//this.balance=this.balance-amount
                Console.WriteLine("Checking account withdraw successful");
                base.increase();
            }
            else
            {
                Console.WriteLine("You cant withdraw the ammount.");
            }
        }


    }
}
