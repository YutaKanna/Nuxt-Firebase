#
# node and build files step
#
FROM node:10-alpine

RUN apk update && \
    npm install -g create-nuxt-app && \
    npm install --save element-ui && \
    npm install --save axios

RUN mkdir -p /var/www/app/public
WORKDIR /var/www/app
COPY ./ /var/www/app
