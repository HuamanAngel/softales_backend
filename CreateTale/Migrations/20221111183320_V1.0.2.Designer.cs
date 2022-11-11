﻿// <auto-generated />
using System;
using CreateTale;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Infrastructure;
using Microsoft.EntityFrameworkCore.Metadata;
using Microsoft.EntityFrameworkCore.Migrations;
using Microsoft.EntityFrameworkCore.Storage.ValueConversion;

#nullable disable

namespace CreateTale.Migrations
{
    [DbContext(typeof(AplicationDbContext))]
    [Migration("20221111183320_V1.0.2")]
    partial class V102
    {
        /// <inheritdoc />
        protected override void BuildTargetModel(ModelBuilder modelBuilder)
        {
#pragma warning disable 612, 618
            modelBuilder
                .HasAnnotation("ProductVersion", "7.0.0")
                .HasAnnotation("Relational:MaxIdentifierLength", 128);

            SqlServerModelBuilderExtensions.UseIdentityColumns(modelBuilder);

            modelBuilder.Entity("CreateTale.Models.Collection", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int");

                    SqlServerPropertyBuilderExtensions.UseIdentityColumn(b.Property<int>("Id"));

                    b.Property<string>("Banner")
                        .IsRequired()
                        .HasColumnType("nvarchar(max)");

                    b.Property<string>("Categories")
                        .IsRequired()
                        .HasColumnType("nvarchar(max)");

                    b.Property<string>("Description")
                        .IsRequired()
                        .HasColumnType("nvarchar(max)");

                    b.Property<string>("FrontImg")
                        .IsRequired()
                        .HasColumnType("nvarchar(max)");

                    b.Property<string>("Title")
                        .IsRequired()
                        .HasColumnType("nvarchar(max)");

                    b.HasKey("Id");

                    b.ToTable("Collections");

                    b.HasData(
                        new
                        {
                            Id = 1,
                            Banner = "https://www.cuentosdehorror.com/wp-content/uploads/2019/10/cuentos-de-la-cripta.jpg",
                            Categories = "Terror",
                            Description = "Cuentos de la cripta, mi coleccion de cuentos de terror",
                            FrontImg = "https://www.cuentosdehorror.com/wp-content/uploads/2019/10/cuentos-de-la-cripta.jpg",
                            Title = "Cuentos de la cripta ( Mi Coleccion ) "
                        });
                });

            modelBuilder.Entity("CreateTale.Models.Tale", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasColumnType("int");

                    SqlServerPropertyBuilderExtensions.UseIdentityColumn(b.Property<int>("Id"));

                    b.Property<int>("CollectionId")
                        .HasColumnType("int");

                    b.Property<string>("Content")
                        .IsRequired()
                        .HasColumnType("nvarchar(max)");

                    b.Property<DateTime>("CreatedOn")
                        .HasColumnType("datetime2");

                    b.Property<string>("Description")
                        .IsRequired()
                        .HasMaxLength(300)
                        .HasColumnType("nvarchar(300)");

                    b.Property<string>("FrontImg")
                        .IsRequired()
                        .HasColumnType("nvarchar(max)");

                    b.Property<string>("Title")
                        .IsRequired()
                        .HasMaxLength(50)
                        .HasColumnType("nvarchar(50)");

                    b.Property<string>("UserId")
                        .IsRequired()
                        .HasColumnType("nvarchar(450)");

                    b.HasKey("Id");

                    b.HasIndex("CollectionId");

                    b.HasIndex("UserId");

                    b.ToTable("Tales");

                    b.HasData(
                        new
                        {
                            Id = 1,
                            CollectionId = 1,
                            Content = "Esta es la historia, la siguiente es toda la historia",
                            CreatedOn = new DateTime(2022, 11, 11, 13, 33, 20, 132, DateTimeKind.Local).AddTicks(7015),
                            Description = "Historia pensada en el maremoto de 1960",
                            FrontImg = "https://polemos.pe/wp-content/uploads/2022/01/historia-4.jpg",
                            Title = "La Marea ",
                            UserId = "1"
                        });
                });

            modelBuilder.Entity("CreateTale.Models.User", b =>
                {
                    b.Property<string>("Id")
                        .HasColumnType("nvarchar(450)");

                    b.Property<string>("Email")
                        .IsRequired()
                        .HasColumnType("nvarchar(max)");

                    b.Property<string>("Password")
                        .IsRequired()
                        .HasColumnType("nvarchar(max)");

                    b.Property<string>("ProfilePicture")
                        .IsRequired()
                        .HasColumnType("nvarchar(max)");

                    b.Property<string>("Username")
                        .IsRequired()
                        .HasColumnType("nvarchar(max)");

                    b.HasKey("Id");

                    b.ToTable("Users");

                    b.HasData(
                        new
                        {
                            Id = "1",
                            Email = "algo@algo.com",
                            Password = "123456",
                            ProfilePicture = "https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png",
                            Username = "Pedro Castillo Rojas"
                        },
                        new
                        {
                            Id = "2",
                            Email = "otro@otro.com",
                            Password = "123456",
                            ProfilePicture = "https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png",
                            Username = "Juan Velazco Alvarado"
                        });
                });

            modelBuilder.Entity("CreateTale.Models.Tale", b =>
                {
                    b.HasOne("CreateTale.Models.Collection", "Collection")
                        .WithMany()
                        .HasForeignKey("CollectionId")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.HasOne("CreateTale.Models.User", "User")
                        .WithMany()
                        .HasForeignKey("UserId")
                        .OnDelete(DeleteBehavior.Cascade)
                        .IsRequired();

                    b.Navigation("Collection");

                    b.Navigation("User");
                });
#pragma warning restore 612, 618
        }
    }
}
