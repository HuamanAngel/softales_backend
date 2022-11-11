using System;
using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace CreateTale.Migrations
{
    /// <inheritdoc />
    public partial class V102 : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.InsertData(
                table: "Collections",
                columns: new[] { "Id", "Banner", "Categories", "Description", "FrontImg", "Title" },
                values: new object[] { 1, "https://www.cuentosdehorror.com/wp-content/uploads/2019/10/cuentos-de-la-cripta.jpg", "Terror", "Cuentos de la cripta, mi coleccion de cuentos de terror", "https://www.cuentosdehorror.com/wp-content/uploads/2019/10/cuentos-de-la-cripta.jpg", "Cuentos de la cripta ( Mi Coleccion ) " });

            migrationBuilder.InsertData(
                table: "Users",
                columns: new[] { "Id", "Email", "Password", "ProfilePicture", "Username" },
                values: new object[] { "2", "otro@otro.com", "123456", "https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png", "Juan Velazco Alvarado" });

            migrationBuilder.InsertData(
                table: "Tales",
                columns: new[] { "Id", "CollectionId", "Content", "CreatedOn", "Description", "FrontImg", "Title", "UserId" },
                values: new object[] { 1, 1, "Esta es la historia, la siguiente es toda la historia", new DateTime(2022, 11, 11, 13, 33, 20, 132, DateTimeKind.Local).AddTicks(7015), "Historia pensada en el maremoto de 1960", "https://polemos.pe/wp-content/uploads/2022/01/historia-4.jpg", "La Marea ", "1" });
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DeleteData(
                table: "Tales",
                keyColumn: "Id",
                keyValue: 1);

            migrationBuilder.DeleteData(
                table: "Users",
                keyColumn: "Id",
                keyValue: "2");

            migrationBuilder.DeleteData(
                table: "Collections",
                keyColumn: "Id",
                keyValue: 1);
        }
    }
}
