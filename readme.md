# Bowl

This is web based application for recording and reporting on high school bowling matches.

## Work in progress.
* Administration Perspective.
    - Took too many shortcuts trying to add code from another project and expecting it to fit my needs here.
    - Revise School Class/Table.
    - Add school_user pivot table.
    - Revise any views effected by the above changes. 

## Current Design Environment
```
* Wampserver:
    * PHP 7.2.4
    * MySQL 5.7.21
    * Apache 2.4.33
* Laravel Framework 5.6.28
```    

## Completed
```
* Registration revisions including confirmation email.
* User profile page scaffolding w/avatar
* User Class - Initialized
* School Class - Initialized
* Team Class - Initialized
* Player Class - Initialized
* Match Class - Administration Perspective - Initialized
* Many-to-many relationship table for administration purposes created.
```

## Planned Features
* Still some design decisions to be made regarding who a user can score for vs. who they have access to for school and player base data editing.  Not clear yet as to best location for these decisions either. 
```
* Administration Perspective Integration of:
    - User Class
    - School Class
    - Team Class
    - Player Class
    - Match Class - Administration Perspective
```
 
```
* Match Class - Scoring Perspective
    - Game Class
        - Roll Class
```

```
* Pages:
    - School/Team Index
    - Team/Player Index
    - School Admin/Create
    - Team Admin/Create
    - Player Admin/Create
    - Match Admin/Create
    - Scoring Summary Show
    - Game Scoring Show/Update
    - User Profile Admin      
```
