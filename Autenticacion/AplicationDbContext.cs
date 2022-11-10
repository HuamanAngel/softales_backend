using Microsoft.EntityFrameworkCore;
//using Autenticacion.Models;

namespace Autenticacion
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
