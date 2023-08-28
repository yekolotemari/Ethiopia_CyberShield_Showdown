FROM node:14-alpine

# Set the working directory
WORKDIR /app

# Copy the package.json and package-lock.json files
COPY src/package*.json ./
COPY flag.txt /opt/flag.txt
# Install Node.js dependencies
RUN npm install

# Copy the application source code
COPY src/. .

# Expose the port your Node.js app is listening on
EXPOSE 1337

# Set the start.sh script as the entrypoint
COPY start.sh /app/
RUN chmod +x /app/start.sh
ENTRYPOINT ["./start.sh"]

