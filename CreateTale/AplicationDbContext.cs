using CreateTale.Models;
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
        public DbSet<User> Users { get; set; }

        public DbSet<Collection> Collections { get; set; }


        public DbSet<Tale> Tales { get; set; }


        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<User>().HasData(
                new User
                {
                    Id = "1",
                    Username = "Pedro Castillo Rojas",
                    Email = "algo@algo.com",
                    Password = "123456"
                },
                new User
                {
                    Id = "2",
                    Username = "Juan Velazco Alvarado",
                    Email = "otro@otro.com",
                    Password = "123456"
                }
            );


            modelBuilder.Entity<Collection>().HasData(
                new Collection
                {
                    Id = 1,
                    Title = "Cuentos de la cripta ( Mi Coleccion ) ",
                    Banner = "https://www.cuentosdehorror.com/wp-content/uploads/2019/10/cuentos-de-la-cripta.jpg",
                    Description = "Cuentos de la cripta, mi coleccion de cuentos de terror",
                    Categories = "Terror",
                    FrontImg = "https://www.cuentosdehorror.com/wp-content/uploads/2019/10/cuentos-de-la-cripta.jpg"
                }
            );

            modelBuilder.Entity<Tale>().HasData(
                new Tale
                {
                    Id = 1,
                    Title = "La Marea ",
                    CollectionId = 1,
                    Description = "Historia pensada en el maremoto de 1960",
                    Content = "Esta es la historia, la siguiente es toda la historia",
                    UserId = "1"
                }
            );
        }

    }
}
