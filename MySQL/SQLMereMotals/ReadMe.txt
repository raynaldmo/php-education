============================================
SQL Queries for Mere Mortals, Third Edition
============================================

--------------------
Sample Files Read Me
--------------------
You can find sample files containing data and the queries mentioned
in each chapter for the none sample databases: 

  - Bowling League
  - Bowling League Modify
  - Entertainment Agency
  - Entertainment Agency Modify
  - Recipes
  - Sales Orders
  - Sales Orders Modify
  - School Scheduling
  - School Scheduling Modify


---------------------------
Installing the Sample Files
---------------------------

WINDOWS 
-------

To install the sample files on a Microsoft Windows system (Microsoft Windows
7 or later recommended), use Windows Explorer to extract the sample files 
from the file you dowload from http://www.informit.com/title/9780321992475.  
You need 64 MB of free space to install the sample files.

You can download and install a free copy of MySQL from http://www.MySQL.com.

You can download and install a free copy of Microsoft SQL Server Express
edition from 
http://www.microsoft.com/en-us/sqlserver/editions/2012-editions/express.aspx.

The sample files are provided in the following formats:

1) Microsoft Office Access 2007 (.accdb) - subfolder MSAccess

2) Microsoft SQL Server 2012 (.mdf, .ldf) - subfolder MSSQLServer\Data

3) Microsoft SQL Server 2012 scripts (.sql) - subfolder MSSQLServer\SQLScripts

4) MySQL Version 5.6 scripts (.sql) - subfolder MySQL\SQLScripts

5) Images of the database schemas (.jpg) - subfolder Relationships

6) Schemas as a "dictionary" (.xlsx) - subfolder Schemas


MAC OS X
--------
To install the MySQL files on Mac OS X, follow these steps:

1) Dowload the sample files from 
   http://www.informit.com/title/9780321992475

2) Use Finder to decompress the zip file.

      =======================================================
      Note: 
      You can download a free copy of MySQL from
      You can use the scripts you find in the MySQL\SQLSCripts 
      folder to define the databases, load the sample data, 
      and define the Views and Stored Procedures in MySQL.
      If, however, you are running Windows under 
      Boot Camp or with Parallels, you can also use the 
      Microsoft Office Access and Microsoft SQL Server
      files when running Windows on your Intel Mac.
      =======================================================


-----------------
Files and Folders
-----------------
The folders and files are as follows:

FOLDERS
-------

MSAccess    
   - ACCDB files for Microsoft Access 2007 or later (Microsoft Windows)

MSAccess\ScriptsFromAccess
   - .sql files generated from Microsoft Access using code. Used as the 
     basis for scripts in the other databases

MSSQLServer\Data
   - MDF and LDF files for Microsoft SQL Server 2012 or later (Microsoft Windows)

MSSQLServer\SQLScripts
   - SQL Scripts for Microsoft SQL Server 2012 or later to define each database,
     load the data, and define the queries  (Microsoft Windows)

MySQL\SQLScripts   
   - SQL scripts for MySQL 5.6 or later to define each database, 
     load the data, and define the queries  (Microsoft Windows Or Mac OSX)

Relationships 
   - JPG files showing the graphical design layout of all the databases

Schemas
   - A Microsoft Excel file containing a "data dictionary" for all 
     nine sample databases

--------------
MSAccess FILES
--------------

BowlingLeagueExample.accdb       - Bowling League database for Chapters 4-14
                                   and 18-20

BowlingLeagueModify.accdb        - Bowling League database for Chapters 15-17

EntertainmentAgencyExample.mdb   - Entertainment Agency database for Chapters 4-14
                                   and 18-20

EntertainmentAgencyModify.mdb    - Entertainment Agency database for Chapters 15-17

RecipesExample.mdb               - Recipes database for Chapters 4-14 and 18

SalesOrdersExample.mdb           - Sales Orders database for Chapters 4-14 and 18-20

SalesOrdersModify.mdb            - Sales Orders database for Chapters 15-17

SchoolSchedulingExample.mdb      - School Scheduling database for Chapters 4-14
                                   and 18-20

