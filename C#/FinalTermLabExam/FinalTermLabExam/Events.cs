using FinalTermLabExam.Enums;
using System;

namespace FinalTermLabExam
{
    public class Events
    {
        public Events()
        {

        }
        public int Id
        {
            set;
            get;
        }
        public int UserId
        {
            set;
            get;
        }
        public DateTime CreateDate
        {
            set;
            get;
        }
        public string Description
        {
            set;
            get;
        }
        public DateTime LastModified
        {
            set;
            get;
        }
        public Importance EventImportance
        {
            set;
            get;
        }
    }
}
