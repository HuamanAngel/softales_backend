using System.ComponentModel.DataAnnotations;

namespace CreateTale.Models
{
    public class Tale
    {
        [Key]
        public int Id { get; set; }

        [Required]
        [MaxLength(50)]
        public string Title { get; set; }

        [Required]
        [MaxLength(300)]
        public string Description { get; set; }

        public string FrontImg { get; set; } = "https://polemos.pe/wp-content/uploads/2022/01/historia-4.jpg";

        [Required]
        public string Content { get; set; }

        public DateTime CreatedOn { get; set; } = DateTime.Now;
        // Relation with user table
        public string UserId { get; set; }
        public User User { get; set; }
        // Relation with collection table
        public int CollectionId { get; set; }
        public Collection Collection { get; set; }
    }
}
