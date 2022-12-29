Laravel 8 / Vue.js task
1) Create a scraper that reads data from
https://news.ycombinator.com/ (title, link, points, date created)
1.2) Store data to a local database (Postgres or MySQL)
1.3) Scraper also must update points for each article
1.4) It must be run from the console

2) Create frontend part:
2.1) Accessible only by username/password (user data must be in DB)
2.2) Display all scraped information using DataTables, 10 entries per package
2.3) Add the possibility to delete an item - if it’s deleted, then do not update it from Hacker News.

Create a readme file on how to set up the site
Put all code in github/gitlab repository.

Bonus points: Docker usage, Unit tests.
