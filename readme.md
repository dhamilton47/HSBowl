# Bowl

This is web based application for recording and reporting on high school bowling matches.

### Work in progress.
* Significant refactoring from last attempt (dhamilton47/bowl) as I finally sat down and gave a bit more thought to the structure of the models/database.
    - Took too many shortcuts trying to add code from another project and expecting it to fit my needs here.
    - Revise School Class/Table.
    - Add school_user pivot table.
    - Revise any views effected by the above changes. 

### Current Design Environment
* Wampserver:
    * PHP 7.2.4
    * MySQL 5.7.21
    * Apache 2.4.33
    
* Laravel Framework 5.6.28
    
### Completed
*

### Planned Features
* Registration revisions including confirmation email.
* User profile page scaffolding w/avatar
    * Still some design decisions to be made regarding who a user can score for vs. who they have access to for school and player base data editing.  Not clear yet as to best location for these decisions either. 
* School Class
    * Team Class
        * Player Class
* Match Class
    * Game Class
        * Roll Class
* Pages:
    - School Admin
    - Team Admin
    - Player Admin
    - Match Admin
    - Scoring Summary
    - Game Scoring 
    - User Profile       

