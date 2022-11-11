using System.ComponentModel;
using System.ComponentModel.DataAnnotations;

namespace CreateTale.Models
{
    public class Collection
    {

        [Key]
        public int Id { get; set; }
        public string Title { get; set; }
        [DefaultValue("https://polemos.pe/wp-content/uploads/2022/01/historia-4.jpg")]
        public string Banner { get; set; }
        public string Description { get; set; }
        public string Categories { get; set; }
        
        [DefaultValue("https://polemos.pe/wp-content/uploads/2022/01/historia-4.jpg")]
        public string FrontImg { get; set; }



    }
}
