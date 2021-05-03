using System;

namespace FinalTermLabExam.Enums
{
    public enum Importance
    {
        High=2,
        Moderate=1, 
        LessImportant=0
    }

    public class GetImportance
    {
        public static Importance FromInt(int x)
        {
            switch (x)
            {
                case 0:
                    return Importance.LessImportant;
                case 1:
                    return Importance.Moderate;
                case 2:
                    return Importance.High;
                default:
                    return Importance.LessImportant;
            }
        }
        public static int FromString(string x)
        {
            switch (x)
            {
                case "LessImportant":
                    return 0;
                case "Moderate":
                    return 1;
                case "High":
                    return 2;
                default:
                    return 0;
            }
        }
    }
}
