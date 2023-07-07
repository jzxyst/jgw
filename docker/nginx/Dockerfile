FROM nginx:latest

# install required package
RUN apt-get update \
	&& apt-get install -y openssl

# generate certificate files
MAINTAINER Unknown
RUN openssl genrsa 2048 > server.key \
    && openssl req -new -key server.key -subj "/C=JP/ST=Tokyo/L=/O=Unknown/OU=/CN=Unknown" > server.csr \
    && openssl x509 -days 3650 -req -signkey server.key < server.csr > server.crt \
    && openssl dhparam -out /etc/nginx/dhparam.pem 2048 \
    && cp server.key /etc/nginx/server.key \
    && cp server.crt /etc/nginx/server.crt \
    && cp server.crt /etc/nginx/dhparam.pem
