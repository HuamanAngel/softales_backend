using CacheManager.Core;
using Ocelot.DependencyInjection;
using Ocelot.Middleware;

public class Startup
{
    public Startup(Microsoft.Extensions.Hosting.IHostingEnvironment env)
    {
        var builder = new Microsoft.Extensions.Configuration.ConfigurationBuilder();
        builder.SetBasePath(env.ContentRootPath)
               //add configuration.json  
               .AddJsonFile("configuration.json", optional: false, reloadOnChange: true)
               .AddEnvironmentVariables();

        Configuration = builder.Build();
    }

    //change  
    public IConfigurationRoot Configuration { get; }

    public void ConfigureServices(IServiceCollection services)
    {
        //Action<ConfigurationBuilderCachePart> settings = (x) =>
        //{
        //    x.WithMicrosoftLogging(log =>
        //    {
        //        log.AddConsole(LogLevel.Debug);

        //    }).WithDictionaryHandle();
        //};
        services.AddOcelot(Configuration);
    }

    //don't use Task here  
    public async void Configure(IApplicationBuilder app, Microsoft.Extensions.Hosting.IHostingEnvironment env)
    {
        await app.UseOcelot();
    }
}










//using Microsoft.AspNetCore.Builder;
//using Ocelot.DependencyInjection;
//using Ocelot.Middleware;

//namespace ApiGateway
//{
//    public class Startup
//    {
//        private readonly IConfiguration _cfg;

//        public Startup(IConfiguration configuration) => _cfg = configuration;

//        public void ConfigureServices(IServiceCollection services)
//        {
//            var identityUrl = _cfg.GetValue<string>("IdentityUrl");
//            var authenticationProviderKey = "IdentityApiKey";
//            //services.AddAuthentication()
//            //    .AddJwtBearer(authenticationProviderKey, x =>
//            //    {
//            //        x.Authority = identityUrl;
//            //        x.RequireHttpsMetadata = false;
//            //        x.TokenValidationParameters = new Microsoft.IdentityModel.Tokens.TokenValidationParameters()
//            //        {
//            //            ValidAudiences = new[] { "orders", "basket", "locations", "marketing", "mobileshoppingagg", "webshoppingagg" }
//            //        };
//            //    });
//        }
//    }
//}
