using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace CreateTale.Migrations
{
    /// <inheritdoc />
    public partial class V101 : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.InsertData(
                table: "Users",
                columns: new[] { "Id", "Email", "Password", "ProfilePicture", "Username" },
                values: new object[] { "1", "algo@algo.com", "123456", "https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png", "Pedro Castillo Rojas" });
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DeleteData(
                table: "Users",
                keyColumn: "Id",
                keyValue: "1");
        }
    }
}
