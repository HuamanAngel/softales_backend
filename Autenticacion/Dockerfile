FROM ubuntu:20.04

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone


RUN apt-get update \
    && apt-get install -y gnupg gosu curl ca-certificates zip unzip git supervisor sqlite3 libcap2-bin libpng-dev python2 \
    && mkdir -p ~/.gnupg \
    && chmod 600 ~/.gnupg \
    && echo "disable-ipv6" >> ~/.gnupg/dirmngr.conf \
    && apt-key adv --homedir ~/.gnupg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys E5267A6C \
    && apt-key adv --homedir ~/.gnupg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys C300EE8C \
    && echo "deb http://ppa.launchpad.net/ondrej/php/ubuntu focal main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    && curl -sL https://deb.nodesource.com/setup_15.x | bash - \
    && apt-get install -y nodejs \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/ubuntu/20.04/prod.list > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get update \
    && apt-get install -y yarn \
    && ACCEPT_EULA=Y apt-get install -y msodbcsql17 \
    && ACCEPT_EULA=Y apt-get install -y mssql-tools \
    && apt-get install -y unixodbc-dev \
       gcc \
       musl-dev \
       make \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*



WORKDIR /app

COPY . .
# COPY ["package.json", "./"]

RUN npm install 
CMD npm start










# # FROM node:16.17.0
# # # ENV NODE_ENV=production

# # WORKDIR /app

# # COPY ["package.json", "./"]

# # RUN npm install 
# # RUN npm start
# # COPY . .

# # FROM node:alpine
# # WORKDIR /app
# # COPY . /app

# # RUN npm install
# # RUN npm start





# FROM ubuntu:20.04

# # apt-get and system utilities
# RUN apt-get update
# RUN apt-get install -y curl apt-utils

# # RUN apt-get update && apt-get install -y \
# #     curl apt-utils apt-transport-https debconf-utils gcc build-essential g++-5\
# #     && rm -rf /var/lib/apt/lists/*


# RUN apt-get update \
#     && apt-get install -y gnupg gosu curl ca-certificates zip unzip git supervisor sqlite3 libcap2-bin libpng-dev python2 \
#     && mkdir -p ~/.gnupg \
#     && chmod 600 ~/.gnupg \
#     && echo "disable-ipv6" >> ~/.gnupg/dirmngr.conf \
#     && apt-key adv --homedir ~/.gnupg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys E5267A6C \
#     && apt-key adv --homedir ~/.gnupg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys C300EE8C \

# # adding custom MS repository
# RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
# RUN curl https://packages.microsoft.com/config/ubuntu/20.04/prod.list > /etc/apt/sources.list.d/mssql-release.list

# # install SQL Server tools
# RUN apt-get update && ACCEPT_EULA=Y apt-get install -y mssql-tools
# RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc
# RUN /bin/bash -c "source ~/.bashrc"
# RUN curl -s https://deb.nodesource.com/setup_16.x | bash
# RUN apt-get update


# # RUN apt install libc-bin=2.29 libc6=2.29
# # RUN apt install software-properties-common -y
# # RUN add-apt-repository ppa:deadsnakes/ppa
# # RUN apt-get update
# # RUN apt-get install python3.6

# # RUN add-apt-repository ppa:deadsnakes/ppa \
# # && apt update \
# # && apt install python3.6

# RUN apt-get install nodejs -y
# RUN apt-get install --no-install-recommends
# # nodejs libraries
# # RUN apt-get update && apt-get install -y \
# #     nodejs npm \
# #     --no-install-recommends \
# #     && rm -rf /var/lib/apt/lists/*

# # install necessary locales
# # RUN apt-get install -y locales \
# #     && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
# #     && locale-gen

# # install additional utilities
# # RUN apt-get update && apt-get install gettext nano vim -y

# # add sample code
# # RUN mkdir /sample
# # ADD . /sample
# # WORKDIR /sample

# WORKDIR /app

# COPY . .
# # COPY ["package.json", "./"]

# RUN npm install 
# RUN npm start


# # start project and install tedious
# # RUN npm init -y
# # RUN npm install tedious

# # CMD /bin/bash ./entrypoint.sh