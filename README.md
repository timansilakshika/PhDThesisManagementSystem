# PhDThesisManagementSystem
This is the code source for my final year project accomplished for the master in IT program from UCSC.

github repository link - https://github.com/timansilakshika/PhDThesisManagementSystem

This repository contains all the supporting files including font files, CSS and other styling files, libraries and the PHP project files.
Following is a description of the main project files.

First, we have the PHP files with the main functionalities implementation:

db.php - This is the class file implemented for setting up the basic database connection. This is very important to initiate all the functionalities and data manipulations within the system.

authentication.php - This is the functions class file written to authenticate the users at their login. This class file includes all the functions for validating the login credentials, handling of empty field at the login and displaying appropriate messages to notify that to the user, login status notification of success or failure.

feedback_function.php - This class file includes main functions related to feedback handling provided by the supervisor and reviewers or examiners, such as adding feedback, fetching submitted feedback and displaying the relevant feedback list to the users.

marking_function.php - This file includes the marks calculation and grading logic functionality.

private.php - This file includes the implementation for the email notifications including the generation of the email body.

program_function.php - This class file includes the implementation of the functionalities of new program insertion, and displaying the list of available programs within the system.

reporting_function.php - This file has the implementation of the functions for the main report generation within the system.

submission_function.php - This is another important file which contains a set of functionalities implemented for the work flow of thesis submission. It has functions such as uploading of new thesis for submission, updating the thesis after the feedbacks, updating the progress stages of the evaluation process, displaying the information of the submitted thesis, assigning of the examiners etc.

user_registration_function.php - This file has the functions related to the registration of the different user roles who are interacting with the system such as student, supervisor, examiner and coordinator.

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Then we have files related to the implementation of different views for data fetching and manipulations used for the functionalities of different user roles:

admin-reporting.php - This file is implemented to design how the user interface and user interaction happen to generate and display the generated reports.

dashboard.php - This file shows how the main user interfaces and interactions including the dashboard for all users and the thesis progress status displaying view for the student have designed and implemented.

delete-program.php - This is the user interface and interactions for the admin user are designed for the deletion flow of the added programs.

delete-user.php -  This is the user interface and interactions for the admin user are designed for the deletion flow of the added users.

footer.php - This is how the footer has been designed and implemented.

header.php -  - This file is for the implementation of the header of the system.

index.php - This is regarding the implementation of the home page of the system.

layout.php - This is how the main layout has been designed and used throughout the system.

login.php - This is how the login page interactions and interface have been developed.

logout.php - This is how the logout navigation interactions and navigation have been developed.

registar-programme.php - This file contains the interface and interaction for the new programme-adding workflow.

student-profile.php - This file shows how the student profile displaying interface and interactions have been implemented which is used by multiple user roles.

thesis-submissions-list.php - This file includes the implementation of how the filtering of the relevant thesis list for the logged-in user happens and displaying of the retrieved data for the interactions.

user-registration.php - This file is about the design and implementation of the user interface and interactions for the registration process of the different user types.

view-my-thesis.php - This is how the user interface and interactions have been implemented for the student user's submitted thesis' detailed view.

view-thesis.php - This is how the user interface and interactions have been implemented for the supervisor and examiner users for the detailed view of the student-submitted thesis.
