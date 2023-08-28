FROM python:3.9.2-alpine

WORKDIR /app
COPY flag /opt/
COPY src/requirements.txt /app
RUN pip3 install -r requirements.txt

COPY src/. /app
EXPOSE 5000
ENTRYPOINT ["python3"]
CMD ["app.py"]
