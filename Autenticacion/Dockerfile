#See https://aka.ms/containerfastmode to understand how Visual Studio uses this Dockerfile to build your images for faster debugging.

FROM mcr.microsoft.com/dotnet/aspnet:6.0 AS base
WORKDIR /app
EXPOSE 80
EXPOSE 443

FROM mcr.microsoft.com/dotnet/sdk:6.0 AS build
WORKDIR /src
COPY ["Autenticacion/Autenticacion.csproj", "Autenticacion/"]
RUN dotnet restore "Autenticacion/Autenticacion.csproj"
COPY . .
WORKDIR "/src/Autenticacion"
RUN dotnet build "Autenticacion.csproj" -c Release -o /app/build

FROM build AS publish
RUN dotnet publish "Autenticacion.csproj" -c Release -o /app/publish /p:UseAppHost=false

FROM base AS final
WORKDIR /app
COPY --from=publish /app/publish .
ENTRYPOINT ["dotnet", "Autenticacion.dll"]