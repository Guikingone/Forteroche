FROM nginx
RUN rm /etc/nginx/conf.d/default.conf
ADD conf/core/nginx.conf /etc/nginx/nginx.conf
ADD conf/app/dev/forteroche.conf /etc/nginx/conf.d/forteroche.conf
# ADD conf/app/prod/forteroche.conf /etc/nginx/conf.d/forteroche.conf -> Only for production env.
