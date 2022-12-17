
public class Program
{
    public static void Main(string[] args)
    {
        IWebHostBuilder builder = new WebHostBuilder();
        builder.ConfigureServices(s =>
        {
            s.AddSingleton(builder);
        });
        builder.UseKestrel()
               .UseContentRoot(Directory.GetCurrentDirectory())
               .UseStartup<Startup>();

        var host = builder.Build();
        host.Run();
    }
}

//using Ocelot.DependencyInjection;

//var builder = WebApplication.CreateBuilder(args);
//var app = builder.Build();

//app.MapGet("/", () => "Hello World!");

//app.Run();


//using ApiGateway;
//using Microsoft.AspNetCore;

//namespace ApiGateway
//{
//    public class Program
//    {
//        public static void Main(string[] args)
//        {
//            BuildWebHost(args).Run();
//        }

//        public static IWebHost BuildWebHost(string[] args)
//        {
//            var builder = WebHost.CreateDefaultBuilder(args);

//            builder.ConfigureServices(s => s.AddSingleton(builder))
//                    .ConfigureAppConfiguration(
//                          ic => ic.AddJsonFile("configuration.json"))
//                    .UseStartup<Startup>();
//            var host = builder.Build();
//            return host;
//        }
//    }
//}

//System.InvalidOperationException: 'A public method named 'ConfigureDevelopment ' or 'Configure ' could not be found in the 'ApiGateway.Startup' type.'

//var conf = new ConfigurationBuilder()
//    .SetBasePath(Directory.GetCurrentDirectory())
//    .AddJsonFile("configuration.json", false, true)
//    .Build();

//IConfigurationRoot configuration = builder.Configuration;

//// Add Ocelot
//builder.Services.AddOcelot(conf);

//conf.UseOcelot().Wait()