SchoolSchedulingModify.mdb       - School Scheduling database for Chapters 15-17


NOTE: You can open any of the Microsoft Access files with Microsoft Access 2007 
(Version 12) or later.


-----------------
MSSQLServer FILES
-----------------

You can find four types of files in the MSSQLServer\Data folder:

1) SQL Server Data files (.mdf) - These files contain the tables, views, and stored
proceures for each of the sample databases.  You must attach the data file and its
companion log file to SQL Server to be able to use them.

2) SQL Server Log files (.ldf) - These files contain the log data for each of the 
sample databases.  You must attach the data files to SQL Server to be able to use them.

NOTE: You need Microsoft SQL Server 2012 or later to use these files.
You can download a free copy of Microsoft SQL Server Express from
http://www.microsoft.com/en-us/sqlserver/editions/2012-editions/express.aspx

You can also build Microsoft SQL Server files using the scripts found in
MSSQLServer\SQLScripts:

00 BowlingLeagueStructure.SQL - Contains the commands to create the Bowling League 
sample database for Chapters 4-14 and 18-20.

00 BowlingLeagueStructureModify.SQL - Contains the commands to create the Bowling 
League Modify sample database for Chapters 15-17.

00 EntertainmentAgencyStructure.SQL - Contains the commands to create the 
Entertainment Agency sample database for Chapters 4-14 and 18-20

00 EntertainmentAgencyStructureModify.sql - Contains the commands to create the 
Entertainment Agency Modify sample database for Chapters 15-17.

00 RecipesStructure.SQL - Contains the commands to create the Recipes sample 
database for Chapters 4-14 and 18.

00 SalesOrdersStructure.SQL - Contains the commands to create the Sales Orders 
sample database for Chapters 4-14 and 18-20.

00 SalesOrdersStructureModify.SQL - Contains the commands to create the Sales 
Orders Modify sample database for Chapters 15-17.

00 SchoolSchedulingStructure.SQL - Contains the commands to create the 
School Scheduling sample database for Chapters 4-14 and 18-20.

00 SchoolSchedulingStructureModify.sql - Contains the commands to create the 
School Scheduling Modify sample database for Chapters 15-17.

01 BowlingLeagueData.SQL - Contains the INSERT SQL commands to load the sample data 
into the BowlingLeagueExample database for Chapters 4-14 and 18-20.  Be sure to 
execute the 00 BowlingLeagueStructure.sql file first.

01 BowlingLeagueDataModify.SQL - Contains the INSERT SQL commands to load the sample 
data into the BowlingLeagueModify database for Chapters 15-17.  Be sure to execute 
the 00 BowlingLeagueStructureModifyMY.sql file first.

01 EntertainmentAgencyData.SQL - Contains the INSERT SQL commands to load the sample 
data into the EntertainmentAgencyExample database for Chapters 4-14 and 18-20.  Be 
sure to execute the 00 EntertainmentAgencyStructure.sql file first.

01 EntertainmentAgencyDataModify.SQL - Contains the INSERT SQL commands to load the 
sample data into the EntertainmentAgencyModify database for Chapters 15-17.  Be 
sure to execute the 00 EntertainmentAgencyStructureModify.sql file first.

01 RecipesData.SQL - Contains the INSERT SQL commands to load the sample data 
into the RecipesExample database for Chapters 4-14 and 18.  Be sure to execute 
the 00 RecipesStructure.sql file first.

01 SalesOrdersData.SQL - Contains the INSERT SQL commands to load the sample data 
into the SalesOrdersExample database for Chapters 4-14 and 18-20.  Be sure to 
execute the 00 SalesOrdersStructureMY.sql file first.

01 SalesOrdersDataModify.SQL - Contains the INSERT SQL commands to load the sample 
data into the SalesOrdersModify database for Chapters 15-17.  Be sure to execute 
the 00 SalesOrdersStructureModify.sql file first.

01 SchoolSchedulingData.SQL - Contains the INSERT SQL commands to load the sample 
data into the SchoolSchedulingExample database for Chapters 4-14 and 18-20.  Be 
sure to execute the 00 SchoolSchedulingStructure.sql file first.

