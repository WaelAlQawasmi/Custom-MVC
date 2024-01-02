# Ward MVC Framework 


<p align="center">
  <img src="logo.png" alt="Description of the image" width="100" >
</p>

Welcome to the documentation for Ward MVC  Framework , it is Custom MVC (Model-View-Controller) framework. 
This framework is built with PHP and designed to provide a structured and modular approach to developing web applications.
 The following documentation will guide you through the key components, usage, and best practices for building web applications using this framework.
## 

## Table of Contents

- [Folder Structure](#folder-structure)
- [Routing](#routing)
- [Controllers](#controllers)
- [Models](#models)
- [Views](#views)

## Folder Structure

The MVC framework is organized with the following folder structure:


Table of Contents
Getting Started

Installation
Configuration
Architecture Overview

- **src**
   - **app**
   - **Controllers**
   - **Models**
   - **Framwork**
      - **Exeptions**
        - PageNotFoundException.php
      - Route.php
      - Dispatcher.php
      - Container.php
      - Viewer.php
 - **Views** 
 - __index.php__

- **README.md**


Creating a Controller
Defining Routes
Model Usage
View Usage

## Security

Cross-Site Scripting (XSS)
Cross-Site Request Forgery (CSRF)


## Getting Started
Installation
* Clone the repository from GitHub:


> git clone https://github.com/WaelAlQawasmi/Custom-MVC


bash
Copy code
composer install
* Configure your database and other settings in the config/app.php file.
*  Make sure to set the appropriate values for your environment.

## Architecture Overview
__Model:__
The model represents the data and business logic of the application
 models interact with the database and handle data manipulation.

__View:__
The view is responsible for rendering the user interface. It receives data from the controller and presents it to the user.

__Controller:__
The controller handles user input, processes requests, and interacts with models and views. It plays a central role in managing the flow of the application.

__Routing:__
Routing maps URLs to specific controllers and actions. Define routes in the config/routes.php file.

## Usage Examples
Creating a Controller
To create a new controller, add a new PHP file to the src/Controllers directory. Make sure the class extends the Controller base class.



## Bug Reports
If you find any bugs or issues, please open a new issue.

## Feature Requests
Feel free to suggest new features by opening a feature request.

## Pull Requests
We welcome contributions! If you'd like to contribute, please fork the repository and submit a pull request.

## License
This project is licensed under the MIT License.







