# ARG VERSION=latest
FROM centos
# MAINTAINER Haruka Miki <haruka.konijn@gmail.com>
# # RUN:buildするときに実行される
# RUN echo "now building..."
# # CMD:runするときに実行される
# # CMD echo "now running..."
# CMD ["echo","now running..."]
RUN yum install -y nginx
# ADD ./index.html /docker/
# EXPOSE 80:

CMD ["/ryuic/workspace/gen2.0-Ryuichi-Takeda/docker", "-D","FOREGROUND"]
