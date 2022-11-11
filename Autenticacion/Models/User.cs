using System.ComponentModel.DataAnnotations;

namespace Autenticacion.Models
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

        public string ProfilePicture { get; set; }
    }
}
