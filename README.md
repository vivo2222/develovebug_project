# develovebug_project
## Table of contents
* [General info](#general-info)
* [Requirements of the project](#requirements-of-the-project)
* [Technologies](#technologies)
* [Setup](#setup)

## General info
This project is simple online classroom web. Since this is a end-of-term project, we are required to organize the source code and files according to the requirements of the project. 
Website will have all the basic functions for a class's activities. We will upgrade it to become a Q&A website, so there may be unused redundancies in the database and resources.
	
## Requirements of the project
### I. Introduction
* Due to translation COVID-19 Universities have increasing demand for online teaching. In the same trend, the IT Faculty of Ton Duc Thang University also wants to build its own online teaching system to minimize the dependence on external systems.
* In the subject of Web and Applied Programming, students are required to implement an online teaching system similar to Google Classroom with the specific requirements below.
### II. Some important notes
* Bootstrap and jQuery libraries are allowed, however CDN must be used (ie Bootstrap and jQuery are added to the project via the link of htttps: //… rather than using the downloaded file saved in the project).
* All the source code related to CSS that you write by yourself, you put in a single file called style.css, located in the root directory of the project. Absolutely not write css in html / php files (inline css and internal css). 
* All the code related to Javascript / jQuery that you write by yourself, you put in a single file named main.js, located in the root directory of the project. Absolutely not write Javascript / jQuery in html / php files. 
* The only back-end language used in the project is PHP.
### III. Request
#### 3.1 Requirement 1: register, login, forget password
The system has three roles as follows:
* Admin, have full discretion in the system.
* Teachers, have the right to create classes and have full authority in their own classrooms.
* Students, have the right to participate in the classroom and participate in classroom activities:
  - Users who want to access the system must register for an account and log in to the system. 
  - After registration, the user with the default role is Student. Admin has the right to reassign permissions to any user.
  - Students have the following information: username, password, first and last name, date of birth, email, phone number.
  - When users forget the password, they can recover the password via email registered previously. The system will send an email with a special link (a fixed time limit), when you click on this link, the user will be redirected to the interface to set a new password.
#### 3.2 Requirement 2: classroom management
* The class has the following information: class name, subject, classroom, and avatar. Also, after being created, each class will have 1 randomly generated class code. Students will need to use this class code to join the class.
* Only the Admin and Teacher have the right to add / delete / edit classes. Teachers only have the right to delete / edit the classes they create, while the Admin has the right to delete / edit any classes.
* Admin / Teacher can view the list of classes managed by themselves. You can search for classes by class name, subject, or classroom. For example:
#### 3.3 Requirement 3: Classroom activities
* After creating a class, students can join the class using the class code. Teachers can view the list of students and have the right to exclude students from the class or add any other student via email.
* When a student joins the class by code, the instructor will receive a notice and have the right to agree / disagree for the student to participate. Conversely, when the teacher adds students to the class, the student also receives notice and needs confirmation before joining the class.
  - Teachers have the right to post news, documents, pictures, etc. on the subject page. Students will see the news and download these documents and pictures. Students can also comment on each news. For example:
  - Teachers have the right to delete / correct posted news, documents, pictures, etc..
  - Teachers have the right to remove inappropriate comments.
  - Teachers can create assignment by linking to a google form. An assignment will have the following information: assignment name, description, start date and time and end date and time. Students can only see assignment during when assignment is open. Students cannot submit assignment after the deadline has passed.
#### 3.4 Requirement 4: responsive web design
* Website must be responsive, display well on many types of laptop devices, phones, tablets, etc.
#### 3.5 Other Requirements
* Notification feature: Send email notifications when there are activities such as: lecturers posting announcements, creating assignments, replying comments ...
* Requirements for database: User password must be protected by hashing technology.

## Technologies
Project is created with:
* XAMPP version: 2.3.4
* Boostrap version: 4.5.2
* Jquery version: 3.5.1
	
## Setup
To run this project, you need:
- Install and put all source code by cloning it at ```htdocs``` folder in XAMPP.
- By importing ```develovebug.sql```, create a database named ```develovebug``` =)) or change name in file config.
- Run server and signup to start.
  - ```index.php``` is default to signup.
  - ```controllers/authController.php``` to verify user info, detect form action, check form validate and controll ```POST METHOD```.
  - ```controllers/roleController.php``` to check active class, post and controll ```GET METHOD```.
  - ```verify.php``` to verify through mail request.
  - ```functions.php``` stores all of functions access to database and implements actions from view.
  - ```main.js``` and ```style.css``` do css and js.
  - Admin acount:
    - username: ```admin```.
    - password: ```1234```.
 ###### ***Develovebug*** means *Developers ~~love~~ bugs* =)).