01 SchoolSchedulingDataModify.SQL - Contains the INSERT SQL commands to load the 
sample data into the SchoolSchedulingModify database for Chapters 15-17.  Be 
sure to execute the 00 SchoolSchedulingStructureModify.sql file first.

02 BowlingLeagueModifyProcs.SQL - Contains the commands to create the sample stored 
procedures and companion views for Chapters 15-17.  
Be sure to execute the 00 BowlingLeagueStructureModify.sql file first.

02 BowlingLeagueViews.SQL - Contains the commands to create the sample views for 
Chapters 4-14 and 18-20. Be sure to execute the 00 BowlingLeagueStructure.sql file first.

02 EntertainmentAgencyModifyProcs.SQL - Contains the commands to create the sample 
stored procedures and companion views for Chapters 15-17.  
Be sure to execute the 00 EntertainmentAgencyStructureModify.sql file first.

02 EntertainmentAgencyViews.SQL - Contains the commands to create the sample views 
for Chapters 4-14 and 18-20.  
Be sure to execute the 00 EntertainmentAgencyStructure.sql file first.

02 RecipesViews.SQL - Contains the commands to create the sample views for 
Chapters 4-14 and 18.  Be sure to execute the 00 RecipesStructure.sql file first.

02 SalesOrdersModifyProcs.SQL - Contains the commands to create the sample stored 
procedures and companion views for Chapters 15-17.  
Be sure to execute the 00 SalesOrdersStructureModify.sql file first.

02 SalesOrdersViews.SQL - Contains the commands to create the sample views for 
Chapters 4-14 and 18-20.  
Be sure to execute the 00 SalesOrdersStructure.sql file first.

02 SchoolSchedulingModifyProcs.SQL - Contains the commands to create the sample 
stored procedures and companion views for Chapters 15-17.  
Be sure to execute the 00 SchoolSchedulingStructureModify.sql file first.

02 SchoolSchedulingViews.SQL - Contains the commands to create the sample views 
for Chapters 4-14 and 18-20.  
Be sure to execute the 00 SchoolSchedulingStructure.sql file first.



-----------
MySQL FILES
-----------

The files in this folder contain the scripts that you can load into the MySQL Workbench
and execute to define each database, load the sample data, and define the 
sample views and stored procedures.  These scripts were tested with MySQL 
Community Edition version 5.6. You can download and install MySQL and the graphical 
tools from http://www.mysql.com/.

00 BowlingLeagueStructureModifyMy.SQL - Contains the commands to create the Bowling 
League Modify sample database for Chapters 15-217

00 BowlingLeagueStructureMY.SQL - Contains the commands to create the Bowling League 
sample database for Chapters 4-14 and 18-20.

00 EntertainmentAgencyStructureModifyMY.sql - Contains the commands to create the 
Entertainment Agency Modify sample database for Chapters 15-17.

00 EntertainmentAgencyStructureMY.SQL - Contains the commands to create the 
Entertainment Agency sample database for Chapters 4-14 and 18-20

00 RecipesStructureMY.SQL - Contains the commands to create the Recipes sample 
database for Chapters 4-14 and 18.

00 SalesOrdersStructureModifyMy.SQL - Contains the commands to create the Sales 
Orders Modify sample database for Chapters 15-17.

00 SalesOrdersStructureMY.SQL - Contains the commands to create the Sales Orders 
sample database for Chapters 4-14 and 18-20.

00 SchoolSchedulingStructureModifyMY.sql - Contains the commands to create the 
School Scheduling Modify sample database for Chapters 15-17.

00 SchoolSchedulingStructureMY.SQL - Contains the commands to create the 
School Scheduling sample database for Chapters 4-14 and 18-20.

--------------------------------------------------------------------------

01 BowlingLeagueDataModifyMY.SQL - Contains the INSERT SQL commands to load the sample 
data into the BowlingLeagueModify database for Chapters 15-17.  Be sure to execute 
the 00 BowlingLeagueStructureModifyMY.sql file first.

