using System.ComponentModel.DataAnnotations;

namespace CreateTale.Models
{
    public class User
    {
        [Key]
        public string Id { get; set; }
        [Required]
        public string Username { get; set; }

        [Required]
        public string Email { get; set; }

        [Required]
        public string Password { get; set; }

        public string ProfilePicture { get; set; } = "https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png";
    }
}
