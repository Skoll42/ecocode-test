# ecocode coding test

We have a small application that currently can only show the users a list of movies like IMDB does. 
The final product should contain the whole IMDB database and will give the users the opportunity
to mark their favorites. 




## Setup
If you want to set up the sample project, you can load the fixtures to get some sample data.


## Tasks
suggested time limit for the whole test is between 2-4 hours.

- review/refactor/debug the php files (templates can be ignored) according to your interpretation of clean code
  
  if you have improvements/suggestions that have not been implemented write them down under 
  [further improvements](#markdown-header-further-improvements) 
- Fill the User properties "last_login" and login_count" correctly



## Results submission
create a new repository with the current code base. commit your changes and send us a link to the repository


## Further improvements
- Migrate to FOSUserBundle v2.1.2 for easier user management and faster implementation of basic user needs
- Add possibility to create favorite movies list per user
- Create Movies Repository with methods for filtering data (genre selection, most favorited, etc)
- Add movie search functionality via Elasticsearch or Redis for quick results
- Implement multiple locales for app
- Unit testing via PHPUnit