01 BowlingLeagueDataMY.SQL - Contains the INSERT SQL commands to load the sample data 
into the BowlingLeagueExample database for Chapters 4-14 and 18-20.  Be sure to 
execute the 00 BowlingLeagueStructureMY.sql file first.

01 EntertainmentAgencyDataModifyMY.SQL - Contains the INSERT SQL commands to load the 
sample data into the EntertainmentAgencyModify database for Chapters 15-17.  Be 
sure to execute the 00 EntertainmentAgencyStructureModifyMY.sql file first.

01 EntertainmentAgencyDataMY.SQL - Contains the INSERT SQL commands to load the sample 
data into the EntertainmentAgencyExample database for Chapters 4-14 and 18-20.  Be 
sure to execute the 00 EntertainmentAgencyStructureMY.sql file first.

01 RecipesDataMY.SQL - Contains the INSERT SQL commands to load the sample data 
into the RecipesExample database for Chapters 4-14 and 18.  Be sure to execute 
the 00 RecipesStructureMY.sql file first.

01 SalesOrdersDataModifyMY.SQL - Contains the INSERT SQL commands to load the sample 
data into the SalesOrdersModify database for Chapters 15-17.  Be sure to execute 
the 00 SalesOrdersStructureModifyMY.sql file first.

01 SalesOrdersDataMY.SQL - Contains the INSERT SQL commands to load the sample data 
into the SalesOrdersExample database for Chapters 4-14 and 18-20.  Be sure to 
execute the 00 SalesOrdersStructureMY.sql file first.

01 SchoolSchedulingDataModifyMY.SQL - Contains the INSERT SQL commands to load the 
sample data into the SchoolSchedulingModify database for Chapters 15-17.  Be 
sure to execute the 00 SchoolSchedulingStructureModifyMY.sql file first.

01 SchoolSchedulingDataMY.SQL - Contains the INSERT SQL commands to load the sample 
data into the SchoolSchedulingExample database for Chapters 4-14 and 18-20.  Be 
sure to execute the 00 SchoolSchedulingStructureMY.sql file first.

02 BowlingLeagueModifyProcsMY.SQL - Contains the commands to create the sample stored 
procedures and companion views for Chapters 15-17.  
Be sure to execute the 00 BowlingLeagueStructureModifyMy.sql file first.

02 BowlingLeagueViewsMY.SQL - Contains the commands to create the sample views for 
Chapters 4-14 and 18-20. Be sure to execute the 00 BowlingLeagueStructureMY.sql file first.

02 EntertainmentAgencyModifyProcsMY.SQL - Contains the commands to create the sample 
stored procedures and companion views for Chapters 15-17.  
Be sure to execute the 00 EntertainmentAgencyStructureModifyMy.sql file first.

02 EntertainmentAgencyViewsMY.SQL - Contains the commands to create the sample views 
for Chapters 4-14 and 18-20.  
Be sure to execute the 00 EntertainmentAgencyStructureMY.sql file first.

02 RecipesViewsMY.SQL - Contains the commands to create the sample views for 
Chapters 4-14 and 18.  Be sure to execute the 00 RecipesStructureMY.sql file first.

02 SalesOrdersModifyProcsMY.SQL - Contains the commands to create the sample stored 
procedures and companion views for Chapters 15-17.  
Be sure to execute the 00 SalesOrdersStructureModifyMy.sql file first.

02 SalesOrdersViewsMY.SQL - Contains the commands to create the sample views for 
Chapters 4-14 and 18-20.  
Be sure to execute the 00 SalesOrdersStructureMY.sql file first.

02 SchoolSchedulingModifyProcsMY.SQL - Contains the commands to create the sample 
stored procedures and companion views for Chapters 15-17.  
Be sure to execute the 00 SchoolSchedulingStructureModifyMy.sql file first.

02 SchoolSchedulingViewsMY.SQL - Contains the commands to create the sample views 
for Chapters 4-14 and 18-20.  
Be sure to execute the 00 SchoolSchedulingStructureMY.sql file first.


----------------
SQLScripts FILES
----------------

You can use the scripts provided for Microsoft SQL Server or MySQL for any other
SQL database system of your choosing.  Be sure to examine and modify the files
for the correct syntax to use with your system.