# Documentation
## Steps for Cloning a Git Repository 
1. first created new repository in github account named as test
2. created a local folder in drive C named as cellapp and cloned it with test repo's https link
3. laravel project installed in cellapp folder
4. installed project should be open in vs code with bash shell
5. use git command as git add . to add all the modified local file to the stagged area
6. check the status of modified file using git status
7. commit the file using command git commit -m "committed" and push it to the main branch where you are working in
8. if you want to change the branch you can create new branch in your github repository and change from the bash cell using command git checkout -b branchname
9. then follow same from step 5 
10. then merge the branch to the main branch 


## Instructions to Run Job Portal Application
1. to run a laravel project, we need to have installed versions of php, composer and a local server to run project called as xampp 
2. go to the xampp server and start Apache and MySql
3. then go to http://localhost/phpmyadmin/ which is database section and create a new database for the job portal application
4. go back to the laravel project's env file to link the database name in DB_DATABASE=database_name section
5. start command shell from the same directory where your project is located and type php artisan serve for starting the server
6. use the link given in the shell as http://127.0.0.1:8000 to view the welcome page of the new project.


