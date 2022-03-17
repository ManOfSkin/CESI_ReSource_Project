ARG HTTPD_VERSION=2.4

FROM httpd:${HTTPD_VERSION}-alpine
RUN apk add --update --no-cache \
    apache2-proxy

RUN sed -i '/LoadModule rewrite_module/s/^#//g' /usr/local/apache2/conf/httpd.conf
RUN sed -i '/LoadModule proxy_module/s/^#//g' /usr/local/apache2/conf/httpd.conf
RUN sed -i '/LoadModule proxy_fcgi_module/s/^#//g' /usr/local/apache2/conf/httpd.conf

RUN { \
  echo 'IncludeOptional conf.d/*.conf'; \
} >> /usr/local/apache2/conf/httpd.conf \
  && mkdir /usr/local/apache2/conf.d


#COPY docker/httpd/httpd.conf usr/local/apache2/conf/httpd.conf
#COPY docker/httpd/conf/extra/httpd-vhosts.conf usr/local/apache2/conf/extra/httpd-vhosts.conf