using Microsoft.EntityFrameworkCore;
//using CreateTale.Models;

namespace CreateTale
{
    public class AplicationDbContext : DbContext
    {
        public AplicationDbContext(DbContextOptions<AplicationDbContext> options) : base(options)
        {
        }

        // Mapeo de las tablas
        //public DbSet<TarjetaCredito> TarjetaCredito { get; set; }
    }   
}
