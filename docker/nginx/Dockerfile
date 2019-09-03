FROM ubuntu:19.10
# install nginx
RUN apt-get update -y
RUN apt-get install -y software-properties-common
RUN add-apt-repository -y ppa:nginx/stable
RUN apt-get update -y
RUN apt-get install -y nginx
# deamon mode off
RUN echo "\ndaemon off;" >> /etc/nginx/nginx.conf
RUN chown -R www-data:www-data /var/lib/nginx
# volume
VOLUME ["/etc/nginx/sites-enabled", "/etc/nginx/certs", "/var/log/nginx"]
# expose ports
#EXPOSE 82 443
# add nginx conf
#COPY default.conf /etc/nginx/conf.d/default.conf
WORKDIR /etc/nginx
CMD ["nginx"]