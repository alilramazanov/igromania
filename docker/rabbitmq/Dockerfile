FROM rabbitmq:3.8-management

# Set timezone and localtime
ENV TZ=Europe/Moscow

RUN echo $TZ > /etc/timezone \
    && apt-get update \
    && apt-get install -y tzdata \
    && rm /etc/localtime \
    && ln -snf /usr/share/zoneinfo/$TZ /etc/localtime \
    && dpkg-reconfigure -f noninteractive tzdata \
    && apt-get clean