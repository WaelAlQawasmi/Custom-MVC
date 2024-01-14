# Use an official PHP runtime as a base image
FROM php:7.4-apache
RUN a2enmod rewrite
# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install any additional dependencies your project requires
# For example, if you need to install PHP extensions or other packages:
# RUN apt-get update && apt-get install -y \
#     package-name

# Expose port 80 for Apache
EXPOSE 80

# The default command to run when the container starts
CMD ["apache2-foreground"]
