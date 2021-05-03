using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Developer_bank
{
    class Bank
    {
        Account[] accounts;
       
        public Bank(int size) 
        {
            
            this.accounts = new Account[size];
        }


        public void CreateAccount(Account account)
        {
            for (int i = 0; i < accounts.Length; i++)
            {
                if (accounts[i] == null)
                {
                    accounts[i] = account;
                    break;
                }

            }
        }

        public void PrintAccount(string accountNumber)
        {
            for (int i = 0; i < this.accounts.Length; i++) //accounts[i]=Account_refrence
            {

                if (this.accounts[i].AccountNumber == accountNumber)
                {
                    this.accounts[i].PrintAccountDetails();
                    break;
                }
            

           
            }
        }

        public Account SearchAccount(string accountNumber)
        {
            for (int i = 0; i < this.accounts.Length; i++) 
            {
            if (this.accounts[i] != null)
            {
                if (this.accounts[i].AccountNumber == accountNumber)
                {
                    return accounts[i];
                }
            }
               


            }

            return null;
        }

        public void PrintAccount()
        {
            for (int i = 0; i < this.accounts.Length; i++)
            {
                if (this.accounts[i] != null)
                {
                    this.accounts[i].PrintAccountDetails();
                }
                else
                {
                    break;
                }
            }
        }

        public void DeleteAccount(Account account)
        {
            for (int i = 0; i < accounts.Length; i++)
            {
                if (accounts[i] == account)
                {
                    accounts[i] = null;
                    for (int j = i + 1; j < accounts.Length; j++)
                    {
                        if (accounts[j] == null)
                        {
                            break;
                        }
                        else
                        {
                            accounts[j - 1] = accounts[j];
                            accounts[j] = null;
                        }
                    }
                }
            }
        }

        public void DeleteAccount(string a)
        {
            for (int i = 0; i < this.accounts.Length; i++)
            {
                if (this.accounts[i] != null)
                {
                    if (this.accounts[i].AccountNumber == a)
                    {
                        for (int j = i; j < accounts.Length; j++)
                        {
                            accounts[j] = null;
                            if (j + 1 != accounts.Length)
                            {
                                if (accounts[j + 1] == null)
                                {
                                    break;
                                }
                                else
                                {
                                    accounts[j] = accounts[j + 1];
                                }
                            }
                        }
                    }
                }
                else
                {
                    break;
                }

            }
        }
    }
}
